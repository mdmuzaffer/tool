<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;

class EnsureQueueListenerIsRunningCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'queue:checkup';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Ensure that the queue listener is running.';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $php_command = 'php'; // 'php-cli'

    /**
     * Create a new command instance.
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return void
     */
    public function handle()
    {
        $this->php_command = config('app.php_command', 'php');
        if (!$this->isQueueListenerRunning()) {
            $this->comment('Queue listener is being started.');
            $pid = $this->startQueueListener();
            $this->saveQueueListenerPID($pid);
        }

        $this->comment('Queue listener is running.');
    }

    /**
     * Check if the queue listener is running.
     *
     * @return bool
     */
    private function isQueueListenerRunning()
    {
        if (!$pid = $this->getLastQueueListenerPID()) {
            return false;
        }

        $process = exec("ps -p $pid -opid=,cmd=");
        //$processIsQueueListener = str_contains($process, 'queue:listen'); // 5.1
        $processIsQueueListener = !empty($process); // 5.6 - see comments

        return $processIsQueueListener;
    }

    /**
     * Get any existing queue listener PID.
     *
     * @return bool|string
     */
    private function getLastQueueListenerPID()
    {
        if (!file_exists(__DIR__ . '/queue.pid')) {
            return false;
        }

        return file_get_contents(__DIR__ . '/queue.pid');
    }

    /**
     * Save the queue listener PID to a file.
     *
     * @param $pid
     *
     * @return void
     */
    private function saveQueueListenerPID($pid)
    {
        file_put_contents(__DIR__ . '/queue.pid', $pid);
    }

    /**
     * Start the queue listener.
     *
     * @return int
     */
    private function startQueueListener()
    {
        //$command = 'php-cli ' . base_path() . '/artisan queue:listen --timeout=60 --sleep=5 --tries=3 > /dev/null & echo $!'; // 5.1
        $command = $this->getPhpCommand() . ' ' . base_path() . '/artisan queue:work --timeout=60 --sleep=5 --tries=1 > /dev/null & echo $!'; // 5.6 - see comments
        $this->comment("Executing Command: \"{$command}\"");
        $pid = exec($command);
        $this->comment("Command Executed With PID: \"{$pid}\"");


        return $pid;
    }

    /**
     * Get Php Command
     *
     * @return string
     */
    private function getPhpCommand()
    {
        return $this->php_command ?: "php";
    }
}
