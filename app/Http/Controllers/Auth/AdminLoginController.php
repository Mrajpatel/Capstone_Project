<?php

namespace App\Http\Controllers\Auth;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Auth;

class AdminLoginController extends Controller
{
    
    /**
     * Declare middleware for the forget password controller
     *
     * @return void
     */
    public function __construct(){
        $this->middleware('guest:admin', ['except' => ['logout']]);
    }
    
    /**
     * Return the login form.
     *
     * @return view
     */
    public function showLoginForm(){
        return view('auth.admin-login');
    }

    /**
     * Return the view once login is successfull
     *
     * @return view
     */
    public function login(Request $request){
        $this->validate($request, [
            'email' => 'required|email',
            'password' => 'required|min:6'
        ]);

        if(Auth::guard('admin')->attempt(['email' => $request->email, 'password' => $request->password], $request->remember)){
            return redirect()->intended(route('admin.dashboard'));
        }

        return redirect()->back()->withInput($request->only('email', 'remember'));
    }

    /**
     * Return the admin to the root view once logged out
     *
     * @return view
     */
    public function logout()
    {
        Auth::guard('admin')->logout();
        return redirect('/');
    }
}
