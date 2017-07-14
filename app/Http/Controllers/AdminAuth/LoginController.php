<?php

namespace App\Http\Controllers\AdminAuth;

use App\Exceptions\AuthenticatesLogout;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Log;

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

    use AuthenticatesUsers, AuthenticatesLogout {
        AuthenticatesLogout::logout insteadof AuthenticatesUsers;
    }

    /**
     * Where to redirect users after login.
     *
     * @var string
     */
    protected $redirectTo = "/admin";

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(Request $request)
    {
        $this->middleware("guest.admin")->except("/admin/logout");
    }

    protected function guard()
    {
        return Auth::guard('admin');
    }

    public function logout(Request $request)
    {
        $this->guard()->logout();
        $request->session()->flush();
        $request->session()->regenerate();
        return redirect('/admin');
    }

    public function showLoginForm(Request $request)
    {
        $request->session()->flash("url.admin.intended", url()->previous());
        return view('admin.auth.login');
    }

    public function postLogin(Request $request)
    {
        $this->validateLogin($request);
        // If the class is using the ThrottlesLogins trait, we can automatically throttle
        // the login attempts for this application. We'll key this by the username and
        // the IP address of the client making these requests into this application.
        if ($this->hasTooManyLoginAttempts($request)) {
            $this->fireLockoutEvent($request);
            return $this->sendLockoutResponse($request);
        }

        if ($this->attemptLogin($request)) {
            //login success
            //event(new LoginEvent($this->guard()->user(), new Agent(),$request->getClientIp(), time()));
            return $this->sendLoginResponse($request);
        } else {
            Log::info("登录失败");
        }

        // If the login attempt was unsuccessful we will increment the number of attempts
        // to login and redirect the user back to the login form. Of course, when this
        // user surpasses their maximum number of attempts they will get locked out.
        $this->incrementLoginAttempts($request);

        return redirect("/admin/login")->withInput($request->only("username", "remember"))->withErrors([
            'email' => '无效的用户名或密码'
        ]);


    }

    /* //从请求获取所需的授权凭据
     protected function credentials(Request $request)
     {
         $field = filter_var($request->get($this->username()), FILTER_VALIDATE_EMAIL) ? "email" : "username";

         return [
             $field => $request->get($this->username()),
             "password" => $request->password,
         ];
     }*/

    public function username()
    {
        return 'username';
    }

    protected function sendLoginResponse(Request $request)
    {
        $request->session()->regenerate();

        $this->clearLoginAttempts($request);
        return $this->authenticated($request, $this->guard()->user())
            ?: redirect()->intended(empty($request->session()->get("url.admin.intended")) ? $this->redirectTo : $request->session()->get("url.admin.intended"));
    }


}
