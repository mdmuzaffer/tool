<?php

namespace App\Listeners;

use Illuminate\Queue\InteractsWithQueue;
use Illuminate\Contracts\Queue\ShouldQueue;
use Symfony\Component\Console\Output\ConsoleOutput;

class MessageLoggedListener
{
    /**
     * Create the event listener.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     *
     * @param  object  $event
     * @return void
     */
    public function handle($event)
    {
        if (app()->runningInConsole()) {
            $output = new ConsoleOutput();
            // $output->writeln("<error>{$event->message}</error>");
            $output->writeln("{$event->message}");

        }
    }
}
