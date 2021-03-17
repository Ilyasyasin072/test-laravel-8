<?php

namespace App\Http\Middleware;

use Closure;
use Illuminate\Support\Facades\Auth;
use Illuminate\Auth\Middleware\Authenticate as Middleware;
use App\Models\UserDetail;

class AuthMiddleware extends Middleware
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */

    protected $guards = [];
    public function handle($request, Closure $next, $guard = null)
    {
        if (Auth::guard($guard)->check()) {

            $users = Auth::user()->id;

            \Auth::loginUsingId($users);

            $user_status = UserDetail::find($users);

            if ($user_status->status == 'active') {

                return $next($request);

            } else {

                return redirect('/');

            }
        }
        return redirect('/');
    }
}
