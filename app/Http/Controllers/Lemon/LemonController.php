<?php

namespace App\Http\Controllers\Lemon;

use App\Http\Controllers\Controller;
use App\Models\Fileentry;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Storage;
use Symfony\Component\HttpFoundation\BinaryFileResponse;

class LemonController extends Controller
{
    public function index() {
        $entries = Fileentry::all();
        return view("lemon.index", compact("entries"));
    }


    public function add(Request $request) {
        if (key_exists("file", $_FILES)) {

            if (($exten = pathinfo($_FILES["file"]["name"], PATHINFO_EXTENSION)) != "docx") {
                return $this->JSON(2, "当前文件格式为" . $exten);
            }

        } else {
            return $this->JSON(2, "不能识别当前文件");
        }

        $file = $request->file("file");

        $extension = $file->getClientOriginalExtension();
        Storage::disk("local")->put($file->getFilename() . "." . $extension, File::get($file));
        $entry = new Fileentry();
        $entry->mime = $file->getClientMimeType();
        $entry->original_filename = $file->getClientOriginalName();
        $entry->filename = $file->getFilename() . '.' . $extension;

        if ($fileen = $entry->save()) {
            $PHPWord = new \PhpOffice\PhpWord\PhpWord();
            $templateProcessor = new \PhpOffice\PhpWord\TemplateProcessor(storage_path("app/" . $entry->filename));
            $placeholderSum = count($templateProcessor->getVariables());//获取占位符数
            if ($placeholderSum == 0) {
                //无效文件位置，定时删除
                return $this->JSON(2, "文件不存在占位符");
            }

            $result = $this->JSON(1, "上传成功", ["id" => 1, "name" => $entry->filename]);

        } else {
            $result = $this->JSON(0, $file->getError());
        }

        return $result;

    }

    public function get($filename) {
        $path = storage_path("app/" . $filename);

        if (!File::exists($path)) {
            abort(404);
        }


        $entry = Fileentry::where('filename', $filename)->firstOrFail();

        //dd(storage_path("app/".$file));

        $templateProcessor = new \PhpOffice\PhpWord\TemplateProcessor(storage_path("app/" . $entry->filename));
        $templateProcessor->setValue('11Tets', 'John Doe');
        $templateProcessor->saveAs($filename);
        $phpWord = \PhpOffice\PhpWord\IOFactory::load($filename); // Read the temp file
        $xmlWriter = \PhpOffice\PhpWord\IOFactory::createWriter($phpWord, 'Word2007');
        $xmlWriter->save('result.docx');

    }

    public function model($filename) {
        $path = storage_path("app/" . $filename);

        if (!File::exists($path)) {
            abort(404);
        }

        $entry = Fileentry::where('filename', $filename)->firstOrFail();
        $type = Input::get("type", 0);//提交表单标识符

        $templateProcessor = new \PhpOffice\PhpWord\TemplateProcessor(storage_path("app/" . $filename));
        $fields = $templateProcessor->getVariables();//获取所有字段
        $pdf = "";
        $field = [];

        if ($type) {

            foreach ($fields as $item) {
                $templateProcessor->setValue($item, Input::get($item));
                $data["value"] = Input::get($item);
                $data["filed"] = $item;
                $field[] = $data;
            }

            $file = substr($filename, 0, -5);
            $templateProcessor->saveAs($file . ".docx");
            //输出pdf
            return shell_exec("libreoffice --headless --convert-to pdf ./". $file . ".docx --outdir /home/www/EX/public/PDF/");
            $pdf = $file . ".pdf";
             /*header("Content-Disposition: attachment; filename='".$filename."'");
                readfile($file.".docx");*/
            unlink($file . ".docx");

        } else {
            foreach ($fields as $item) {
                $data["value"] = "";
                $data["filed"] = $item;
                $field[] = $data;
            }
        }

        return view("lemon.model", ["field" => $field, "fileName" => $filename, "pdf" => $pdf]);

    }

    public function show($filename) {
        $pdf = storage_path($filename . ".pdf");
        $response = new BinaryFileResponse($pdf);
        $response->headers->set('Content-Disposition', 'inline; filename="' . $pdf . '"');
        return $response;

    }


    //结果处理
    public function JSON($code, $msg, $filename = "") {
        $result["code"] = $code;
        $result["msg"] = $msg;
        $result["filename"] = $filename;

        return json_encode($result);

    }


}
