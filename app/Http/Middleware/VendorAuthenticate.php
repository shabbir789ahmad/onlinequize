<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;

class VendorAuthenticate extends Middleware
{
    protected function authenticate($request, array $guards)
    {
       
            if ($this->auth->guard('vendor')->check()) {
                return $this->auth->shouldUse('vendor');
            }
      

        $this->unauthenticated($request, ['vendor']);
    }
    protected function redirectTo($request)
    {
        if (! $request->expectsJson()) {
            return route('vendor.login');
        }
    }
}
