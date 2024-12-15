<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;

class ManagerLoginController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest:manager', ['except' => ['logout']]);
    }
    public function showLoginForm()
    {
        $data = [
            'loginTitle' => 'Manager Login',
            'loginRoute' => route('manager.login.submit')
        ];
        return view('auth.manager-login', $data);
    }
    public function login(Request $request)
    {
        // Validate the form data
        $this->validate($request, [
            'email'   => 'required|email',
            'password' => 'required|min:6'
        ]);
        // Attempt to log the user in
        if (Auth::guard('manager')->attempt(['email' => $request->email, 'password' => $request->password], $request->remember)) {
            Auth::guard('manager')->user()->updateLoginTime();
            // if successful, then redirect to their intended location
            return redirect()->intended(route('manager.dashboard'));
        }
        // if unsuccessful, then redirect back to the login with the form data
        return redirect()->back()->withInput($request->only('email', 'remember'));
    }


    public function logout()
    {
        Auth::guard('manager')->logout();
        return redirect('/');
    }
}
