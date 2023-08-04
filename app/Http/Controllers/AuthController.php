<?php

namespace App\Http\Controllers;

use App\Interfaces\AuthRepositoryInterface;
use App\Traits\Responses;
use Illuminate\Http\Request;
use Auth;

class AuthController extends Controller
{
    use Responses;

    public $authRepo;

    public function __construct(AuthRepositoryInterface $authRepo)
    {
        $this->authRepo = $authRepo;
    }

    public function logout(Request $request)
    {
        Auth::logout();
        $request->session()->invalidate();
        $request->session()->regenerateToken();
        return redirect('login');
    }

    public function login()
    {
        if (!Auth::check())
            return view('login');
        else
            return redirect('/');
    }

    public function userLogin(Request $request)
    {
        $loginData  = ['email' => $request->email, 'password' => $request->password];
        return $this->responseJson('User - Login', $this->authRepo->userLogin($loginData));
    }
}
