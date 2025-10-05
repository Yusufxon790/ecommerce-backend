<?php

namespace App\Repositories;

use Illuminate\Http\Request;
use App\Models\Order;
use Carbon\Carbon;


class OrderRepository extends Repository
{

    public function getAll(Request $request){
        $orders=Order::query();
       
        if ($request->has('user_id')) {
         $orders->where('user_id',$request->user_id);
        }
        if ($request->has('delivery_method_id')) {
         $orders->where('delivery_method_id',$request->delivery_method_id);
        }
        if ($request->has('payment_type_id')) {
         $orders->where('payment_type_id',$request->payment_type_id);
        }
        if ($request->has(['sum_from','sum_to'])) {
            $orders->whereBetween('sum',[$request->sum_from,$request->sum_to]);
         }
         if ($request->has('created_at')) {
          $orders->whereBetween('created_at',[Carbon::parse($request->created_at)->startOfDay(),Carbon::parse($request->created_at)->endOfDay()]);
         }
        if ($request->has(['from','to'])) {
         $orders->whereBetween('created_at',[$request->from,Carbon::parse($request->to)->endOfDay()]);
        }
 
     return $orders->paginate($request->paginate ?? 20);
     
    }

}