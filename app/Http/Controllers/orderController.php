<?php

namespace App\Http\Controllers;

use App\Models\Order;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use phpDocumentor\Reflection\Types\Void_;
use Ramsey\Collection\Collection;

class orderController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|\Illuminate\Http\Response
     */
    public function index()
    {
        return view('orders.registerOrder');
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {

    }
    /**
     * Return collection where the user can lead his orders.
     *
     * @return Order[]|\Illuminate\Database\Eloquent\Collection|Collection
     */
    public function getUserOrders()
    {
        $userID = Auth::id();
        return Order::all()->where('client_id', $userID);
    }
    public function getOrdersToAccept()
    {
        return Order::all()->whereNotNull(['price', 'total']);
    }
    public function getAllOrders()
    {
        return Order::paginate(15);
    }

    public function myOrders()
    {
        return view('orders.myOrder',['orders' => $this->getUserOrders()]);
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param Request $request
     * @return \Illuminate\Contracts\Foundation\Application|\Illuminate\Contracts\View\Factory|\Illuminate\Contracts\View\View|void
     */
    public function destroy(Request $request)
    {
        Order::destroy($request->id);
        return view('orders.informationOrder',['operation' => 'order delete' ,
            'message' => 'Your order has been successfully deleted'
        ]);
    }
}
