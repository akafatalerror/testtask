<?php

namespace App\Models;
use App\User as LaravelUser;

class User extends LaravelUser
{

    public static function createBySocialProvider($providerUser)
    {

        return self::create([
            'email'    => $providerUser->getEmail(),
            'username' => $providerUser->getNickname(),
            'name'     => $providerUser->getName(),
            'password' => str_random(12),
            'avatar'   => $providerUser->avatar,
            'token'    => $providerUser->token,
        ]);
    }
}
