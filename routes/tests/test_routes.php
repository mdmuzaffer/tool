<?php
//admin

// use Illuminate\Routing\Route;

use App\Admin;
use App\InternetClient;
use App\Jobs\TestJob;
use GuzzleHttp\Exception\GuzzleException;
use GuzzleHttp\Client;
// use Illuminate\Database\Query\Builder;
use Illuminate\Database\Eloquent\Builder;

use Illuminate\Support\Collection;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Log;

Route::prefix('test')->group(function () {
    Route::get('{Customer}/cupym', function (\App\InternetClient $Customer) {
        $c = $Customer; //->CalculatePayments();
        App\CustomerPayment::TakePaymentByStaff(150.25, "blank", $c, 1, "10/01/2020", 1);
        $c = $Customer; //->CalculatePayments();
        dd($c);
    });














    Route::get('gzip1', function () {
        // dd(config('app.curl.cert'), storage_path('cacert.pem'));
        // $r = config('app.curl.cert');
        $k = storage_path('cacert.pem');
        // dd($k);
        // dd(4);
        $client = new Client();
        $xml = '<x:Envelope
            xmlns:x="http://schemas.xmlsoap.org/soap/envelope/"
            xmlns:urn="urn:IPACCTipbill">
            <x:Header/>
            <x:Body>
                <urn:ipbillGetAllPackages>
                    <urn:user>prince</urn:user>
                    <urn:pass>sonu@0124</urn:pass>
                </urn:ipbillGetAllPackages>
            </x:Body>
        </x:Envelope>';
        // $client->setDefaultOption('verify', $k);
        // $client->setDefaultOption('verify', $k);
        // dd('p');
        $req = $client->post('https://103.232.232.5:443/0/bgpost', [
            'body' => $xml,
            'header' => [
                'Content-Type' => 'text/xml; charset=utf-8',
                'SOAPAction' => 'urn:IPACCTipbill#ipbillGetAllPackages'
            ],
            'verify' => false,
        ]);
        // $response = $client->send($request);

        $d  = compact('request', 'response');
        dd($d);
    });

    Route::get('test-soap', function () {

        $user = 'prince';
        $pass = 'sonu@0124';

        $ctx = stream_context_create(['ssl' => ['verify_peer' => false, 'verify_peer_name' => false]]);

        $c = new SoapClient('https://103.232.232.5/0/bgpost?wsdl', ['stream_context' => $ctx, 'trace' => 1,]);

        try {
            // $u = $c->__soapCall('ipbillGetUser', [$user, $pass, '439001691']);
            $u = $c->__soapCall('ipbillGetAllPackages', [$user, $pass]);
            // var_dump($u);
        } catch (Exception $e) {
            echo "SOAP request failed! Response (c): " . $c->__getLastResponse();
            echo "\n";
            echo $e->faultstring;
        }
        // dd($u);
        return $u;
    });


    //Queue test

    Route::get('q1', function () {
        // return Q1();
        return view("test.q1");
    })->name('test.q.q1.get');
    Route::post('q1', function () {
        $arr = [];
        $rr =  Collection::times(1);
        foreach ($rr as $v) {
            array_push($arr, Q1());
            # code...
        }
        //  Q1();
        return $arr;
        // dispatch(new TestJob);
        // return [
        //     "Queue Dispatched",
        //     now(),
        //     now()->format("d/m/Y h:is"),
        // ];
    })->name('test.q.q1.post');

    if (!function_exists("Q1")) {
        function Q1()
        {

            $ts = now();
            $time = $ts->format('d/m/Y h:i:s a');
            dispatch(new TestJob);

            $nt = now();
            $timeNow = $nt->format('d/m/Y h:i:s a');
            $msg = "Queue Dispatched";
            return compact('msg', 'ts', 'time', 'nt', 'timeNow', 'this');
            // return [
            //     "Queue Dispatched",
            //     now(),
            //     now()->format("d/m/Y h:is"),
            // ];
        }
    }


    Route::get('t1', function () {

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

        // $queries = DB::getQueryLog();
        // // dd($queries);
        // // return  join("",$queries[0]['query']  );
        // return  $queries[0];
        // return [getEloquentSqlWithBindings($qr), $qr->get()];
        return getEloquentSqlWithBindings($qr);
    });

    Route::get('t2/{c}', function (InternetClient $c) {

        $tn = now()->format("d/m/Y h:i:s a");
        try {
            Log::debug("Auto Renewal Started For {$c->name} on {$tn}");
            $cPkg = $c->CurrentInternetPackageBill;
            $pkg = $c->Package;
            $startDate = $cPkg->package_end_date->clone();
            $startDate->addDays(1);
            // ///
            // $cPkg =new InternetPackageBill();
            // $pkg = new InternetPackage();
            // ///

            //
            $dbg = compact('startDate', 'cpkg');
            $exp =  $cPkg->isPackageBillExpired();
            dd($startDate);
            if ($exp) {
                $c->RenewCustomerPackageAutoBySystem($startDate);
            } else {
                Log::debug("Package Not Expired For {$c->name} on {$tn}", $dbg);
            }
            Log::debug("Auto Renewal Ended For {$c->name} on {$tn}", $dbg);
        } catch (\Throwable $th) {
            Log::error("Auto Renewal Error For {$c->name} on {$tn}");
            throw  $th;
        }
    });
});
