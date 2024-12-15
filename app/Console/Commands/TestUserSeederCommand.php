<?php

namespace App\Console\Commands;

use App\TestUser;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;

class TestUserSeederCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'cs:testuser {count=1}';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Seeds a TestUser';

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
        //
        $cnt = (int)  $this->argument('count');;
        $cnt  = ($cnt > 0) ? $cnt : 1;
        $results =  factory(TestUser::class, $cnt)->create();
        $data = (array) $results;
        $data['res'] = json_encode($results->toArray());
        Log::info("{$cnt} record(s) created in 'TestUser' model.", $data);
        $headers = ['ID', 'Name', 'Email'];

        $users = TestUser::all(['id', 'name', 'email'])->toArray();

        $this->table($headers, $users);
    }
}
