<?php

namespace App\Console;

use App\Console\Commands\EnsureQueueListenerIsRunningCommand;
use App\Jobs\TestJob;
use Illuminate\Console\Scheduling\Schedule;
use Illuminate\Foundation\Console\Kernel as ConsoleKernel;
use Illuminate\Support\Facades\Queue;

class Kernel extends ConsoleKernel
{
    /**
     * The Artisan commands provided by your application.
     *
     * @var array
     */
    protected $commands = [
        //
        EnsureQueueListenerIsRunningCommand::class,
    ];

    /**
     * Define the application's command schedule.
     *
     * @param  \Illuminate\Console\Scheduling\Schedule  $schedule
     * @return void
     */
    protected function schedule(Schedule $schedule)
    {
        // // $schedule->command('inspire')
        // //     //  ->hourly()
        // // ;
        // $Q1 = new Queue(now()->addMinutes(2));
        // $schedule->job(TestJob::class, $Q1)->everyMinute();
        // // $schedule->command('cs:testuser')->cron("* * * * *");

        $schedule->command('queue:checkup')->everyFiveMinutes();


    }

    /**
     * Register the commands for the application.
     *
     * @return void
     */
    protected function commands()
    {
        $this->load(__DIR__ . '/Commands');

        require base_path('routes/console.php');
    }
}
