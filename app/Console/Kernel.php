<?php

namespace App\Console;

use App\Models\Pages;
use App\Models\Tage;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
use Illuminate\Support\Facades\Log;
use Jieba;

class Kernel extends ConsoleKernel
{
    /**
     * The Artisan commands provided by your application.
     *
     * @var array
     */
    protected $commands = [
        //
    ];

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        // $schedule->command('inspire')
        //          ->hourly();
            //定时检测话题并添加标签
            $schedule->call(function () {

                $jieba = new Jieba();
                $posts = Pages::orderBy("created_at","desc")->pluck("title","id");
                $tag = new Tage();

                foreach ($posts as $key => $itme) {
                    $data_item["post_id"] = $key;
                    $data_item["key_word"] = $jieba->jiebaAnalyse()->extractTags($itme, 10);
                    $data_item["times"] = time();
                    $tag->create($data_item);
                }

            })->dailyAt("1:00");
    }

    /**
     * Register the Closure based commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        require base_path('routes/console.php');
    }
}
