<?php

namespace App\Http\Services;

use Illuminate\Http\Request;


class AuthService
{
    protected $JWTAuth;

#    public function __construct()
#    {
#        $this->JWTAuth = new JWTAuth();
#    }

    public function __invoke(Request $request)
    {
        $jwttoken = $request->header('x-goog-iap-jwt-assertion');
        $tokens = explode('.',$jwttoken);

        foreach ($tokens as $token)
        {
            $tokendecode = base64_decode($token);
            $userinfo[] = json_decode($tokendecode);
        }
        $username = $userinfo[1]->gcip->email;

        return $username;
    }
}