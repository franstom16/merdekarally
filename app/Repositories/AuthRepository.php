<?php

namespace App\Repositories;

use App\Interfaces\AuthRepositoryInterface;
use App\Models\User;
use App\Traits\Responses;
use Illuminate\Support\Facades\Validator;
use Auth;

class AuthRepository implements AuthRepositoryInterface
{
    use Responses;

    public function userLogin($loginData)
    {
        try
        {
            $validator  = $this->validation($loginData, User::rulesLogin());
            if (!empty($validator))
            {
                return $validator;
            }
            else
            {
                if (! $token = Auth::attempt($loginData))
                {
                    return (object) ['errors' => ['error_code' => 422, 'error_msg' => ['Email or Password is wrong']]];
                }
                else
                {
                    return Auth::user();
                }
            }
        }
        catch (\Exception $e)
        {
            return (object) ['errors' => ['error_code' => 500, 'error_msg' => $e->getMessage()]];
        }
    }
}
