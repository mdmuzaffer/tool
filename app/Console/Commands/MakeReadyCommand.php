<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Artisan;

class MakeReadyCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'make:ready';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Makes the project ready to serve.';

    /**
     * Create a new command instance.
     *
     * @return void
     */
    public function __construct()
    {
        parent::__construct();
    }

    /**
     * Execute the console command.
     *
     * @return mixed
     */
    public function handle()
    {
        $this->warn("\nPublishing Vendor...");
        $this->call("vendor:publish", ['--all' => true]);
        $this->warn("\nGenerating Project Key...");
        $this->call("key:generate");
        $this->warn("\nLinking Storage...");
        $this->call("storage:link");
        $this->warn("\nMigrating Database...");
        $this->call("migrate");
        $this->warn("\nSeeding Database...");
        $this->call("db:seed");
        $project = config('app.name');
        $this->info("Looks like, \"{$project}\" project is ready to serve.");
    }
}
