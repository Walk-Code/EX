<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

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
    protected $redirectTo = "/";

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct(Request $request)
    {
        $this->middleware("guest")->except("logout");

        if($request){
            $this->redirectTo = $request->path();
        }
    }

   /* public function postLogin(Request $request)
    {
        $this->validate($request,[
            "email" => "required|email",
            "password" => "required"
        ]);

        if (Auth::validate(["email" => $request->email, "password" => $request->password, "status" => 0])) {
            return redirect("login")->withInput($request->only("email", "remember"))->withErrors("您的帐户是无效或未验证");
        }

        $credentials = array("email" => $request,"password" => $request->password);

        if (Auth::attempt($credentials, $request->has("remember"))){
            return redirect()->intended($this->redirectPath());
        }

        return redirect("login")->withInput($request->only("email", "remember"))->withErrors([
                    "email" => "电子邮件地址或密码不正确",
            ]);

    }*/
   /* //从请求获取所需的授权凭据
    protected function credentials(Request $request)
    {
        $field = filter_var($request->get($this->username()), FILTER_VALIDATE_EMAIL) ? "email" : "username";

        return [
            $field => $request->get($this->username()),
            "password" => $request->password,
        ];
    }*/

}
