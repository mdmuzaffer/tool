<?php

namespace App\Http\Controllers\User;

use App\state;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\PaymentsReceipt;
use Carbon\Carbon;
use Illuminate\Support\Facades\Auth;
use Session;

class UserController extends Controller
{
    public function __construct()
    {
        //$this->middleware('auth:user');
    }
    public function index(Request $request)
    {
        $data = [
            'loginTitle' => 'User Login',
            'loginRoute' => route('user.login.submit')
        ];

        return view('auth.user-login',$data);
    }

    // select state
    public function selectState(Request $request){
        $user = Auth::guard('user')->user();

        if(!$user){
            return redirect()->route('home');
        }
        $input = $request->all();

        if($input){
            $validatedData = $request->validate([
                'state' => 'required',
                'service' => 'required',
            ]);

            try {
                Session::put('state_id',$request->state);

                $state = state::findOrFail((int)$request->state);

                return redirect()->route('user.dashboard.'.$state->subdomain_prefix);
            } catch (\Exception $e) {

                return back()->withErrors($e->getMessage())->withInput($request->all());
            }

        }

        if(intval($user->state)){
            $state = state::where('id',$user->state)->get();
        }else{
            $state = state::whereIn('id',@json_decode($user->state))->get();
        }

        $total_amunt = $user->Total_State_Tax_Amount + $user->Total_State_Service_Amount + $user->Total_State_Civik_Amount;
        return view('select-state',compact('state','total_amunt'));
    }
    public function dash(Request $request)
    {
        $stateId =  Session::get('state_id');

        $u = Auth::guard('user')->user();
        $data = [
            'recpt' => (object)(PaymentsReceipt::getByVehicleNo($request->get('vehicleno', false), $stateId))

        ];
        // dd($data);
        if ($request->get('vehicleno', false) && $data['recpt']->vehicleno == "") {
            $data['recpt']->vehicleno = $request->get('vehicleno', false);
        }
        return view('up.booking', $data);
    }
    /* raj */
	public function dashraj(Request $request)
    {
        $u = Auth::guard('user')->user();
        $data = [
            'recpt' => (object)(PaymentsReceipt::getByVehicleNo($request->get('vehicleno', false), Session::get('state_id')))

        ];
        // dd($data);
        if ($request->get('vehicleno', false) && $data['recpt']->vehicleno == "") {
            $data['recpt']->vehicleno = $request->get('vehicleno', false);
        }
        return view('raj.booking', $data);
    }
	public function listraj()
    {
        $u = Auth::guard('user')->user();

        $data = [
            // 'applyrecp' => PaymentsReceipt::where('user_id', $u->id)->orderBy('id', 'DESC')->get()
            'applyrecp' => $u->PaymentReceipts()->get(),
            'total_amunt'=>$u->Total_Tax_Amount

        ];
        return view('raj.list', $data);
    }
	public function printRecptraj(Request $request)
    {
        $data = [
            'rectdata' => PaymentsReceipt::getByReceiptNo($request->get('rec', false))
        ];



        return view('raj.print', $data);
    }
	public function printRecptatBookingtmraj(Request $request)
    {
        $data = [
            'rectdata' => PaymentsReceipt::getByReceiptNo($request->get('rec', false))
        ];



        return view('raj.print', $data);
    }
	   public function BookingStoreraj(Request $request)
    {
			/* print_r($request->all());
			die; */
        $u = Auth::guard('user')->user();
        $validated = $request->validate([
            'vehicleno' => 'required|string',
            'chassisno' => 'required|string',
            'ownername' => 'required|string',
            'from_state' => 'required|string',
            'VehicleType' => 'required|string',
            'VehicleClass' => 'required|string',
            'seating_c' => 'string|nullable',
            'txt_sleeper_cap' => 'string|nullable', 
            //'ServiceType' => 'required|string',
            'TaxMode' => 'required|string',
            'border_entry' => 'required|string',
            'tax_from' => 'required|string',
            'tax_upto' => 'required|string',
            'PermitType' => 'string|nullable',
            'checkpost_name' => 'string|nullable',
            //'permit_upto' => 'string|nullable',
            //'permit_no' => 'string|nullable',
            'total_tax_amount' => 'required|string',
            'mobile' => 'required|string',

            'txt_no_of_weeks' => 'required|string',
            //'permit_from' => 'required|string',
            //'fitdate' => 'required|string',
            //'districtname' => 'required|string',
            'service_amount' => 'required|string',
            'civik_amount' => 'required|string'

        ]); 
        // 'capacity_unit',
        // 'admin_id', 'user_id', 'sms_sent', 'is_archived', 'created_at', 'updated_at'
        $validated['capacity_unit'] = "GOODS VEHICLE" == $validated['VehicleType'] ? "KG" : "";
        $validated['user_id'] = $u->id;
        $validated['admin_id'] = $u->admin_id;
        $validated['receipts_state'] = Session::get('state_id');
		/* print_r($validated);
		die; */
        PaymentsReceipt::create($validated);
		
        return redirect()->route('user.bankselect.php.raj');
    }
	
	public function BookingStorerajOld(Request $request)
    {
		
		//dd($request);
		//die;
        $u = Auth::guard('user')->user();
        // dd($request->all());
        $validated = $request->validate([
            'vehicleno' => 'required|string',
            'chassisno' => 'required|string',
            'ownername' => 'required|string',
            'from_state' => 'required|string',
            'VehicleType' => 'required|string',
            'VehicleClass' => 'required|string',
            'seating_c' => 'required|string',
            'txt_sleeper_cap' => 'string|nullable',
            //'ServiceType' => 'required|string',
            'TaxMode' => 'required|string',
            'border_entry' => 'required|string',
            'entrydate' => 'required|string',
            'outdate' => 'required|string',
            'distance' => 'required|string',


            // 'tax_from' => 'required|string',
            // 'tax_upto' => 'required|string',
            // 'PermitType' => 'string|nullable',
            // 'permit_upto' => 'string|nullable',
            // 'permit_no' => 'string|nullable',
            'total_amount' => 'required|string',
            // 'total_tax_amount' => 'required|string',
            'mobile' => 'required|string',

            // 'TaxMode' => 'required|string',
            // 'txt_no_of_weeks'=>'required|string',
            // 'permit_from'=>'required|string',
            // 'fitdate'=>'required|string',
            // 'districtname'=>'required|string',
            // 'service_amount'=>'required|string',
            // 'civik_amount'=>'required|string'
            // 'usercharge' => 'required|string',
            // 'infracess' => 'required|string'


        ]);
        // 'capacity_unit',
        // 'admin_id', 'user_id', 'sms_sent', 'is_archived', 'created_at', 'updated_at'
        $validated['capacity_unit'] = "GOODS VEHICLE" == $validated['VehicleType'] ? "KG" : "";
        $validated['user_id'] = $u->id;
        $validated['admin_id'] = $u->admin_id;
        $validated['receipts_state'] = $u->state;
        $validated['tax_from'] = $validated['entrydate'];
        $validated['tax_upto'] = $validated['outdate'];
        $validated['txt_no_of_weeks'] = $validated['TaxMode'];
        $validated['total_tax_amount'] = $validated['total_amount'];
        // $validated['service_amount'] = $validated['usercharge'];
        // $validated['civik_amount'] = $validated['infracess'];
        //dateTime
        {
            $entryDate = Carbon::createFromFormat('Y/m/d H:i', $validated['entrydate']);
            $outDate = Carbon::createFromFormat('Y/m/d H:i', $validated['outdate']);
            $validated['tax_from'] = $entryDate->format('d-M-Y h:i a');
            $validated['tax_upto'] = $outDate->format('d-M-Y h:i a');
        }

        // unset($validated['usercharge']);
        // unset($validated['infracess']);
        unset($validated['total_amount']);
        // unset($validated['TaxMode']);
        unset($validated['entrydate']);
        unset($validated['outdate']);
//dd($validated); 
        PaymentsReceipt::create($validated);
        return redirect()->route('user.bankselect.php.raj');
    }
   public function getLastReceiptForPrintraj(Request $request)
    {
        $u = Auth::guard('user')->user();
        $v = $request->validate([
            'txtUserName' => 'required',
            'txtPassword' => 'required',
        ]);
        $x = config('app.fake.print.user');
        if ($v['txtUserName'] == $x['username'] && $v['txtPassword'] == $x['password']) {
            $last = $u->LastReceipt();
            if ($last) {
                return redirect()->route('user.Recpt.printatbooking.raj', ['rec' => $last->receipt_no]);
            } else {
                return redirect()->route('user.dashboard.raj');
            }
        } else {
            return redirect()->back()->withErrors(['e1' => 'Username and Password did not match.']);
        }
    }
    /* raj */
	
	public function dashuk(Request $request)
    {
        $u = Auth::guard('user')->user();
        $data = [
            'recpt' => (object)(PaymentsReceipt::getByVehicleNo($request->get('vehicleno', false), Session::get('state_id')))

        ];
        // dd($data);
        if ($request->get('vehicleno', false) && $data['recpt']->vehicleno == "") {
            $data['recpt']->vehicleno = $request->get('vehicleno', false);
        }
        return view('uk.booking', $data);
    }
	public function dashjh(Request $request)
    {
        $u = Auth::guard('user')->user();
        $data = [
            'recpt' => (object)(PaymentsReceipt::getByVehicleNo($request->get('vehicleno', false), Session::get('state_id')))

        ];
        // dd($data);
        if ($request->get('vehicleno', false) && $data['recpt']->vehicleno == "") {
            $data['recpt']->vehicleno = $request->get('vehicleno', false);
        }
        return view('jh.booking', $data);
    }
	public function dashhp(Request $request)
    {
        $u = Auth::guard('user')->user();
        $data = [
            'recpt' => (object)(PaymentsReceipt::getByVehicleNo($request->get('vehicleno', false), Session::get('state_id')))

        ];
        // dd($data);
        if ($request->get('vehicleno', false) && $data['recpt']->vehicleno == "") {
            $data['recpt']->vehicleno = $request->get('vehicleno', false);
        }
        return view('hp.booking', $data);
    }
	public function dashka(Request $request)
    {
        $u = Auth::guard('user')->user();
        $data = [
            'recpt' => (object)(PaymentsReceipt::getByVehicleNo($request->get('vehicleno', false), Session::get('state_id')))

        ];
        // dd($data);
        if ($request->get('vehicleno', false) && $data['recpt']->vehicleno == "") {
            $data['recpt']->vehicleno = $request->get('vehicleno', false);
        }
        return view('ka.booking', $data);
    }
    public function dashpb(Request $request)
    {
        $u = Auth::guard('user')->user();
        $data = [
            'recpt' => (object)(PaymentsReceipt::getByVehicleNo($request->get('vehicleno', false), Session::get('state_id')))

        ];
        // dd($data);
        if ($request->get('vehicleno', false) && $data['recpt']->vehicleno == "") {
            $data['recpt']->vehicleno = $request->get('vehicleno', false);
        }
        return view('pb.booking', $data);
    }
    public function dashhr(Request $request)
    {
        $u = Auth::guard('user')->user();
        $data = [
            'recpt' => (object)(PaymentsReceipt::getByVehicleNo($request->get('vehicleno', false), Session::get('state_id')))

        ];
        // dd($data);
        if ($request->get('vehicleno', false) && $data['recpt']->vehicleno == "") {
            $data['recpt']->vehicleno = $request->get('vehicleno', false);
        }
        return view('hr.booking', $data);
    }
    public function dashbr(Request $request)
    {
        $u = Auth::guard('user')->user();
        $data = [
            'recpt' => (object)(PaymentsReceipt::getByVehicleNo($request->get('vehicleno', false), Session::get('state_id')))

        ];
        // dd($data);
        if ($request->get('vehicleno', false) && $data['recpt']->vehicleno == "") {
            $data['recpt']->vehicleno = $request->get('vehicleno', false);
        }
        return view('br.booking', $data);
    }
    public function dashgj(Request $request)
    {
        $u = Auth::guard('user')->user();
        $data = [
            'recpt' => (object)(PaymentsReceipt::getByVehicleNo($request->get('vehicleno', false), Session::get('state_id')))

        ];
        // dd($data);
        if ($request->get('vehicleno', false) && $data['recpt']->vehicleno == "") {
            $data['recpt']->vehicleno = $request->get('vehicleno', false);
        }
        return view('gj.booking', $data);
    }

    public function dashmh(Request $request)
    {
        $u = Auth::guard('user')->user();
        $data = [
            'recpt' => (object)(PaymentsReceipt::getByVehicleNo($request->get('vehicleno', false), Session::get('state_id')))

        ];
        // dd($data);
        if ($request->get('vehicleno', false) && $data['recpt']->vehicleno == "") {
            $data['recpt']->vehicleno = $request->get('vehicleno', false);
        }
        return view('mh.booking', $data);
    }

     public function dashmp(Request $request)
     {
         $u = Auth::guard('user')->user();
         $data = [
             'u'=>$u,
             'recpt' => (object)(PaymentsReceipt::getByVehicleNo($request->get('vehicleno', false), Session::get('state_id')))

         ];
         // dd($data);
         if ($request->get('vehicleno', false) && $data['recpt']->vehicleno == "") {
             $data['recpt']->vehicleno = $request->get('vehicleno', false);
         }
         return view('mp.bookingmp', $data);
     }

    // all booking list
    public function allBooking(){
        $u = Auth::guard('user')->user();

        if(!$u){
            return redirect()->route('home');
        }

        $data = [
            // 'applyrecp' => PaymentsReceipt::where('user_id', $u->id)->orderBy('id', 'DESC')->get()
            'applyrecp' => $u->AllStatePaymentReceipts()->get(),
            'total_amunt'=> $u->Total_State_Tax_Amount + $u->Total_State_Service_Amount + $u->Total_State_Civik_Amount

        ];

        return view('all-booking', $data);
    }


    public function list()
    {
        $u = Auth::guard('user')->user();

        $data = [
            // 'applyrecp' => PaymentsReceipt::where('user_id', $u->id)->orderBy('id', 'DESC')->get()
            'applyrecp' => $u->PaymentReceipts()->get(),
            'total_amunt'=>$u->Total_Tax_Amount

        ];

        return view('up.list', $data);
    }
    public function listuk()
    {
        $u = Auth::guard('user')->user();

        $data = [
            // 'applyrecp' => PaymentsReceipt::where('user_id', $u->id)->orderBy('id', 'DESC')->get()
            'applyrecp' => $u->PaymentReceipts()->get(),
            'total_amunt'=>($u->Total_Tax_Amount + $u->Service_Amount + $u->Civik_Amount)

        ];
        return view('uk.list', $data);
    }
	public function listjh()
    {
        $u = Auth::guard('user')->user();

        $data = [
            // 'applyrecp' => PaymentsReceipt::where('user_id', $u->id)->orderBy('id', 'DESC')->get()
            'applyrecp' => $u->PaymentReceipts()->get(),
            'total_amunt'=>($u->Total_Tax_Amount + $u->Service_Amount + $u->Civik_Amount)

        ];
        return view('jh.list', $data);
    }
	public function listhp()
    {
        $u = Auth::guard('user')->user();

        $data = [
            // 'applyrecp' => PaymentsReceipt::where('user_id', $u->id)->orderBy('id', 'DESC')->get()
            'applyrecp' => $u->PaymentReceipts()->get(),
            'total_amunt'=>($u->Total_Tax_Amount + $u->Service_Amount + $u->Civik_Amount)

        ];
        return view('hp.list', $data);
    }
	public function listka()
    {
        $u = Auth::guard('user')->user();

        $data = [
            // 'applyrecp' => PaymentsReceipt::where('user_id', $u->id)->orderBy('id', 'DESC')->get()
            'applyrecp' => $u->PaymentReceipts()->get(),
            'total_amunt'=>($u->Total_Tax_Amount + $u->Service_Amount + $u->Civik_Amount)

        ];
        return view('ka.list', $data);
    }
    public function listpb()
    {
        $u = Auth::guard('user')->user();

        $data = [
            // 'applyrecp' => PaymentsReceipt::where('user_id', $u->id)->orderBy('id', 'DESC')->get()
            'applyrecp' => $u->PaymentReceipts()->get(),
            'total_amunt'=>($u->Total_Tax_Amount + $u->Service_Amount + $u->Civik_Amount)

        ];
        return view('pb.list', $data);
    }

    public function listhr()
    {
        $u = Auth::guard('user')->user();

        $data = [
            // 'applyrecp' => PaymentsReceipt::where('user_id', $u->id)->orderBy('id', 'DESC')->get()
            'applyrecp' => $u->PaymentReceipts()->get(),
            'total_amunt'=>$u->Total_Tax_Amount

        ];
        return view('hr.list', $data);
    }
    public function listbr()
    {
        $u = Auth::guard('user')->user();

        $data = [
            // 'applyrecp' => PaymentsReceipt::where('user_id', $u->id)->orderBy('id', 'DESC')->get()
            'applyrecp' => $u->PaymentReceipts()->get(),
            'total_amunt'=>$u->Total_Tax_Amount

        ];
        return view('br.list', $data);
    }
    public function listgj()
    {
        $u = Auth::guard('user')->user();

        $data = [
            // 'applyrecp' => PaymentsReceipt::where('user_id', $u->id)->orderBy('id', 'DESC')->get()
            'applyrecp' => $u->PaymentReceipts()->get(),
            'total_amunt'=> ($u->Total_Tax_Amount + $u->Return_Amont)

        ];
        return view('gj.list', $data);
    }
    public function listmh()
    {
        $u = Auth::guard('user')->user();

        $data = [
            // 'applyrecp' => PaymentsReceipt::where('user_id', $u->id)->orderBy('id', 'DESC')->get()
            'applyrecp' => $u->PaymentReceipts()->get(),
            'total_amunt'=> $u->Total_Tax_Amount

        ];
        return view('mh.list', $data);
    }
     public function listmp()
     {
         $u = Auth::guard('user')->user();

         $data = [
             'u'=>$u,
             // 'applyrecp' => PaymentsReceipt::where('user_id', $u->id)->orderBy('id', 'DESC')->get()
             'applyrecp' => $u->PaymentReceipts()->get(),
             'total_amunt'=> $u->Total_Tax_Amount

         ];
         return view('mp.list', $data);
     }
    public function printRecpt(Request $request)
    {
        $data = [
            'rectdata' => PaymentsReceipt::getByReceiptNo($request->get('rec', false))
        ];



        return view('up.recpt-print', $data);
    }
    public function printRecptuk(Request $request)
    {
        $data = [
            'rectdata' => PaymentsReceipt::getByReceiptNo($request->get('rec', false))
        ];



        return view('uk.print', $data);
    }
	public function printRecptjh(Request $request)
    {
        $data = [
            'rectdata' => PaymentsReceipt::getByReceiptNo($request->get('rec', false))
        ];



        return view('jh.print', $data);
    }
	public function printRecpthp(Request $request)
    {
        $data = [
            'rectdata' => PaymentsReceipt::getByReceiptNo($request->get('rec', false))
        ];



        return view('hp.print', $data);
    }
	public function printRecptka(Request $request)
    {
        $data = [
            'rectdata' => PaymentsReceipt::getByReceiptNo($request->get('rec', false))
        ];



        return view('ka.print', $data);
    }
    public function printRecptpb(Request $request)
    {
        $data = [
            'rectdata' => PaymentsReceipt::getByReceiptNo($request->get('rec', false))
        ];



        return view('pb.print', $data);
    }
    public function printRecpthr(Request $request)
    {
        $data = [
            'rectdata' => PaymentsReceipt::getByReceiptNo($request->get('rec', false))
        ];



        return view('hr.print', $data);
    }
    public function printRecptbr(Request $request)
    {
        $data = [
            'rectdata' => PaymentsReceipt::getByReceiptNo($request->get('rec', false))
        ];

        return view('br.print', $data);
    }
    public function printRecptgj(Request $request)
    {
        $data = [
            'rectdata' => PaymentsReceipt::getByReceiptNo($request->get('rec', false))
        ];



        return view('gj.print', $data);
    }
    public function printRecptmh(Request $request)
    {
        $data = [
            'rectdata' => PaymentsReceipt::getByReceiptNo($request->get('rec', false))
        ];



        return view('mh.print', $data);
    }


    public function printRecptatBookingtm(Request $request)
    {
        $data = [
            'rectdata' => PaymentsReceipt::getByReceiptNo($request->get('rec', false))
        ];



        return view('up.print', $data);
    }
    public function printRecptatBookingtmuk(Request $request)
    {
        $data = [
            'rectdata' => PaymentsReceipt::getByReceiptNo($request->get('rec', false))
        ];



        return view('uk.print', $data);
    }
	public function printRecptatBookingtmjh(Request $request)
    {
        $data = [
            'rectdata' => PaymentsReceipt::getByReceiptNo($request->get('rec', false))
        ];



        return view('jh.print', $data);
    }
	public function printRecptatBookingtmhp(Request $request)
    {
        $data = [
            'rectdata' => PaymentsReceipt::getByReceiptNo($request->get('rec', false))
        ];



        return view('hp.print', $data);
    }
	public function printRecptatBookingtmka(Request $request)
    {
        $data = [
            'rectdata' => PaymentsReceipt::getByReceiptNo($request->get('rec', false))
        ];



        return view('ka.print', $data);
    }
    public function printRecptatBookingtmpb(Request $request)
    {
        $data = [
            'rectdata' => PaymentsReceipt::getByReceiptNo($request->get('rec', false))
        ];



        return view('pb.print', $data);
    }

    public function printRecptatBookingtmhr(Request $request)
    {
        $data = [
            'rectdata' => PaymentsReceipt::getByReceiptNo($request->get('rec', false))
        ];



        return view('hr.print', $data);
    }
    public function printRecptatBookingtmbr(Request $request)
    {
        $data = [
            'rectdata' => PaymentsReceipt::getByReceiptNo($request->get('rec', false))
        ];



        return view('br.print', $data);
    }
    public function printRecptatBookingtmgj(Request $request)
    {
        $data = [
            'rectdata' => PaymentsReceipt::getByReceiptNo($request->get('rec', false))
        ];



        return view('gj.print', $data);
    }
    public function printRecptatBookingtmmh(Request $request)
    {
        $data = [
            'rectdata' => PaymentsReceipt::getByReceiptNo($request->get('rec', false))
        ];



        return view('mh.print', $data);
    }

    public function printRecptatBookingtmmp(Request $request)
    {
        $data = [
            'rectdata' => PaymentsReceipt::getByReceiptNo($request->get('rec', false))
        ];



        return view('mp.recpt-print', $data);
    }


    public function BookingStore(Request $request)
    {
        $u = Auth::guard('user')->user();
        $validated = $request->validate([
            'vehicleno' => 'required|string',
            'chassisno' => 'required|string',
            'ownername' => 'required|string',
            'from_state' => 'required|string',
            'VehicleType' => 'required|string',
            'VehicleClass' => 'required|string',
            'seating_c' => 'required|string',
            'txt_sleeper_cap' => 'string|nullable',
            'ServiceType' => 'required|string',
            'TaxMode' => 'required|string',
            'border_entry' => 'required|string',
            'tax_from' => 'required|string',
            'tax_upto' => 'required|string',
            'PermitType' => 'string|nullable',
            'permit_upto' => 'string|nullable',
            'permit_no' => 'string|nullable',
            'total_tax_amount' => 'required|string',
            'mobile' => 'required|string'

        ]);
        // 'capacity_unit',
        // 'admin_id', 'user_id', 'sms_sent', 'is_archived', 'created_at', 'updated_at'
        $validated['capacity_unit'] = "GOODS VEHICLE" == $validated['VehicleType'] ? "KG" : "";
        $validated['user_id'] = $u->id;
        $validated['admin_id'] = $u->admin_id;
        $validated['receipts_state'] = Session::get('state_id');
        PaymentsReceipt::create($validated);
        return redirect()->route('user.bankselect.php');
    }
    public function BookingStoreUk(Request $request)
    {
        $u = Auth::guard('user')->user();
        $validated = $request->validate([
            'vehicleno' => 'required|string',
            'chassisno' => 'required|string',
            'ownername' => 'required|string',
            'from_state' => 'required|string',
            'VehicleType' => 'required|string',
            'VehicleClass' => 'required|string',
            'seating_c' => 'required|string',
            'txt_sleeper_cap' => 'string|nullable',
            'ServiceType' => 'required|string',
            'TaxMode' => 'required|string',
            'border_entry' => 'required|string',
            'tax_from' => 'required|string',
            'tax_upto' => 'required|string',
            'PermitType' => 'string|nullable',
            'permit_upto' => 'string|nullable',
            'permit_no' => 'string|nullable',
            'total_tax_amount' => 'required|string',
            'mobile' => 'required|string',

            'txt_no_of_weeks' => 'required|string',
            'permit_from' => 'required|string',
            'fitdate' => 'required|string',
            'districtname' => 'required|string',
            'service_amount' => 'required|string',
            'civik_amount' => 'required|string'

        ]);
        // 'capacity_unit',
        // 'admin_id', 'user_id', 'sms_sent', 'is_archived', 'created_at', 'updated_at'
        $validated['capacity_unit'] = "GOODS VEHICLE" == $validated['VehicleType'] ? "KG" : "";
        $validated['user_id'] = $u->id;
        $validated['admin_id'] = $u->admin_id;
        $validated['receipts_state'] = Session::get('state_id');
        PaymentsReceipt::create($validated);
        return redirect()->route('user.bankselect.php.uk');
    }
   public function BookingStorejh(Request $request)
    {
			//print_r($request->all());
        $u = Auth::guard('user')->user();
        $validated = $request->validate([
            'vehicleno' => 'required|string',
            'chassisno' => 'required|string',
            'ownername' => 'required|string',
            'from_state' => 'required|string',
            'VehicleType' => 'required|string',
            'VehicleClass' => 'required|string',
            'seating_c' => 'required|string',
            //'txt_sleeper_cap' => 'string|nullable',
            //'ServiceType' => 'required|string',
            'TaxMode' => 'required|string',
            'border_entry' => 'required|string',
            'tax_from' => 'required|string',
            'tax_upto' => 'required|string',
            'PermitType' => 'string|nullable',
            //'permit_upto' => 'string|nullable',
            //'permit_no' => 'string|nullable',
            'total_tax_amount' => 'required|string',
            'mobile' => 'required|string',

            'txt_no_of_weeks' => 'required|string'
            //'permit_from' => 'required|string',
            //'fitdate' => 'required|string',
            //'districtname' => 'required|string',
            //'service_amount' => 'required|string',
            //'civik_amount' => 'required|string'

        ]); 
        // 'capacity_unit',
        // 'admin_id', 'user_id', 'sms_sent', 'is_archived', 'created_at', 'updated_at'
        $validated['capacity_unit'] = "GOODS VEHICLE" == $validated['VehicleType'] ? "KG" : "";
        $validated['user_id'] = $u->id;
        $validated['admin_id'] = $u->admin_id;
        $validated['receipts_state'] = Session::get('state_id');
        PaymentsReceipt::create($validated);
		
        return redirect()->route('user.bankselect.php.jh');
    }
	
	public function BookingStorehp(Request $request)
    {       
           /* echo "<pre>";
			print_r($request->all());
			die;*/
        $u = Auth::guard('user')->user();
        $validated = $request->validate([
            'vehicleno' => 'required|string',
            'chassisno' => 'required|string',
            'ownername' => 'required|string',
            'from_state' => 'required|string',
            'VehicleType' => 'required|string',
            'VehicleClass' => 'required|string',
            'seating_c' => 'required|string',
            //'txt_sleeper_cap' => 'string|nullable',
            'ServiceType' => 'required|string',
            'TaxMode' => 'required|string',
            'border_entry' => 'required|string',
            'tax_from' => 'required|string',
            'tax_upto' => 'required|string',
            //'PermitType' => 'string|nullable',
            //'permit_upto' => 'string|nullable',
            //'permit_no' => 'string|nullable',
            'total_tax_amount' => 'required|string',
            'mobile' => 'required|string',

            //'txt_no_of_weeks' => 'required|string'
            //'permit_from' => 'required|string',
            //'fitdate' => 'required|string',
            //'districtname' => 'required|string',
            'service_amount' => 'required|string',
            //'civik_amount' => 'required|string',
             'infra_cess' => 'required|string'

        ]); 
        // 'capacity_unit',
        // 'admin_id', 'user_id', 'sms_sent', 'is_archived', 'created_at', 'updated_at'
        $validated['capacity_unit'] = "GOODS VEHICLE" == $validated['VehicleType'] ? "KG" : "";
        $validated['user_id'] = $u->id;
        $validated['admin_id'] = $u->admin_id;
        $validated['receipts_state'] = Session::get('state_id');
        PaymentsReceipt::create($validated);
		
        return redirect()->route('user.bankselect.php.hp');
    }
	public function BookingStoreka(Request $request)
    {
        
			//print_r($request->all());
        $u = Auth::guard('user')->user();
        $validated = $request->validate([
            'vehicleno' => 'required|string',
            'chassisno' => 'required|string',
            'ownername' => 'required|string',
            'from_state' => 'required|string',
            'VehicleType' => 'required|string',
            'VehicleClass' => 'required|string',
            'ServiceType' => 'required|string',
            'PermitType' => 'string|nullable',
            'seating_c' => 'required|string',
            'txt_sleeper_cap' => 'string|nullable',
            'txt_floor_area' => 'string|nullable',
            'TaxMode' => 'required|string',
            'permit_upto' => 'string|nullable',
            'fitdate' => 'required|string',
            'ins_upto' => 'string|nullable',
            'tax_validity' => 'string|nullable',
            'border_entry' => 'required|string',
            'tax_from' => 'required|string',
            'tax_upto' => 'required|string',
            //'permit_no' => 'string|nullable',
            'total_tax_amount' => 'required|string',
            'mobile' => 'required|string',

            //'txt_no_of_weeks' => 'required|string'
            //'permit_from' => 'required|string',
            //'districtname' => 'required|string',
            'service_amount' => 'nullable|string',
            'infra_cess' => 'nullable|string',
            'permit_fee' => 'nullable|string',
            'permit_endoresment_variation' => 'nullable|string',
            //'civik_amount' => 'required|string'

        ]); 
        // 'capacity_unit',
        // 'admin_id', 'user_id', 'sms_sent', 'is_archived', 'created_at', 'updated_at'
        $validated['capacity_unit'] = ("GOODS VEHICLE" == $validated['VehicleType'] || "CONSTRUCTION EQUIPMENT VEHICLE" == $validated['VehicleType']) ? "KG" : "";
        $validated['user_id'] = $u->id;
        $validated['admin_id'] = $u->admin_id;
        $validated['receipts_state'] = Session::get('state_id');
		//print_r($validated);
		//die;
        PaymentsReceipt::create($validated);
		
        return redirect()->route('user.bankselect.php.ka');
    }

    public function BookingStorePB(Request $request)
    {
        $u = Auth::guard('user')->user();
        // dd($request->all());
        $validated = $request->validate([
            'vehicleno' => 'required|string',
            'chassisno' => 'required|string',
            'ownername' => 'required|string',
            'from_state' => 'required|string',
            'VehicleType' => 'required|string',
            'VehicleClass' => 'required|string',
            'seating_c' => 'required|string',
            // 'txt_sleeper_cap' => 'string|nullable',
            'ServiceType' => 'required|string',
            'TaxMode' => 'required|string',
            'border_entry' => 'required|string',
            'entrydate' => 'required|string',
            'outdate' => 'required|string',

            // 'tax_from' => 'required|string',
            // 'tax_upto' => 'required|string',
            // 'PermitType' => 'string|nullable',
            // 'permit_upto' => 'string|nullable',
            // 'permit_no' => 'string|nullable',
            'total_amount' => 'required|string',
            // 'total_tax_amount' => 'required|string',
            'mobile' => 'required|string',

            // 'TaxMode' => 'required|string',
            // 'txt_no_of_weeks'=>'required|string',
            // 'permit_from'=>'required|string',
            // 'fitdate'=>'required|string',
            'districtname'=>'required|string',
            // 'service_amount'=>'required|string',
            // 'civik_amount'=>'required|string'
            'usercharge' => 'required|string',
            'infracess' => 'required|string'


        ]);
        // 'capacity_unit',
        // 'admin_id', 'user_id', 'sms_sent', 'is_archived', 'created_at', 'updated_at'
        $validated['capacity_unit'] = "GOODS VEHICLE" == $validated['VehicleType'] ? "KG" : "";
        $validated['user_id'] = $u->id;
        $validated['admin_id'] = $u->admin_id;
        $validated['receipts_state'] = Session::get('state_id');
        // $validated['tax_from'] = $validated['entrydate'];
        // $validated['tax_upto'] = $validated['outdate'];
        // $validated['txt_no_of_weeks'] = $validated['TaxMode'];
        $validated['total_tax_amount'] = $validated['total_amount'];
        $validated['service_amount'] = $validated['usercharge'];
        $validated['civik_amount'] = $validated['infracess'];
        //dateTime
        {
            $entryDate = Carbon::createFromFormat('Y/m/d H:i', $validated['entrydate']);
            $outDate = Carbon::createFromFormat('Y/m/d H:i', $validated['outdate']);
            $validated['tax_from'] = $entryDate->format('d-M-Y h:i a');
            $validated['tax_upto'] = $outDate->format('d-M-Y h:i a');
        }

        unset($validated['usercharge']);
        unset($validated['infracess']);
        unset($validated['total_amount']);
        // unset($validated['TaxMode']);
        unset($validated['entrydate']);
        unset($validated['outdate']);
// dd($validated);
        PaymentsReceipt::create($validated);
        return redirect()->route('user.bankselect.php.pb');
    }
    public function BookingStoreHR(Request $request)
    {
        $u = Auth::guard('user')->user();
        // dd($request->all());
        $validated = $request->validate([
            'vehicleno' => 'required|string',
            'chassisno' => 'required|string',
            'ownername' => 'required|string',
            'from_state' => 'required|string',
            'VehicleType' => 'required|string',
            'VehicleClass' => 'required|string',
            'seating_c' => 'required|string',
            // 'txt_sleeper_cap' => 'string|nullable',
            'ServiceType' => 'required|string',
            'TaxMode' => 'required|string',
            'border_entry' => 'required|string',
            'entrydate' => 'required|string',
            'outdate' => 'required|string',
            'distance' => 'required|string',


            // 'tax_from' => 'required|string',
            // 'tax_upto' => 'required|string',
            // 'PermitType' => 'string|nullable',
            // 'permit_upto' => 'string|nullable',
            // 'permit_no' => 'string|nullable',
            'total_amount' => 'required|string',
            // 'total_tax_amount' => 'required|string',
            'mobile' => 'required|string',

            // 'TaxMode' => 'required|string',
            // 'txt_no_of_weeks'=>'required|string',
            // 'permit_from'=>'required|string',
            // 'fitdate'=>'required|string',
            // 'districtname'=>'required|string',
            // 'service_amount'=>'required|string',
            // 'civik_amount'=>'required|string'
            // 'usercharge' => 'required|string',
            // 'infracess' => 'required|string'


        ]);
        // 'capacity_unit',
        // 'admin_id', 'user_id', 'sms_sent', 'is_archived', 'created_at', 'updated_at'
        $validated['capacity_unit'] = "GOODS VEHICLE" == $validated['VehicleType'] ? "KG" : "";
        $validated['user_id'] = $u->id;
        $validated['admin_id'] = $u->admin_id;
        $validated['receipts_state'] = Session::get('state_id');
        $validated['tax_from'] = $validated['entrydate'];
        $validated['tax_upto'] = $validated['outdate'];
        $validated['txt_no_of_weeks'] = $validated['TaxMode'];
        $validated['total_tax_amount'] = $validated['total_amount'];
        // $validated['service_amount'] = $validated['usercharge'];
        // $validated['civik_amount'] = $validated['infracess'];
        //dateTime
        {
            $entryDate = Carbon::createFromFormat('Y/m/d H:i', $validated['entrydate']);
            $outDate = Carbon::createFromFormat('Y/m/d H:i', $validated['outdate']);
            $validated['tax_from'] = $entryDate->format('d-M-Y h:i a');
            $validated['tax_upto'] = $outDate->format('d-M-Y h:i a');
        }

        // unset($validated['usercharge']);
        // unset($validated['infracess']);
        unset($validated['total_amount']);
        // unset($validated['TaxMode']);
        unset($validated['entrydate']);
        unset($validated['outdate']);
// dd($validated);
        PaymentsReceipt::create($validated);
        return redirect()->route('user.bankselect.php.hr');
    }
    public function BookingStoreBR(Request $request)
    {
        $u = Auth::guard('user')->user();
    //   dd($request->all());





    // payment_mode





        // loading_capacity





        // client_name
        $validated = $request->validate([
            // 'vehicleno' => 'required|string',
             'vehicle' => 'nullable',
            // 'chassisno' => 'required|string',
            'chassis_no' => 'nullable',
            // 'ownername' => 'required|string',
            'owner_name' => 'nullable',
            // 'from_state' => 'required|string',
            'from_state' => 'nullable',
            // 'VehicleType' => 'required|string',
            'vehicle_type' => 'nullable',
            // 'VehicleClass' => 'required|string',
            'vehicle_class' => 'nullable',
            // 'seating_c' => 'required|string',
            'sitting_capacity' => 'nullable',
            // 'txt_sleeper_cap' => 'string|nullable',
            'sleeper_capacity' => 'nullable',
            'loading_capacity'=> 'nullable',

            // 'ServiceType' => 'required|string',
            // 'ServiceType' => 'required|string',
            // 'TaxMode' => 'required|string',
            'tax_mode' => 'nullable',
            // 'border_entry' => 'required|string',
            'barrier' => 'nullable',
            // 'entrydate' => 'required|string',
            'tax_from' => 'nullable',
            // 'outdate' => 'required|string',
            'tax_upto' => 'nullable',
            // 'distance' => 'required|string',
            // 'distance' => 'required|string',


            // 'tax_from' => 'required|string',
            // 'tax_upto' => 'required|string',
            // 'PermitType' => 'string|nullable',
            'permit_type' => 'nullable',
            // 'permit_upto' => 'string|nullable',
            // 'permit_no' => 'string|nullable',
            'tax_total' => 'nullable',
            // 'total_tax_amount' => 'required|string',
            // 'mobile' => 'required|string',
            'owner_mobile' => 'nullable',

            // 'TaxMode' => 'required|string',
            // 'txt_no_of_weeks'=>'required|string',
            // 'permit_from'=>'required|string',
            // 'fitdate'=>'required|string',


            'from_district'=>'nullable',
            // 'districtname'=>'required|string',
            // 'service_amount'=>'required|string',
            // 'civik_amount'=>'required|string'
            // 'usercharge' => 'required|string',
            // 'infracess' => 'required|string'
            'client_name'=>'nullable',
            'payment_mode'=>'nullable',





        ]);
        // 'capacity_unit',
        // 'admin_id', 'user_id', 'sms_sent', 'is_archived', 'created_at', 'updated_at'
        $validated['capacity_unit'] = "Goods Vehicles" == $validated['vehicle_type'] ? "KG" : "";
        $validated['user_id'] = $u->id;
        $validated['admin_id'] = $u->admin_id;
        $validated['receipts_state'] = Session::get('state_id');

        $validated['vehicleno'] = $validated['vehicle'];
        $validated['chassisno'] = $validated['chassis_no'];
        $validated['ownername'] = $validated['owner_name'];
        // $validated['from_state'] = $validated['from_state'];
        $validated['VehicleType'] = $validated['vehicle_type'];
        $validated['VehicleClass'] = $validated['vehicle_class'];
        $validated['seating_c'] = "Goods Vehicles" == $validated['vehicle_type'] ? $validated['loading_capacity'] : $validated['sitting_capacity'];
        $validated['TaxMode'] = $validated['tax_mode'];
        $validated['border_entry'] = $validated['from_district'];
        // $validated['entrydate'] = $validated['tax_from'];
        // $validated['outdate'] = $validated['tax_upto'];
        $validated['districtname'] = $validated['from_district'];
        $validated['genby'] = $validated['client_name'];
        $validated['mobile'] = $validated['owner_mobile'];
        $validated['ServiceType'] = "NOT APPLICABLE";




        $validated['total_tax_amount'] = $validated['tax_total'];
        $validated['PermitType'] = $validated['permit_type'];
        // $validated['tax_from'] = $validated['entrydate'];
        // $validated['tax_from'] = $validated['entrydate'];
        // $validated['tax_from'] = $validated['entrydate'];
        // $validated['tax_from'] = $validated['entrydate'];
        // $validated['tax_from'] = $validated['entrydate'];
        // $validated['tax_from'] = $validated['entrydate'];
        // $validated['tax_from'] = $validated['entrydate'];
        // $validated['tax_from'] = $validated['entrydate'];
        // $validated['tax_from'] = $validated['entrydate'];
        // $validated['tax_from'] = $validated['entrydate'];
        // $validated['tax_from'] = $validated['entrydate'];
        // $validated['tax_from'] = $validated['entrydate'];
        // $validated['tax_from'] = $validated['entrydate'];
        // $validated['tax_upto'] = $validated['outdate'];
        // $validated['txt_no_of_weeks'] = $validated['TaxMode'];
        // $validated['total_tax_amount'] = $validated['total_amount'];
        // $validated['service_amount'] = $validated['usercharge'];
        // $validated['civik_amount'] = $validated['infracess'];
        //dateTime
        {
            $entryDate = Carbon::createFromFormat('Y-m-d', $validated['tax_from']);
            $outDate = Carbon::createFromFormat('Y-m-d', $validated['tax_upto']);
            $validated['tax_from'] = $entryDate->format('d-M-Y');
            $validated['tax_upto'] = $outDate->format('d-M-Y');
        }

        unset($validated['vehicle']);
        unset($validated['chassis_no']);
        unset($validated['owner_name']);
        // unset($validated['from_state']);
        unset($validated['vehicle_type']);
        unset($validated['vehicle_class']);
        unset($validated['sitting_capacity']);
        unset($validated['tax_mode']);
        unset($validated['barrier']);
        // unset($validated['entrydate']);
        // unset($validated['outdate']);
        unset($validated['from_district']);
        unset($validated['tax_total']);
        unset($validated['client_name']);
        unset($validated['owner_mobile']);
        unset($validated['permit_type']);
        unset($validated['loading_capacity']);
//         unset($validated['usercharge']);
//         unset($validated['usercharge']);
//         unset($validated['usercharge']);
//         unset($validated['usercharge']);
//         unset($validated['usercharge']);
//         unset($validated['usercharge']);
//         unset($validated['usercharge']);
//         // unset($validated['usercharge']);
//         // unset($validated['infracess']);
//         unset($validated['total_amount']);
//         // unset($validated['TaxMode']);
//         unset($validated['entrydate']);
//         unset($validated['outdate']);
// dd($validated);
        PaymentsReceipt::create($validated);
        return redirect()->route('user.bankselect.php.br');
    }
    public function BookingStoreGJ(Request $request)
    {
        $u = Auth::guard('user')->user();
        // dd($request->all());
        $validated = $request->validate([
            'vehicleno' => 'required|string',
            'chassisno' => 'required|string',
            'ownername' => 'required|string',
            'from_state' => 'required|string',
            'VehicleType' => 'required|string',
            'VehicleClass' => 'required|string',
            'seating_c' => 'required|string',
             'txt_sleeper_cap' => 'string|nullable',
            'ServiceType' => 'required|string',
            'TaxMode' => 'required|string',
            'border_entry' => 'required|string',
            // 'entrydate' => 'required|string',
            // 'outdate' => 'required|string',
            // 'distance' => 'required|string',


            'tax_from' => 'required|string',
            'tax_upto' => 'required|string',
            // 'PermitType' => 'string|nullable',
            'ptype' => 'string|nullable',
            'permit_upto' => 'string|nullable',
            'permit_no' => 'string|nullable',
            'total_tax_amount' => 'required|string',
            // 'total_tax_amount' => 'required|string',
            'mobile' => 'required|string',
            'permit_ia' => 'required|string',
            'makerstatus' => 'required|string',
            'ownertype' => 'required|string',


            // 'TaxMode' => 'required|string',
            // 'txt_no_of_weeks'=>'required|string',
            // 'permit_from'=>'required|string',
            // 'fitdate'=>'required|string',
            // 'districtname'=>'required|string',
            // 'service_amount'=>'required|string',
            // 'civik_amount'=>'required|string'
            // 'usercharge' => 'required|string',
            // 'infracess' => 'required|string'


        ]);
        // 'capacity_unit',
        // 'admin_id', 'user_id', 'sms_sent', 'is_archived', 'created_at', 'updated_at'
        $validated['capacity_unit'] = "GOODS VEHICLE" == $validated['VehicleType'] ? "KG" : "";
        $validated['return_amont'] = "SINGLE RETURN TRIP PERMIT" == $validated['ptype'] ? 110 : 0.00;

        $validated['user_id'] = $u->id;
        $validated['admin_id'] = $u->admin_id;
        $validated['receipts_state'] = Session::get('state_id');
        // $validated['tax_from'] = $validated['entrydate'];
        // $validated['tax_upto'] = $validated['outdate'];
        $validated['txt_no_of_weeks'] = $validated['TaxMode'];
        $validated['PermitType'] = $validated['ptype'];


        // $validated['total_tax_amount'] = $validated['total_amount'];
        // $validated['service_amount'] = $validated['usercharge'];
        // $validated['civik_amount'] = $validated['infracess'];
        //dateTime
        {
            $entryDate = Carbon::createFromFormat('d-M-Y h:i a', $validated['tax_from']);
            $outDate = Carbon::createFromFormat('d-M-Y h:i a', $validated['tax_upto']);
            $validated['tax_from'] = $entryDate->format('d-M-Y h:i a');
            $validated['tax_upto'] = $outDate->format('d-M-Y h:i a');
        }

        // unset($validated['usercharge']);
        // unset($validated['infracess']);
        unset($validated['ptype']);
        // unset($validated['TaxMode']);
        // unset($validated['entrydate']);
        // unset($validated['outdate']);
// dd($validated);
        PaymentsReceipt::create($validated);
        return redirect()->route('user.bankselect.php.gj');
    }
    public function BookingStoreMH(Request $request)
    {
        $u = Auth::guard('user')->user();
        // dd($request->all());
        $validated = $request->validate([

            'vehicleno' => 'required|string',
            'chassisno' => 'required|string',
            'ownername' => 'required|string',
            'from_state' => 'required|string',
            'VehicleType' => 'required|string',
            'VehicleClass' => 'required|string',
            'seating_c' => 'required|string',
             'txt_sleeper_cap' => 'string|nullable',
            'ServiceType' => 'required|string',
            'TaxMode' => 'required|string',
            // 'border_entry' => 'required|string',
            'checkpost' => 'required|string',
            // 'outdate' => 'required|string',
            // 'distance' => 'required|string',


            'tax_from' => 'required|string',
            'tax_upto' => 'required|string',
            // 'PermitType' => 'string|nullable',
            // 'ptype' => 'string|nullable',
            // 'permit_upto' => 'string|nullable',
            // 'permit_no' => 'string|nullable',
            'total_tax_amount' => 'required|string',
            // 'total_tax_amount' => 'required|string',
            'mobile' => 'required|string',
            // 'permit_ia' => 'required|string',
            // 'makerstatus' => 'required|string',
            // 'ownertype' => 'required|string',


            // 'TaxMode' => 'required|string',
            // 'txt_no_of_weeks'=>'required|string',
            // 'permit_from'=>'required|string',
            // 'fitdate'=>'required|string',

            'districtname'=>'required|string',
            'service_amount'=>'string|nullable',
            // 'civik_amount'=>'required|string'
            // 'usercharge' => 'required|string',
            // 'infracess' => 'required|string'


        ]);
        // 'capacity_unit',
        // 'admin_id', 'user_id', 'sms_sent', 'is_archived', 'created_at', 'updated_at'
        $validated['capacity_unit'] = "GOODS VEHICLE" == $validated['VehicleType'] ? "KG" : "";
        // $validated['return_amont'] = "SINGLE RETURN TRIP PERMIT" == $validated['ptype'] ? 110 : 0.00;

        $validated['user_id'] = $u->id;
        $validated['admin_id'] = $u->admin_id;
        $validated['receipts_state'] = Session::get('state_id');
        // $validated['tax_from'] = $validated['entrydate'];
        // $validated['tax_upto'] = $validated['outdate'];
        $validated['txt_no_of_weeks'] = $validated['TaxMode'];
        $validated['border_entry'] = $validated['checkpost'];


        // $validated['total_tax_amount'] = $validated['total_amount'];
        // $validated['service_amount'] = $validated['usercharge'];
        // $validated['civik_amount'] = $validated['infracess'];
        //dateTime
        // {
        //     $entryDate = Carbon::createFromFormat('d-M-Y h:i a', $validated['tax_from']);
        //     $outDate = Carbon::createFromFormat('d-M-Y h:i a', $validated['tax_upto']);
        //     $validated['tax_from'] = $entryDate->format('d-M-Y h:i a');
        //     $validated['tax_upto'] = $outDate->format('d-M-Y h:i a');
        // }

        unset($validated['checkpost']);
        // unset($validated['infracess']);
        // unset($validated['ptype']);
        // unset($validated['TaxMode']);
        // unset($validated['entrydate']);
        // unset($validated['outdate']);
// dd($validated);
        PaymentsReceipt::create($validated);
        return redirect()->route('user.bankselect.php.mh');
    }

    public function BookingStoreMP(Request $request)
    {
        $u = Auth::guard('user')->user();
        
        $validated = $request->validate([
            'vehicleno' => 'required|string',
            'chassisno' => 'required|string',
            'ownername' => 'required|string',
            'from_state' => 'required|string',
            'VehicleType' => 'required|string',
            'VehicleClass' => 'required|string',
            'seating_c' => 'required|string',
            'txt_sleeper_cap' => 'string|nullable',
            'ServiceType' => 'required|string',
            'TaxMode' => 'required|string',
            'border_entry' => 'required|string',
            'tax_from' => 'required|string',
            'tax_upto' => 'required|string',
            'PermitType' => 'string|nullable',
            'permit_upto' => 'string|nullable',
            'permit_no' => 'string|nullable',
            'total_tax_amount' => 'required|string',
            'mobile' => 'required|string',
            'user_service_charge' => 'required',
            'cgst' => 'required',
            'sgst' => 'required',
            'permit_fee_mp'=>'required'

        ]);

        $validated['capacity_unit'] = "GOODS VEHICLE" == $validated['VehicleType'] ? "KG" : "";
        $validated['user_id'] = $u->id;
        $validated['admin_id'] = $u->admin_id;
        $validated['receipts_state'] = Session::get('state_id');

        /*echo "<pre>";
        print_r($validated);
        die;*/

        PaymentsReceipt::create($validated);
        return redirect()->route('user.bankselect.php.mp');
    }
    public function GetVegDetl($veh)
    {

        $data = [
            'recpt' => PaymentsReceipt::getByVehicleNo($veh)

        ];

        return view('up.booking', $data);
    }


    public function getLastReceiptForPrint(Request $request)
    {
        $u = Auth::guard('user')->user();
        $v = $request->validate([
            'txtUserName' => 'required',
            'txtPassword' => 'required',
        ]);
        $x = config('app.fake.print.user');
        if ($v['txtUserName'] == $x['username'] && $v['txtPassword'] == $x['password']) {
            $last = $u->LastReceipt();

            if ($last) {
                return redirect()->route('user.Recpt.printatbooking', ['rec' => $last->receipt_no]);
            } else {
                return redirect()->route('user.dashboard');
            }
        } else {
            return redirect()->back()->withErrors(['e1' => 'Username and Password did not match.']);
        }
    }
    public function getLastReceiptForPrintuk(Request $request)
    {
        $u = Auth::guard('user')->user();
        $v = $request->validate([
            'txtUserName' => 'required',
            'txtPassword' => 'required',
        ]);
        $x = config('app.fake.print.user');
        if ($v['txtUserName'] == $x['username'] && $v['txtPassword'] == $x['password']) {
            $last = $u->LastReceipt();
            if ($last) {
                return redirect()->route('user.Recpt.printatbooking.uk', ['rec' => $last->receipt_no]);
            } else {
                return redirect()->route('user.dashboard.uk');
            }
        } else {
            return redirect()->back()->withErrors(['e1' => 'Username and Password did not match.']);
        }
    }
   

  public function getLastReceiptForPrintjh(Request $request)
    {
        $u = Auth::guard('user')->user();
        $v = $request->validate([
            'txtUserName' => 'required',
            'txtPassword' => 'required',
        ]);
        $x = config('app.fake.print.user');
        if ($v['txtUserName'] == $x['username'] && $v['txtPassword'] == $x['password']) {
            $last = $u->LastReceipt();
            if ($last) {
                return redirect()->route('user.Recpt.printatbooking.jh', ['rec' => $last->receipt_no]);
            } else {
                return redirect()->route('user.dashboard.jh');
            }
        } else {
            return redirect()->back()->withErrors(['e1' => 'Username and Password did not match.']);
        }
    }
	public function getLastReceiptForPrinthp(Request $request)
    {
        $u = Auth::guard('user')->user();
        $v = $request->validate([
            'txtUserName' => 'required',
            'txtPassword' => 'required',
        ]);
        $x = config('app.fake.print.user');
        if ($v['txtUserName'] == $x['username'] && $v['txtPassword'] == $x['password']) {
            $last = $u->LastReceipt();
            if ($last) {
                return redirect()->route('user.Recpt.printatbooking.hp', ['rec' => $last->receipt_no]);
            } else {
                return redirect()->route('user.dashboard.hp');
            }
        } else {
            return redirect()->back()->withErrors(['e1' => 'Username and Password did not match.']);
        }
    }
	
		public function getLastReceiptForPrintka(Request $request)
    {
        $u = Auth::guard('user')->user();
        $v = $request->validate([
            'txtUserName' => 'required',
            'txtPassword' => 'required',
        ]);
        $x = config('app.fake.print.user');
        if ($v['txtUserName'] == $x['username'] && $v['txtPassword'] == $x['password']) {
            $last = $u->LastReceipt();
            if ($last) {
                return redirect()->route('user.Recpt.printatbooking.ka', ['rec' => $last->receipt_no]);
            } else {
                return redirect()->route('user.dashboard.ka');
            }
        } else {
            return redirect()->back()->withErrors(['e1' => 'Username and Password did not match.']);
        }
    }
   
  
   
   public function getLastReceiptForPrintpb(Request $request)
    {
        $u = Auth::guard('user')->user();
        $v = $request->validate([
            'txtUserName' => 'required',
            'txtPassword' => 'required',
        ]);
        $x = config('app.fake.print.user');
        if ($v['txtUserName'] == $x['username'] && $v['txtPassword'] == $x['password']) {
            $last = $u->LastReceipt();
            if ($last) {
                return redirect()->route('user.Recpt.printatbooking.pb', ['rec' => $last->receipt_no]);
            } else {
                return redirect()->route('user.dashboard.pb');
            }
        } else {
            return redirect()->back()->withErrors(['e1' => 'Username and Password did not match.']);
        }
    }
    public function getLastReceiptForPrinthr(Request $request)
    {
        $u = Auth::guard('user')->user();
        $v = $request->validate([
            'txtUserName' => 'required',
            'txtPassword' => 'required',
        ]);
        $x = config('app.fake.print.user');
        if ($v['txtUserName'] == $x['username'] && $v['txtPassword'] == $x['password']) {
            $last = $u->LastReceipt();
            if ($last) {
                return redirect()->route('user.Recpt.printatbooking.hr', ['rec' => $last->receipt_no]);
            } else {
                return redirect()->route('user.dashboard.hr');
            }
        } else {
            return redirect()->back()->withErrors(['e1' => 'Username and Password did not match.']);
        }
    }
    public function getLastReceiptForPrintbr(Request $request)
    {
        $u = Auth::guard('user')->user();
        $v = $request->validate([
            'txtUserName' => 'required',
            'txtPassword' => 'required',
        ]);
        $x = config('app.fake.print.user');
        if ($v['txtUserName'] == $x['username'] && $v['txtPassword'] == $x['password']) {
            $last = $u->LastReceipt();
            if ($last) {
                return redirect()->route('user.Recpt.printatbooking.br', ['rec' => $last->receipt_no]);
            } else {
                return redirect()->route('user.dashboard.br');
            }
        } else {
            return redirect()->back()->withErrors(['e1' => 'Username and Password did not match.']);
        }
    }
    public function getLastReceiptForPrintgj(Request $request)
    {
        $u = Auth::guard('user')->user();
        $v = $request->validate([
            'txtUserName' => 'required',
            'txtPassword' => 'required',
        ]);
        $x = config('app.fake.print.user');
        if ($v['txtUserName'] == $x['username'] && $v['txtPassword'] == $x['password']) {
            $last = $u->LastReceipt();
            if ($last) {
                return redirect()->route('user.Recpt.printatbooking.gj', ['rec' => $last->receipt_no]);
            } else {
                return redirect()->route('user.dashboard.gj');
            }
        } else {
            return redirect()->back()->withErrors(['e1' => 'Username and Password did not match.']);
        }
    }
    public function getLastReceiptForPrintmh(Request $request)
    {
        $u = Auth::guard('user')->user();
        $v = $request->validate([
            'txtUserName' => 'required',
            'txtPassword' => 'required',
        ]);
        $x = config('app.fake.print.user');
        if ($v['txtUserName'] == $x['username'] && $v['txtPassword'] == $x['password']) {
            $last = $u->LastReceipt();
            if ($last) {
                return redirect()->route('user.Recpt.printatbooking.mh', ['rec' => $last->receipt_no]);
            } else {
                return redirect()->route('user.dashboard.mh');
            }
        } else {
            return redirect()->back()->withErrors(['e1' => 'Username and Password did not match.']);
        }
    }

    public function getLastReceiptForPrintmp(Request $request)
    {
        $u = Auth::guard('user')->user();
        $v = $request->validate([
            'txtUserName' => 'required',
            'txtPassword' => 'required',
        ]);
        $x = config('app.fake.print.user');
        if ($v['txtUserName'] == $x['username'] && $v['txtPassword'] == $x['password']) {
            $last = $u->LastReceipt();
            if ($last) {
                return redirect()->route('user.Recpt.printatbooking.mp', ['rec' => $last->receipt_no]);
            } else {
                return redirect()->route('user.dashboard.mp');
            }
        } else {
            return redirect()->back()->withErrors(['e1' => 'Username and Password did not match.']);
        }
    }


    
    // Odish model 

    public function listod()
    {
        $u = Auth::guard('user')->user();

        $data = [
            // 'applyrecp' => PaymentsReceipt::where('user_id', $u->id)->orderBy('id', 'DESC')->get()
            'applyrecp' => $u->PaymentReceipts()->get(),
            'total_amunt'=> ($u->Total_Tax_Amount + $u->Return_Amont)

        ];
        return view('od.list', $data);
    }

        public function dashod(Request $request)
    {
        $u = Auth::guard('user')->user();
        $data = [
            'recpt' => (object)(PaymentsReceipt::getByVehicleNo($request->get('vehicleno', false), Session::get('state_id')))

        ];
        // dd($data);
        if ($request->get('vehicleno', false) && $data['recpt']->vehicleno == "") {
            $data['recpt']->vehicleno = $request->get('vehicleno', false);
        }
        return view('od.booking', $data);
    }

        public function printRecptod(Request $request)
    {
        $data = [
            'rectdata' => PaymentsReceipt::getByReceiptNo($request->get('rec', false))
        ];

        return view('od.print', $data);
    }


        public function printRecptatBookingtmod(Request $request)
    {
        $data = [
            'rectdata' => PaymentsReceipt::getByReceiptNo($request->get('rec', false))
        ];



        return view('od.print', $data);
    }


        public function BookingStoreOD(Request $request)
    {
        $u = Auth::guard('user')->user();
        // dd($request->all());
        $validated = $request->validate([
            'vehicleno' => 'required|string',
            'chassisno' => 'required|string',
            'ownername' => 'required|string',
            'from_state' => 'required|string',
            'VehicleType' => 'required|string',
            'VehicleClass' => 'required|string',
            'seating_c' => 'required|string',
             'txt_sleeper_cap' => 'string|nullable',
            'ServiceType' => 'required|string',
            'TaxMode' => 'required|string',
            'border_entry' => 'required|string',


            'tax_from' => 'required|string',
            'tax_upto' => 'required|string',
            // 'PermitType' => 'string|nullable',
            'ptype' => 'string|nullable',
            'permit_upto' => 'string|nullable',
            'permit_no' => 'string|nullable',
            'total_tax_amount' => 'required|string',
            // 'total_tax_amount' => 'required|string',
            'mobile' => 'required|string',
            'permit_ia' => 'required|string',
            'makerstatus' => 'required|string',
            'ownertype' => 'required|string',



        ]);

        $validated['capacity_unit'] = "GOODS VEHICLE" == $validated['VehicleType'] ? "KG" : "";
        $validated['return_amont'] = "SINGLE RETURN TRIP PERMIT" == $validated['ptype'] ? 110 : 0.00;

        $validated['user_id'] = $u->id;
        $validated['admin_id'] = $u->admin_id;
        $validated['receipts_state'] = Session::get('state_id');
        // $validated['tax_from'] = $validated['entrydate'];
        // $validated['tax_upto'] = $validated['outdate'];
        $validated['txt_no_of_weeks'] = $validated['TaxMode'];
        $validated['PermitType'] = $validated['ptype'];


        {
            $entryDate = Carbon::createFromFormat('d-M-Y h:i a', $validated['tax_from']);
            $outDate = Carbon::createFromFormat('d-M-Y h:i a', $validated['tax_upto']);
            $validated['tax_from'] = $entryDate->format('d-M-Y h:i a');
            $validated['tax_upto'] = $outDate->format('d-M-Y h:i a');
        }

        unset($validated['ptype']);

        PaymentsReceipt::create($validated);
        return redirect()->route('user.bankselect.php.od');
    }


        public function getLastReceiptForPrintod(Request $request)
    {
        $u = Auth::guard('user')->user();
        $v = $request->validate([
            'txtUserName' => 'required',
            'txtPassword' => 'required',
        ]);
        $x = config('app.fake.print.user');
        if ($v['txtUserName'] == $x['username'] && $v['txtPassword'] == $x['password']) {
            $last = $u->LastReceipt();
            if ($last) {
                return redirect()->route('user.Recpt.printatbooking.od', ['rec' => $last->receipt_no]);
            } else {
                return redirect()->route('user.dashboard.od');
            }
        } else {
            return redirect()->back()->withErrors(['e1' => 'Username and Password did not match.']);
        }
    }



    //Tamilnadue

    public function listtm()
    {
        $u = Auth::guard('user')->user();

        $data = [
            // 'applyrecp' => PaymentsReceipt::where('user_id', $u->id)->orderBy('id', 'DESC')->get()
            'applyrecp' => $u->PaymentReceipts()->get(),
            'total_amunt'=> ($u->Total_Tax_Amount + $u->Return_Amont)

        ];
        return view('tm.list', $data);
    }

        public function dashtm(Request $request)
    {
        $u = Auth::guard('user')->user();
        $data = [
            'recpt' => (object)(PaymentsReceipt::getByVehicleNo($request->get('vehicleno', false), Session::get('state_id')))

        ];
        // dd($data);
        if ($request->get('vehicleno', false) && $data['recpt']->vehicleno == "") {
            $data['recpt']->vehicleno = $request->get('vehicleno', false);
        }
        return view('tm.booking', $data);
    }

        public function printRecpttm(Request $request)
    {
        $data = [
            'rectdata' => PaymentsReceipt::getByReceiptNo($request->get('rec', false))
        ];

        return view('tm.print', $data);
    }


        public function printRecptatBookingtmtm(Request $request)
    {
        $data = [
            'rectdata' => PaymentsReceipt::getByReceiptNo($request->get('rec', false))
        ];



        return view('tm.print', $data);
    }


    public function BookingStoreTM(Request $request)
    {
        $u = Auth::guard('user')->user();
        //dd($request->all());
        $validated = $request->validate([
            'vehicleno' => 'required|string',
            'chassisno' => 'required|string',
            'ownername' => 'required|string',
            'mobile' => 'required|string',
            'VehicleType' => 'required|string',
            'VehicleClass' => 'required|string',
            'seating_c' => 'required|string',
            'txt_sleeper_cap' => 'string|nullable',
            'fitdate' => 'string|nullable',

            'from_state' => 'required|string',
           
            //'ServiceType' => 'required|string',
            'TaxMode' => 'required|string',
            //'border_entry' => 'required|string',

            'tax_from' => 'required|string',
            'tax_upto' => 'required|string',
            'PermitType' => 'string|nullable',
            'permit_upto' => 'string|nullable',
            'permit_no' => 'string|nullable',
            'total_tax_amount' => 'required|string',
            //'permit_ia' => 'required|string',
            //'makerstatus' => 'required|string',
            //'ownertype' => 'required|string',
            'districtname' => 'required|string',
            'checkpost_name' => 'required|string',

            'permit_authorization_validity' => 'required|string',
            'additional_seat_capicity' => 'required|string',
            'additional_sleeper_capicity' => 'required|string',
            'green_tax' => 'required|string',
            'rang_date' => 'required|string',
            'service_amount' => 'required|string',
            'user_service_charge' => 'required|string',
            'permit_fee' => 'required|string',

        ]);

        $validated['capacity_unit'] = "GOODS VEHICLE" == $validated['VehicleType'] ? "KG" : "";
        $validated['return_amont'] = "SINGLE RETURN TRIP PERMIT" == $validated['PermitType'] ? 110 : 0.00;

        $validated['user_id'] = $u->id;
        $validated['admin_id'] = $u->admin_id;
        $validated['receipts_state'] = Session::get('state_id');
        $validated['txt_no_of_weeks'] = $validated['TaxMode'];
        $validated['PermitType'] = $validated['PermitType'];

        $entryDate = Carbon::createFromFormat('d-M-Y h:i a', $validated['tax_from']);
        $outDate = Carbon::createFromFormat('d-M-Y h:i a', $validated['tax_upto']);
        $validated['tax_from'] = $entryDate->format('d-M-Y h:i a');
        $validated['tax_upto'] = $outDate->format('d-M-Y h:i a');


        /*$greenTax = Carbon::createFromFormat('d-M-Y h:i a', $validated['green_tax']);
        $rangDate = Carbon::createFromFormat('d-M-Y h:i a', $validated['rang_date']);
        $validated['green_tax'] = $greenTax->format('d-M-Y h:i a');
        $validated['rang_date'] = $rangDate->format('d-M-Y h:i a');*/


        PaymentsReceipt::create($validated);
        return redirect()->route('user.bankselect.php.tm');
    }


        public function getLastReceiptForPrinttm(Request $request)
    {
        $u = Auth::guard('user')->user();
        $v = $request->validate([
            'txtUserName' => 'required',
            'txtPassword' => 'required',
        ]);
        $x = config('app.fake.print.user');
        if ($v['txtUserName'] == $x['username'] && $v['txtPassword'] == $x['password']) {
            $last = $u->LastReceipt();
            if ($last) {
                return redirect()->route('user.Recpt.printatbooking.tm', ['rec' => $last->receipt_no]);
            } else {
                return redirect()->route('user.dashboard.tm');
            }
        } else {
            return redirect()->back()->withErrors(['e1' => 'Username and Password did not match.']);
        }
    }


    // Andhra Perdesh

    public function listap()
    {
        $u = Auth::guard('user')->user();
        $data = ['applyrecp' => $u->PaymentReceipts()->get(),'total_amunt'=> ($u->Total_Tax_Amount + $u->Return_Amont) ];
        return view('ap.list', $data);
    }

    public function dashap(Request $request){
        $u = Auth::guard('user')->user();

        $data = ['recpt' => (object)(PaymentsReceipt::getByVehicleNo($request->get('vehicleno', false), Session::get('state_id')))];
        if ($request->get('vehicleno', false) && $data['recpt']->vehicleno == "") {
            $data['recpt']->vehicleno = $request->get('vehicleno', false);
        }
        return view('ap.booking', $data);
    }

    public function printRecptap(Request $request) {
        $data = ['rectdata' => PaymentsReceipt::getByReceiptNo($request->get('rec', false)) ];
        return view('ap.print', $data);
    }


    public function printRecptatBookingtmap(Request $request){
        $data = ['rectdata' => PaymentsReceipt::getByReceiptNo($request->get('rec', false)) ];
        return view('ap.print', $data);
    }


    public function BookingStoreAP(Request $request)
    {
        $u = Auth::guard('user')->user();
        //dd($request->all());
        $validated = $request->validate([
            'vehicleno' => 'required|string',
            'chassisno' => 'required|string',
            'ownername' => 'required|string',
            'mobile' => 'required|string',
            'VehicleType' => 'required|string',
            'VehicleClass' => 'required|string',
            'VehicleCategory' => 'required|string',
            'seating_c' => 'required|string',
            'txt_sleeper_cap' => 'string|nullable',
            'route' => 'required|nullable',
            'name_of_goods' => 'required|nullable',
            'fitdate' => 'string|nullable',

            'from_state' => 'required|string',
           
            'ServiceType' => 'required|string',
            'TaxMode' => 'required|string',
            //'border_entry' => 'required|string',

            'tax_from' => 'required|string',
            'tax_upto' => 'required|string',
            'PermitType' => 'string|nullable',
            'permit_upto' => 'string|nullable',
            'permit_no' => 'string|nullable',
            'total_tax_amount' => 'required|string',
            //'permit_ia' => 'required|string',
            //'makerstatus' => 'required|string',
            //'ownertype' => 'required|string',
            'districtname' => 'required|string',
            'checkpost_name' => 'required|string',

            'permit_authorization_validity' => 'string|nullable',
            'additional_seat_capicity' => 'string|nullable',
            'additional_sleeper_capicity' => 'string|nullable',
            'green_tax' => 'string|nullable',
            'rang_date' => 'string|nullable',
            'service_amount' => 'required|string',
            'user_service_charge' => 'required|string',
            'permit_fee' => 'required|string',

        ]);

        $validated['capacity_unit'] = "GOODS VEHICLE" == $validated['VehicleType'] ? "KG" : "";
        $validated['return_amont'] = "SINGLE RETURN TRIP PERMIT" == $validated['PermitType'] ? 110 : 0.00;

        $validated['user_id'] = $u->id;
        $validated['admin_id'] = $u->admin_id;
        $validated['receipts_state'] = Session::get('state_id');
        $validated['txt_no_of_weeks'] = $validated['TaxMode'];
        $validated['PermitType'] = $validated['PermitType'];

        $entryDate = Carbon::createFromFormat('d-M-Y h:i a', $validated['tax_from']);
        $outDate = Carbon::createFromFormat('d-M-Y h:i a', $validated['tax_upto']);
        $validated['tax_from'] = $entryDate->format('d-M-Y h:i a');
        $validated['tax_upto'] = $outDate->format('d-M-Y h:i a');


        /*$greenTax = Carbon::createFromFormat('d-M-Y h:i a', $validated['green_tax']);
        $rangDate = Carbon::createFromFormat('d-M-Y h:i a', $validated['rang_date']);
        $validated['green_tax'] = $greenTax->format('d-M-Y h:i a');
        $validated['rang_date'] = $rangDate->format('d-M-Y h:i a');*/


        PaymentsReceipt::create($validated);
        return redirect()->route('user.bankselect.php.ap');
    }


        public function getLastReceiptForPrintap(Request $request)
    {
        $u = Auth::guard('user')->user();
        $v = $request->validate([
            'txtUserName' => 'required',
            'txtPassword' => 'required',
        ]);
        $x = config('app.fake.print.user');
        if ($v['txtUserName'] == $x['username'] && $v['txtPassword'] == $x['password']) {
            $last = $u->LastReceipt();
            if ($last) {
                return redirect()->route('user.Recpt.printatbooking.ap', ['rec' => $last->receipt_no]);
            } else {
                return redirect()->route('user.dashboard.ap');
            }
        } else {
            return redirect()->back()->withErrors(['e1' => 'Username and Password did not match.']);
        }
    }


}
