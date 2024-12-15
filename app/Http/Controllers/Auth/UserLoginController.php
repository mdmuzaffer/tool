<?php

namespace App\Http\Controllers\Auth;

use App\Admin;
use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class UserLoginController extends Controller
{

    public function __construct()
    {
        $this->middleware('guest:user', ['except' => ['logout', 'logoutuk', 'logoutjh', 'logouthp', 'logoutka', 'logoutpb', 'logouthr', 'logoutbr', 'logoutgj', 'logoutmh', 'logoutmp','logoutraj']]);
    }
    public function showLoginForm()
    {
        $data = [
            'loginTitle' => 'User Login',
            'loginRoute' => route('user.login.submit')
        ];
        // return view('auth.user-login', $data);
        return view('auth.user-login', $data);
    }
    
     public function showHome(){
         return view('home');
    }
	public function showLoginFormraj()
    {
        $data = [
            'loginTitle' => 'User Login',
            'loginRoute' => route('user.login.submit')
        ];
        // return view('auth.user-login', $data);
        return view('auth.raj.user-login', $data);
    }
	public function loginraj(Request $request)
    {
        // Validate the form data
        $this->validate($request, [
            // 'email'   => 'required|email',
            // 'password' => 'required|min:6',
            'email'   => 'required',
            'password' => 'required',
        ]);
        $stateId = Admin::getServiceStateBySubdomainPrefix('raj');
        // Attempt to log the user in
        if (Auth::guard('user')->attempt(['email' => $request->email, 'password' => $request->password, 'is_active' => true, 'state' => $stateId->id,], $request->remember)) {
            Auth::guard('user')->user()->updateLoginTime();
            // if successful, then redirect to their intended location
            return redirect()->intended(route('user.dashboard.raj'));
        }
        // if unsuccessful, then redirect back to the login with the form data
        return redirect()->back()->withInput($request->only('email', 'remember'));
    }
   public function logoutraj()
    {
        // dd("asdfgh");
        Auth::guard('user')->logout();
        return redirect()->route('home');
    }

   public function showLoginFormUK()
    {
        $data = [
            'loginTitle' => 'User Login',
            'loginRoute' => route('user.login.submit')
        ];
        // return view('auth.user-login', $data);
        return view('auth.uk.user-login', $data);
    }
	public function showLoginFormjh()
    {
        $data = [
            'loginTitle' => 'User Login',
            'loginRoute' => route('user.login.submit')
        ];
        // return view('auth.user-login', $data);
        return view('auth.jh.user-login', $data);
    }
	public function showLoginFormhp()
    {
        $data = [
            'loginTitle' => 'User Login',
            'loginRoute' => route('user.login.submit')
        ];
        // return view('auth.user-login', $data);
        return view('auth.hp.user-login', $data);
    }
	public function showLoginFormka()
    {
        $data = [
            'loginTitle' => 'User Login',
            'loginRoute' => route('user.login.submit')
        ];
        // return view('auth.user-login', $data);
        return view('auth.ka.user-login', $data);
    }
    public function showLoginFormPB()
    {
        $data = [
            'loginTitle' => 'User Login',
            'loginRoute' => route('user.login.submit')
        ];
        // return view('auth.user-login', $data);
        return view('auth.pb.user-login', $data);
    }
    public function showLoginFormHR()
    {
        $data = [
            'loginTitle' => 'User Login',
            'loginRoute' => route('user.login.submit')
        ];
        // return view('auth.user-login', $data);
        return view('auth.hr.user-login', $data);
    }
    public function showLoginFormBR()
    {
        $data = [
            'loginTitle' => 'User Login',
            'loginRoute' => route('user.login.submit')
        ];
        // return view('auth.user-login', $data);
        return view('auth.br.user-login', $data);
    }
    public function showLoginFormGJ()
    {
        $data = [
            'loginTitle' => 'User Login',
            'loginRoute' => route('user.login.submit')
        ];
        // return view('auth.user-login', $data);
        return view('auth.gj.user-login', $data);
    }
    public function showLoginFormMH()
    {
        $data = [
            'loginTitle' => 'User Login',
            'loginRoute' => route('user.login.submit')
        ];
        // return view('auth.user-login', $data);
        return view('auth.mh.user-login', $data);
    }
    // public function showLoginFormMP()
    // {
    //     $data = [
    //         'loginTitle' => 'User Login',
    //         'loginRoute' => route('user.login.submit')
    //     ];
    //     // return view('auth.user-login', $data);
    //     return view('auth.mp.user-login', $data);
    // }

    public function login(Request $request)
    {
        // Validate the form data
        $this->validate($request, [
            // 'email'   => 'required|email',
            // 'password' => 'required|min:6',
            'email'   => 'required',
            'password' => 'required',
        ]);
        //$stateId = Admin::getServiceStateBySubdomainPrefix('up');
        // Attempt to log the user in
        if (Auth::guard('user')->attempt(['email' => $request->email, 'password' => $request->password, 'is_active' => true,], $request->remember)) {
            Auth::guard('user')->user()->updateLoginTime();
            // if successful, then redirect to their intended location
            return redirect()->intended(route('select-state'));
        }
        // if unsuccessful, then redirect back to the login with the form data
        return redirect()->back()->withErrors('Invalid Email Or Password')->withInput($request->only('email', 'remember'));
    }
    public function loginuk(Request $request)
    {
        // Validate the form data
        $this->validate($request, [
            // 'email'   => 'required|email',
            // 'password' => 'required|min:6',
            'email'   => 'required',
            'password' => 'required',
        ]);
        $stateId = Admin::getServiceStateBySubdomainPrefix('uk');
        // Attempt to log the user in
        if (Auth::guard('user')->attempt(['email' => $request->email, 'password' => $request->password, 'is_active' => true, 'state' => $stateId->id,], $request->remember)) {
            Auth::guard('user')->user()->updateLoginTime();
            // if successful, then redirect to their intended location
            return redirect()->intended(route('user.dashboard.uk'));
        }
        // if unsuccessful, then redirect back to the login with the form data
        return redirect()->back()->withInput($request->only('email', 'remember'));
    }
	
	   public function loginjh(Request $request)
    {
        // Validate the form data
        $this->validate($request, [
            // 'email'   => 'required|email',
            // 'password' => 'required|min:6',
            'email'   => 'required',
            'password' => 'required',
        ]);
        $stateId = Admin::getServiceStateBySubdomainPrefix('jh');
		
        // Attempt to log the user in
        if (Auth::guard('user')->attempt(['email' => $request->email, 'password' => $request->password, 'is_active' => true, 'state' => $stateId->id,], $request->remember)) {
            Auth::guard('user')->user()->updateLoginTime();
            // if successful, then redirect to their intended location
            return redirect()->intended(route('user.dashboard.jh'));
        }
        // if unsuccessful, then redirect back to the login with the form data
        return redirect()->back()->withInput($request->only('email', 'remember'));
    }
	public function loginhp(Request $request)
    {
        // Validate the form data
        $this->validate($request, [
            // 'email'   => 'required|email',
            // 'password' => 'required|min:6',
            'email'   => 'required',
            'password' => 'required',
        ]);
        $stateId = Admin::getServiceStateBySubdomainPrefix('hp');
		
        // Attempt to log the user in
        if (Auth::guard('user')->attempt(['email' => $request->email, 'password' => $request->password, 'is_active' => true, 'state' => $stateId->id,], $request->remember)) {
            Auth::guard('user')->user()->updateLoginTime();
            // if successful, then redirect to their intended location
            return redirect()->intended(route('user.dashboard.hp'));
        }
        // if unsuccessful, then redirect back to the login with the form data
        return redirect()->back()->withInput($request->only('email', 'remember'));
    }
	public function loginka(Request $request)
    {
        // Validate the form data
        $this->validate($request, [
            // 'email'   => 'required|email',
            // 'password' => 'required|min:6',
            'email'   => 'required',
            'password' => 'required',
        ]);
        $stateId = Admin::getServiceStateBySubdomainPrefix('ka');
		
        // Attempt to log the user in
        if (Auth::guard('user')->attempt(['email' => $request->email, 'password' => $request->password, 'is_active' => true, 'state' => $stateId->id,], $request->remember)) {
            Auth::guard('user')->user()->updateLoginTime();
            // if successful, then redirect to their intended location
            return redirect()->intended(route('user.dashboard.ka'));
        }
        // if unsuccessful, then redirect back to the login with the form data
        return redirect()->back()->withInput($request->only('email', 'remember'));
    }
   
    public function loginhr(Request $request)
    {
        // Validate the form data
        $this->validate($request, [
            // 'email'   => 'required|email',
            // 'password' => 'required|min:6',
            'email'   => 'required',
            'password' => 'required',
        ]);
        $stateId = Admin::getServiceStateBySubdomainPrefix('hr');
        // Attempt to log the user in
        if (Auth::guard('user')->attempt(['email' => $request->email, 'password' => $request->password, 'is_active' => true, 'state' => $stateId->id,], $request->remember)) {
            Auth::guard('user')->user()->updateLoginTime();
            // if successful, then redirect to their intended location
            return redirect()->intended(route('user.dashboard.hr'));
        }
        // if unsuccessful, then redirect back to the login with the form data
        return redirect()->back()->withInput($request->only('email', 'remember'));
    }
    public function loginpb(Request $request)
    {
        // Validate the form data
        $this->validate($request, [
            // 'email'   => 'required|email',
            // 'password' => 'required|min:6',
            'email'   => 'required',
            'password' => 'required',
        ]);
        $stateId = Admin::getServiceStateBySubdomainPrefix('pb');
        // Attempt to log the user in
        if (Auth::guard('user')->attempt(['email' => $request->email, 'password' => $request->password, 'is_active' => true, 'state' => $stateId->id,], $request->remember)) {
            Auth::guard('user')->user()->updateLoginTime();
            // if successful, then redirect to their intended location
            return redirect()->intended(route('user.dashboard.pb'));
        }
        // if unsuccessful, then redirect back to the login with the form data
        return redirect()->back()->withInput($request->only('email', 'remember'));
    }
    public function loginbr(Request $request)
    {
        // dd($request);
        // Validate the form data
        $this->validate($request, [
            // 'email'   => 'required|email',
            // 'password' => 'required|min:6',
            'email'   => 'required',
            'password' => 'required',
        ]);
        $stateId = Admin::getServiceStateBySubdomainPrefix('br');
        // Attempt to log the user in
        if (Auth::guard('user')->attempt(['email' => $request->email, 'password' => $request->password, 'is_active' => true, 'state' => $stateId->id,], $request->remember)) {
            Auth::guard('user')->user()->updateLoginTime();
            // if successful, then redirect to their intended location
            return redirect()->intended(route('user.dashboard.br'));
        }
        // if unsuccessful, then redirect back to the login with the form data
        return redirect()->back()->withInput($request->only('email', 'remember'));
    }
    public function logingj(Request $request)
    {
        // dd($request);
        // Validate the form data
        $this->validate($request, [
            // 'email'   => 'required|email',
            // 'password' => 'required|min:6',
            'email'   => 'required',
            'password' => 'required',
        ]);
        $stateId = Admin::getServiceStateBySubdomainPrefix('gj');
        // Attempt to log the user in
        if (Auth::guard('user')->attempt(['email' => $request->email, 'password' => $request->password, 'is_active' => true, 'state' => $stateId->id,], $request->remember)) {
            Auth::guard('user')->user()->updateLoginTime();
            // if successful, then redirect to their intended location
            return redirect()->intended(route('user.dashboard.gj'));
        }
        // if unsuccessful, then redirect back to the login with the form data
        return redirect()->back()->withInput($request->only('email', 'remember'));
    }
    public function loginmh(Request $request)
    {
        // dd($request);
        // Validate the form data
        $this->validate($request, [
            // 'email'   => 'required|email',
            // 'password' => 'required|min:6',
            'email'   => 'required',
            'password' => 'required',
        ]);
        $stateId = Admin::getServiceStateBySubdomainPrefix('mh');
        // Attempt to log the user in
        if (Auth::guard('user')->attempt(['email' => $request->email, 'password' => $request->password, 'is_active' => true, 'state' => $stateId->id,], $request->remember)) {
            Auth::guard('user')->user()->updateLoginTime();
            // if successful, then redirect to their intended location
            return redirect()->intended(route('user.dashboard.mh'));
        }
        // if unsuccessful, then redirect back to the login with the form data
        return redirect()->back()->withInput($request->only('email', 'remember'));
    }

    // public function loginmp(Request $request)
    // {
    //     // dd($request);
    //     // Validate the form data
    //     $this->validate($request, [
    //         // 'email'   => 'required|email',
    //         // 'password' => 'required|min:6',
    //         'email'   => 'required',
    //         'password' => 'required',
    //     ]);
    //     $stateId = Admin::getServiceStateBySubdomainPrefix('up');
    //     // Attempt to log the user in
    //     if (Auth::guard('user')->attempt(['email' => $request->email, 'password' => $request->password, 'is_active' => true, 'state' => $stateId->id,], $request->remember)) {
    //         Auth::guard('user')->user()->updateLoginTime();
    //         // if successful, then redirect to their intended location
    //         return redirect()->intended(route('user.dashboard.mp'));
    //     }
    //     // if unsuccessful, then redirect back to the login with the form data
    //     return redirect()->back()->withInput($request->only('email', 'remember'));
    // }




    public function logout()
    {
        Auth::guard('user')->logout();
        return redirect()->route('home');
    }
    public function logoutuk()
    {
        // dd("asdfgh");
        Auth::guard('user')->logout();
        return redirect()->route('home');
    }
	public function logoutjh()
    {
        // dd("asdfgh");
        Auth::guard('user')->logout();
        return redirect()->route('home');
    }
	public function logouthp()
    {
        // dd("asdfgh");
        Auth::guard('user')->logout();
        return redirect()->route('home');
    }
	public function logoutka()
    {
        // dd("asdfgh");
        Auth::guard('user')->logout();
        return redirect()->route('home');
    }
    public function logoutpb()
    {
        // dd("asdfgh");
        Auth::guard('user')->logout();
        return redirect()->route('home');
    }
    public function logouthr()
    {
        // dd("asdfgh");
        Auth::guard('user')->logout();
        return redirect()->route('home');
    }
    public function logoutbr()
    {
        // dd("asdfgh");
        Auth::guard('user')->logout();
        return redirect()->route('home');
    }
    public function logoutgj()
    {
        // dd("asdfgh");
        Auth::guard('user')->logout();
        return redirect()->route('home');
    }
    public function logoutmh()
    {
        // dd("asdfgh");
        Auth::guard('user')->logout();
        return redirect()->route('home');
    }
     public function logoutmp()
     {
         // dd("asdfgh");
         Auth::guard('user')->logout();
         return redirect()->route('home');
     }
     public function logouttm()
     {
         // dd("asdfgh");
         Auth::guard('user')->logout();
         return redirect()->route('home');
     }
     public function logoutap()
     {
         // dd("asdfgh");
         Auth::guard('user')->logout();
         return redirect()->route('home');
     }
}
