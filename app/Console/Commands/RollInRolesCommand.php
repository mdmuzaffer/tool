<?php

namespace App\Console\Commands;

use App\Role;
use Illuminate\Console\Command;

class RollInRolesCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'rollin:roles';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Roll In Roles';

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
        Role::RollInRoles();
    }
}
