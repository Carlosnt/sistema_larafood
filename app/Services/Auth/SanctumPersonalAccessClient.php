<?php

namespace App\Services\Auth;

use Laravel\Sanctum\PersonalAccessToken as SanctumPersonalAccessToken;

class SanctumPersonalAccessClient extends SanctumPersonalAccessToken
{
    protected $table = 'personal_access_tokens';
}
