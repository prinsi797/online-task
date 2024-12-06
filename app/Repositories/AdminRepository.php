<?php

namespace App\Repositories;
use App\Models\Admin;
use App\Models\PasswordReset;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class AdminRepository
{
    public function login(array $credentials): bool
    {
        return Auth::attempt($credentials);

    }

}
