<?php

namespace App\Http\Middleware;

use Illuminate\Foundation\Http\Middleware\VerifyCsrfToken as Middleware;

class VerifyCsrfToken extends Middleware
{
    /**
     * The URIs that should be excluded from CSRF verification.
     *
     * @var array<int, string>
     */
    protected $except = [
        'stripe/*',
    ];

//    protected function getTokenFromRequest($request)
//    {
//        $token = $request->input('_token') ?: $request->header('X-CSRF-TOKEN');
//
//
//        $xsrf_token_header = str_replace('%3D', '=', $request->header('X-XSRF-TOKEN'));
//        if (! $token && $header = $xsrf_token_header) {
//            try {
//                $token = CookieValuePrefix::remove($this->encrypter->decrypt($header, static::serialized()));
//            } catch (DecryptException $e) {
//                $token = '';
//            }
//        }
//
//        return $token;
//   }

}
