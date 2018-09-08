<?php

namespace App\Contracts\Services;

interface SocialInterface
{
    public function createOrGetUser($social);
}