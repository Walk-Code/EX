<?php

namespace App\Http\Controllers;

use App\Models\Fileentry;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;

class ExportController extends Controller
{
    public function index()
    {
        $entries = Fileentry::all();
        return view("lemon.index",compact("entries"));
    }

    /**
     * 操作导入文件
     */
    public function export(Request $request)
    {

//        $testWord = \PhpOffice\PhpWord\IOFactory::load($file->getRealPath());
//        $sections = $testWord->getSections();
//        $section  = $sections[0];
//        $section = $testWord->addSection();
//        $arrays = $section->getElements();





    }


    public function add(Request $request)
    {

        $file = $request->file("file");
        $extension = $file->getClientOriginalExtension();
        Storage::disk("local")->put($file->getFilename().".".$extension,File::get($file));
        $entry = new Fileentry();
        $entry->mime = $file->getClientMimeType();
        $entry->original_filename = $file->getClientOriginalName();
        $entry->filename = $file->getFilename().'.'.$extension;
        $entry->save();

        return redirect("lemon");

    }

    public function get($filename)
    {
        $entry = Fileentry::where('filename', $filename)->firstOrFail();
        $file = Storage::disk('local')->get($entry->filename);


        $templateProcessor = new \PhpOffice\PhpWord\TemplateProcessor(storage_path("app/php0wvCop.docx"));
        $templateProcessor->setValue('11Tets', 'John Doe');
        $templateProcessor->saveAs($filename);
        $phpWord = \PhpOffice\PhpWord\IOFactory::load($filename); // Read the temp file
        $xmlWriter = \PhpOffice\PhpWord\IOFactory::createWriter($phpWord, 'Word2007');
        $xmlWriter->save('result.docx');

        //return (new Response($file, 200))->header('Content-Type', $entry->mime);

    }

}
