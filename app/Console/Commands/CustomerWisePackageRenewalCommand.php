<?php

namespace App\Console\Commands;

use App\Admin;
use App\InternetClient;
use App\Jobs\CustomerWisePackageRenewalJob;
use App\Jobs\TestJob;
use Illuminate\Console\Command;
use Illuminate\Database\Eloquent\Builder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;
use SebastianBergmann\Environment\Console;

class CustomerWisePackageRenewalCommand extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'customer:renewal';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Customer Renewal';

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
        DB::enableQueryLog();
        // $admins = Admin::where([
        //     'is_active' => 1
        // ])->get();
        // foreach ($admins as $adm) {
        //     $customers = $adm->Customers()->with([
        //         'CurrentInternetPackageBill' => function ($q) {
        //             $q->whereNotNull('id');
        //             $currentDate = now()->startOfDay();
        //             $q->whereDate('package_end_date', '<=', $currentDate);
        //         },
        //         // 'PackageRevision'
        //     ])
        //     ->where([
        //         'is_active' => 1,
        //     ])
        //     ->whereNotNull('internet_package_bill_id')
        //         // ->whereHas('CurrentInternetPackageBill',function ( Builder $q)
        //         // {
        //         //     $q->whereNotNull('internet_package_bills.id')
        //         //     ->whereDate('internet_package_bills.id','>=',now());
        //         // })
        //         ->get();

        //     // foreach ($customers  as $cus) {

        //     // }
        //     dump($customers);

        // }
        //             $currentDate = now()->startOfDay();
        $currentDate = now()->startOfDay();
        Log::debug("Customer Renewal Started", [
            'Time' => now()
        ]);;
        $qr = DB::table('internet_clients')
            ->join('internet_package_bills', function ($q) {
                $q->on('internet_package_bills.id', '=', 'internet_clients.internet_package_bill_id');
                $q->on('internet_package_bills.admin_id', '=', 'internet_clients.admin_id');
            })
            ->join('admins', function ($q) {
                $q->on('admins.id', '=', 'internet_clients.admin_id');
            })
            ->join('package_revisions', function ($q) {
                $q->on('package_revisions.admin_id', '=', 'internet_clients.admin_id');
                $q->on('package_revisions.internet_client_id', '=', 'internet_clients.id');
            })
            ->select([
                'internet_clients.id',
                // 'internet_package_bills.id as cpkg_id',
                // 'internet_package_bills.package_end_date as cpkg_exp',
                // 'package_revisions.is_revision_enabled as is_rc',
                // 'package_revisions.revision_count_orig as rc_o',
                // 'package_revisions.revision_count_left as rc_l',
            ])
            ->where('internet_clients.is_active', '<>', 0)
            ->where('admins.is_active', '<>', 0)
            ->where('admins.is_auto_renewal_on', '<>', 0)
            ->whereDate('internet_package_bills.package_end_date', '<=', $currentDate)
            ->where('package_revisions.is_revision_enabled', 1)
            ->where('package_revisions.revision_count_orig', '>=', 1)
            ->where('package_revisions.revision_count_left', '>=', 1)
            //
            // ->get()
        ;
        $res = $qr->get();
        $cids = $res->pluck('id')->toArray();
        // $customers = InternetClient::whereIn('id', $cids)
        //     ->select(['id', 'name'])->get()->toArray();
        // $this->table(['id', 'name'], $customers);
        $cnt = count($cids);
        if (count($cids) > 0) {
            Log::debug("AutoRenewal Will Run For {$cnt} Customer(s).", [
                'Time' => now()
            ]);;
            foreach ($cids as $cid) {
                dispatch(new CustomerWisePackageRenewalJob((int) $cid))->delay(10);
                // dispatch(new TestJob((int) $cid));//->delay(10);
                $this->info("AutoRenewal Job Dispatched To 'default' Queue For Customer [id: {$cid}]");
                Log::debug("AutoRenewal Job Dispatched To 'default' Queue For Customer [id: {$cid}]", [
                    'Time' => now()
                ]);;
            }
        } else {
            $this->error("No Customer To Renew.");
            Log::debug("No Customer To Renew. Ended.", [
                'Time' => now()
            ]);;
        }
    }
}
