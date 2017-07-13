<?php

namespace App\Http\Controllers\Auth;

use App\Models\User;
use App\Http\Controllers\Controller;
use forxer\Gravatar\Gravatar;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Validator;
use Illuminate\Foundation\Auth\RegistersUsers;
use Jrean\UserVerification\Facades\UserVerification;
use Jrean\UserVerification\Traits\VerifiesUsers;

class RegisterController extends Controller
{
    /*
    |--------------------------------------------------------------------------
    | Register Controller
    |--------------------------------------------------------------------------
    |
    | This controller handles the registration of new users as well as their
    | validation and creation. By default this controller uses a trait to
    | provide this functionality without requiring any additional code.
    |
    */

    use RegistersUsers;

    use VerifiesUsers;

    /**
     * Where to redirect users after registration.
     *
     * @var string
     */
    protected $redirectTo = '/verify/email';
    //...
    public $redirectIfVerified = '/';

    //Where to reditect if the authenticated user is already verified.
    public $redirectAfterVerification = '/';

    //Where to redirect after a successful verification token verification.
    public $redirectIfVerificationFails = '/';

    //Where to redirect after a failling token verification.
    public $verificationErrorView = 'laravel-user-verification::user-verification';

    //Name of the view returned by the getVerificationError method.
    public $verificationEmailView = 'laravel-user-verification::email';



    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest',['except' => ['getVerification' , 'getVerificationError']]);
    }

    /**
     * Get a validator for an incoming registration request.
     *
     * @param  array  $data
     * @return \Illuminate\Contracts\Validation\Validator
     */
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'name' => 'required|string|max:255|unique:users',
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
        ]);
    }

    /**
     * Create a new user instance after a valid registration.
     *
     * @param  array  $data
     * @return User
     */
    protected function create(array $data)
    {
        return User::create([
            'name' => $data['name'],
            'email' => $data['email'],
            'password' => bcrypt($data['password']),
            'uuid' => $this->getUUid(),
            'head_img' => Gravatar::image($data['email'])
        ]);
    }

    /**
     * @return uuid
     */
    public function getUUid()
    {
        if (function_exists('com_create_guid') === true){
            return trim(com_create_guid(),'{}');
        }
        return sprintf('%04X%04X-%04X-%04X-%04X-%04X%04X%04X', mt_rand(0, 65535), mt_rand(0, 65535), mt_rand(0, 65535), mt_rand(16384, 20479), mt_rand(32768, 49151), mt_rand(0, 65535), mt_rand(0, 65535), mt_rand(0, 65535));
    }


    public function register(Request $request)
    {
       /* $this->validator($request->all())->validate();

        $user = $this->create($request->all());

        event(new Registered($user));

        $this->guard()->login($user);

        UserVerification::generate($user);

        UserVerification::send($user, '请验证您的邮箱');

        return $this->registered($request, $user) ?: redirect($this->redirectPath());*/
        $validator = $this->validator($request->all());

        if ($validator->fails()) {
            $this->throwValidationException(
                $request, $validator
            );
        }

        $user = $this->create($request->all());

        // 生成用户的验证 token，并将用户的 verified 设置为 0
        UserVerification::generate($user);

        // 给用户发邮件，邮件内容就是上文提到的 resources/views/emails/user-verification.blade.php 模板里的内容
        UserVerification::send($user, '请验证您的邮箱');

        //return redirect($this->redirectPath());
        return view("auth.verifyEmail",["user" => $user]);

    }

    
}
