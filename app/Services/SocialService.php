<?php

namespace App\Services;

use App\Contracts\Services\SocialInterface;
use App\Models\User;
use Sentinel;
use Socialite;

class SocialService implements SocialInterface
{
    public function createOrGetUser($social)
    {
        $authUser = Socialite::driver($social)->user();

        $user = User::updateOrCreate(
            [
                'email' => $authUser->email,
            ],
            [
                'provider_id' => $authUser->id,
                'name' => $authUser->name,
                'level_id' => 3,
                'local_id' => 64,
            ]
        );

        return $user;
    }
}