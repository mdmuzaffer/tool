<?php

namespace App\Console\Commands;

use App\Admin;
use Illuminate\Console\Command;
use Illuminate\Support\Facades\Log;

class CreateCustomerDefaultParamsCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'loader:customer';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Loads Customer Default Jobs';

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
        $admins = Admin::with(['Customers'])->get();
        foreach ($admins  as $admin) {
            foreach ($admin->Customers as $c) {
                $c->CreatePackageRevisionByAdmin();
                $d = $c->toArray();
                Log::debug('Debug: Package Revision', $d);
            }
        }
    }
}
