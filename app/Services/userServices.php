<?php
namespace App\services;

use App\Models\User;
use Illuminate\Support\Facades\Hash;

class userServices
{
    public function store($user)
    {
        try {
            User::create([
                'name'=>$user['name'],
                'email'=>$user['email'],
                'code'=>$user['code'],
                'role_id'=>2,
                'password'=>Hash::make($user['password']),
            ]);
            return true;
        } catch (\Throwable $th) {
            throw new \Exception($th->getMessage());
            
        }
    }
}
