<?php

namespace App\Interfaces;

interface AuthRepositoryInterface
{
    public function userLogin(array $loginData);
}
