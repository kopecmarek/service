<?php

namespace App\Http\Middleware;

use App\Models\Order;
use App\Providers\RouteServiceProvider;
use Closure;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class orderCheckUser
{
    /**
     * Handle an incoming request.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \Closure  $next
     * @return mixed
     */

    public function handle(Request $request, Closure $next)
    {
        if(!$this->checkOrderIdWithUserId($request->id))
        {
            return redirect(RouteServiceProvider::HOME);
        }
        else return $next($request);
    }

    /**
     * Check if user is user of order
     *
     * @param $orderId
     * @return bool
     */

    protected function checkOrderIdWithUserId($orderId)
    {
        $userId = Auth::id();
        $client = Order::all()->find($orderId)->client_id;
        if($userId == $client) return true;
        else return false;
    }
}
