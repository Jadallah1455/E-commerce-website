<?php

namespace App\Http\Controllers\Auth;

use App\Http\Controllers\Controller;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
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
    // protected $redirectTo = RouteServiceProvider::HOME;//هادا السطر هو المسؤول عن عملية اعاده التوجيه والافضل اعملية زي الداله هادي

    public function redirectTo()
    {
        if(Auth::user()->type == 'admin'){
            return 'admin';
        }else{
            return '/';
        }

    }

    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->middleware('guest')->except('logout');
    }

    public function username()
    {

        //dd(request()->all());

        $type= 'phone';
        $input = request()->email;
        if(filter_var($input, FILTER_VALIDATE_EMAIL)) {
            $type='email';
        }

        if($type == 'phone'){
            // request()->request->remove('email');
        }

        request()->request->add([ $type=>$input ]);
        // request()->merge([ $type=>$input ]);

        // dd(request()->all());

        return $type;
    }
}

// validate_filters  هادي بتتحقق من الشكل
// Sanitize_filters بتتحقق من الشكل وبتغير فيه لو بدك بتعدل عليه
