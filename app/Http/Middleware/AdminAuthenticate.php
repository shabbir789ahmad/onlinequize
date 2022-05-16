<?php

namespace App\Http\Middleware;

use Illuminate\Auth\Middleware\Authenticate as Middleware;

class AdminAuthenticate extends Middleware
{
    protected function authenticate($request, array $guards)
    {
       
            if ($this->auth->guard('admin')->check()) {
                return $this->auth->shouldUse('admin');
            }
      

        $this->unauthenticated($request, ['admin']);
    }
    protected function redirectTo($request)
    {
        if (! $request->expectsJson()) {
            return route('admin.login');
        }
    }
}
