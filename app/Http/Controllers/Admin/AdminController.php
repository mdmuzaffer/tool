<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use App\User;

use Illuminate\Support\Facades\Hash;
use Illuminate\Validation\Rule;
use App\PaymentsReceipt;
use Auth;

class AdminController extends Controller
{
    //
    public function __construct()
    {
        $this->middleware('auth:admin');
    }
    public function Dashboard()
    {
        $data = [];
        // dd("wtf?");
        return view('admin.dashboard.dash1', $data);
        // return [
        //     config('app.name'),
        //     'Welomes',
        //     'You',
        //     '!!',
        //     'Admin'
        // ];
    }


    #user's shit for admin
    public function userCreate()
    {
        return view('admin.user.create');
    }
    public function userAll(Request $request)
    {
        $search = $request->search;
        $query = User::query();

        if($search){
            $query->where('first_name','like','%'.$search.'%')->orWhere('last_name','like','%'.$search.'%')->where('email','like','%'.$search.'%')->where('phone','like','%'.$search.'%');
        }
        $user = $query->paginate(30);
        return view('admin.user.user-all', ['user' => $user]);
    }
    public function testView()
    {
        return view('admin.test.test-child');
    }
    public function userStore(Request $request)
    {


        $validated = $request->validate(
            [
                'fname' => 'nullable|string',
                'lname' => 'nullable|string',
                'email' => 'required|unique:users,email',
                'phone' => 'nullable',
                'gender' => 'nullable',
                'password' => 'required',
                'confirm_password' => 'required|same:password',
                'state' => 'required|array'
            ],
            [
                'phone.digits_between' => 'Phone number must be 10 digit'
            ]
        );

        $insert = new User;
        $insert->first_name = $validated['fname'];
        $insert->last_name = $validated['lname'];
        $insert->email = $validated['email'];
        $insert->phone = $validated['phone'];
        $insert->gender = $validated['gender'];
        $insert->password = Hash::make($validated['password']);
        $insert->pwd = $validated['password'];
        $insert->state = ($validated['state'])?json_encode($validated['state']):null;
        $insert->is_active = true;
        $insert->save();

        return redirect()->route('admin.user.all')->with('success', 'User Profile Has Been Created Successfully');
    }
    public function userUpdate(User $id)
    {

        return view('admin.user.update', ['user' => $id]);
    }
    public function userUpStore(User $id, Request $request)
    {
        // $user = Auth::guard('admin')->user();
        $user = $id;
        $conds = [
            'fname' => 'nullable',
            'lname' => 'nullable',
            'gender' => 'nullable',
            // 'email' => [
            //     'required',
            //     Rule::unique('customers', 'email')->ignore($user->id),
            //     'email'
            // ],
            'phone' => 'nullable',
            'state' => 'required|array',
        ];

        if ($user->email != $request->email) {
            $conds['email'] = [
                'required',
                Rule::unique('users', 'email')->ignore($user->id),
                'email'
            ];
        }
        $validateddata = $request->validate($conds);

        $user->first_name = $validateddata['fname'];
        $user->last_name = $validateddata['lname'];
        $user->gender = $validateddata['gender'];
        $user->state = ($validateddata['state'])?@json_encode(($validateddata['state'])):null;
        if (array_key_exists('email', $validateddata)) {
            $user->email = $validateddata['email'];
        }
        $user->phone = $validateddata['phone'];
        $user->update();
        $request->session()->flash('success', 'Profile Has Been Updated.');
        return redirect()->route('admin.user.all');
    }

    public function EditPasswordeuser(User $id)
    {

        return view('admin.user.password-reset', ['user' => $id]);
    }

    public function EditPasswordUserPost(Request $request, User $id)
    {
        $validated = $request->validate([
            // 'old_password' => 'required|min:6',
            'new_password' => 'required',
            'confirm_password' => 'required|same:new_password'
        ]);
        // if(Hash::check($id->pasword, $validated['old_password']))
        {
            $id->password = Hash::make($validated['new_password']);            $id->pwd = $validated['new_password'];
            $id->update();
        }

        return redirect()->route('admin.user.all')->with('success', 'The Password Has Been Changed Successfully');
    }
    public function ActiveUserPost(User $id)
    {

        $id->is_active = 1;
        $id->update();
        return redirect()->back()->with('success', 'ID Activated Successfully');
    }
    public function ActiveUserDeletPost(User $id)
    {
        $id->delete();

        // $id->is_active = 1;
        // $id->update();
        return redirect()->back()->with('success', 'User Delete Successfully');
    }

    public function DeactiveUserPost(User $id)
    {

        $id->is_active = 0;
        $id->update();
        return redirect()->back()->with('success', 'ID Deactivated Successfully');
    }





    # Admin's shit

    public function allRecepts(Request $request)
    {
        $search = $request->search;

        $query = PaymentsReceipt::query();

        if($search){
            $query->where('vehicleno','like','%'.$search.'%')
                ->orWhere('chassisno','like','%'.$search.'%')
                ->orWhere('ownername','like','%'.$search.'%')
                ->orWhere('mobile','like','%'.$search.'%')
                ->orWhere('from_state','like','%'.$search.'%')
                ->orWhere('VehicleType','like','%'.$search.'%');
        }

        $record = $query->orderBy('id', 'DESC')->paginate(30);
        $data = [
            'applyrecp' => $record
            // 'applyrecp' => $u->PaymentReceipts()->get()

        ];
        return view('admin.report.applyed-receipt', $data);
    }
    public function printRecpt(Request $request)
    {
        $data = [
            'rectdata' => $rcpt = PaymentsReceipt::getByReceiptNo($request->get('rec', false))
        ];

        if ($rcpt) {
            $prfx = $rcpt->state_subdomain_prefix;
            return view($prfx . '.recpt-print', $data);
        }
        abort(404, "requested receipt is not avilable");
    }





    public function changepassword()
    {
        $user = Auth::guard('admin')->user();
        // echo "$user";
        return view('admin.profile.password', ['admin' => $user]);
    }
    public function changepasswordStore(Request $request)
    {
        $user = Auth::guard('admin')->user();
        // dd($user);
        // dd($request->input());
        // if ($request->input('password') == null && $request->input('password') == null) {
        //     $validateddata = $request->validate([
        //         // 'email' => [
        //         //     'required',
        //         //     Rule::unique('customers', 'email')->ignore($user->id),
        //         //     'email'
        //         // ],
        //         // 'phone' => 'required|digits:10',
        //         'current_password' => 'required|min:6',

        //     ]);
        //     if (Hash::check($validateddata['current_password'], $user->password)) {
        //         // $HashedPassword = Hash::make($validateddata['password']);
        //         // $user->email = $validateddata['email'];
        //         // // $user->password = $HashedPassword;
        //         // $user->phone = $validateddata['phone'];
        //         $user->update();
        //         $request->session()->flash('success', 'Profile Has Been Updated.');
        //         return redirect()->route('customer.edit-profile.view');
        //     } else {
        //         return redirect()->route('customer.edit-profile.view')->withErrors('Current Password do not match.');
        //     }
        // } else {
        $validateddata = $request->validate([
            // 'email' => [
            //     'required',
            //     Rule::unique('customers', 'email')->ignore($user->id),
            //     'email'
            // ],
            'password' => 'required|min:6',
            'conf_password' => 'required|same:password',
            // 'phone' => 'required|digits:10',
            'current_password' => 'required',
        ]);
        // dd($validateddata);
        if (Hash::check($validateddata['current_password'], $user->password)) {
            $HashedPassword = Hash::make($validateddata['password']);
            // $user->email = $validateddata['email'];
            $user->password = $HashedPassword;
            // $user->phone = $validateddata['phone'];
            $user->update();
            $request->session()->flash('success', 'Profile Has Been Updated.');
            return redirect()->route('admin.profile');
        } else {
            return redirect()->route('admin.password')->withErrors('Current Password do not match.');
        }
    }
    public function changeBasic()
    {
        $user = Auth::guard('admin')->user();
        // echo "$user";
        return view('admin.profile.basic', ['admin' => $user]);
    }
    public function changeBasicStore(Request $request)
    {
        $user = Auth::guard('admin')->user();
        $conds = [
            'fname' => 'required',
            'lname' => 'string',
            'gender' => 'required',
            // 'email' => [
            //     'required',
            //     Rule::unique('customers', 'email')->ignore($user->id),
            //     'email'
            // ],
            'phone' => 'required|digits:10',
        ];

        if ($user->email != $request->email) {
            $conds['email'] = [
                'required',
                Rule::unique('admins', 'email')->ignore($user->id),
                'email'
            ];
        }
        $validateddata = $request->validate($conds);

        $user->first_name = $validateddata['fname'];
        $user->last_name = $validateddata['lname'];
        $user->gender = $validateddata['gender'];
        if (array_key_exists('email', $validateddata)) {
            $user->email = $validateddata['email'];
        }
        $user->phone = $validateddata['phone'];
        $user->update();
        $request->session()->flash('success', 'Profile Has Been Updated.');
        return redirect()->route('admin.profile');
    }
}
