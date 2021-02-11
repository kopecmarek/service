<?php

namespace App\Http\Controllers\Order;

use App\Http\Controllers\Controller;
use App\Models\Order;
use Illuminate\Auth\Events\Registered;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Validator;
use Illuminate\Validation\Rule;

class RegisterOrderController extends Controller
{
    function __construct()
    {
        $this->middleware('auth');
    }

    public function register(Request $request)
    {
        $request->request->add(['client_id'=>Auth::id()]);
        $this->validator($request->all())->validate();
        event(new Registered($order = $this->create($request->all())));
        return $request->wantsJson()
            ? new JsonResponse([], 201)
            : redirect($this->redirectPath());
    }

    public function success(){
        return view('orders.informationOrder',['success'=>1]);
    }
    /**
     * Get the post register / login redirect path.
     *
     * @return string
     */
    public function redirectPath()
    {
        if (method_exists($this, 'redirectTo')) {
            return $this->redirectTo();
        }

        return property_exists($this, 'redirectTo') ? $this->redirectTo : '/order/success';
    }
    protected function validator(array $data)
    {
        return Validator::make($data, [
            'brand' => ['required', 'string', 'alpha_num', 'max:15'],
            'model' => ['required', 'string', 'max:20'],
            'quantity' => ['required', 'integer', 'min:1', 'max:10'],
            'type' => ['required', 'string', Rule::in(['Normal','Hybrid','Rounded'])],
            'client_id' => ['required', 'integer', 'min:1'],
        ]);
    }

    protected function create(array $data)
    {
        return Order::create([
            'brand' => $data['brand'],
            'model' => $data['model'],
            'quantity' => $data['quantity'],
            'type' => $data['type'],
            'client_id' => $data['client_id'],
        ]);
    }
}
