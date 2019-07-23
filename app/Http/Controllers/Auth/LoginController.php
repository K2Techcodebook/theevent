<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
    use Illuminate\Http\Request;
    use Auth;
    use App\User;


class LoginController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Login Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles authenticating users for the application and
    | redirecting them to your home screen. The controller uses a trait
    | to conveniently provide its functionality to your applications.
    |
    */

    use AuthenticatesUsers;

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = '/dashboard';

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }


    public function affiliateLogin(Request $request)
    {
        $this->validate($request, [
               'email' => ['required', 'string', 'max:255'],
              'password' => ['required', 'string', 'min:6']
        ]);

        if (Auth::guard('users')->attempt(['email' => $request->email, 'password' => $request->password], $request->get('remember')))
        {
if(Auth::user()->is_permission == 0)
{
   return redirect()->intended(route('package'));
}else {
  // return redirect()->intended(route('package'));
  return redirect()->intended(route('dashboard'));
}


        }else
        {
         $message ='Login Details Incorrect Plsease Check Again!';
         return back()->withInput($request->only('email', 'remember'))->with('status', $message);
        }
        
    }

        public function logout(Request $request)
            {
                $this->guard()->logout();

                $request->session()->invalidate();

                return $this->loggedOut($request) ?: redirect('/');
            }

}
