<?php

namespace App\Http\Controllers;

use App\Http\Requests\ChangeOrderStatusRequest;
use Illuminate\Http\Request;
use App\Models\Status;
use App\Models\Order;



class StatusOrderController extends Controller
{
    public function store(Status $status, ChangeOrderStatusRequest $request){
        $order=Order::findOrFail($request['order_id']);

        $order->update(['status_id'=>$status->id]);
        return response(['success'=>true, 'message'=>'status changed']);
    }
}
