<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;


class FrontDeskLoginController extends Controller
{
    public function __construct()
    {
        $this->middleware('guest:front-desk', ['except' => ['logout']]);
    }
    public function showLoginForm()
    {
        $data = [
            'loginTitle' => 'Front Desk Login',
            'loginRoute' => route('front-desk.login.submit')
        ];
        return view('auth.front-desk-login', $data);
    }
    public function login(Request $request)
    {
        // Validate the form data
        $this->validate($request, [
            'email'   => 'required|email',
            'password' => 'required|min:6'
        ]);
        // Attempt to log the user in
        if (Auth::guard('front-desk')->attempt(['email' => $request->email, 'password' => $request->password], $request->remember)) {
            Auth::guard('front-desk')->user()->updateLoginTime();
            // if successful, then redirect to their intended location
            return redirect()->intended(route('front-desk.dashboard'));
        }

        // if unsuccessful, then redirect back to the login with the form data
        return redirect()->back()->withInput($request->only('email', 'remember'));
    }


    public function logout()
    {
        Auth::guard('front-desk')->logout();
        return redirect('/');
    }
}
