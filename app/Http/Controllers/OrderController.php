<?php

namespace App\Http\Controllers;

use App\Http\Resources\OrderResource;
use App\Http\Resources\ProductResource;
use App\Models\Order;
use App\Http\Requests\StoreOrderRequest;
use App\Http\Requests\UpdateOrderRequest;
use App\Models\DeliveryMethod;
use App\Models\UserAddress;
use App\Models\Product;
use App\Models\Stock;


class OrderController extends Controller
{

    public function __construct(){
        $this->middleware('auth:sanctum');
        $this->authorizeResource(Order::class,'order');
    }
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        if(request()->has('status_id')){
            return $this->response(OrderResource::collection(auth()->user()->orders()->where('status_id',request('status_id'))->paginate(10)));
        }
        return $this->response(OrderResource::collection(auth()->user()->orders()->paginate(10)));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \App\Http\Requests\StoreOrderRequest  $request
     * @return \Illuminate\Http\Response
     */
    public function store(StoreOrderRequest $request)
    {
        $sum = 0;
        $products = [];
        $notFoundProducts = [];
        $address = UserAddress::find($request->address);
        $deliveryMethod=DeliveryMethod::findOrFail($request->delivery_method_id);
    
        foreach ($request['products'] as $requestProduct) {
            $product = Product::with('stocks')->find($requestProduct['product_id']);
    
            if (!$product) {
                $requestProduct['we_have'] = 0;
                $notFoundProducts[] = $requestProduct;
                continue;
            }
            
            $stock = $product->stocks()->find($requestProduct['stock_id']);
    
            if ($stock && $stock->quantity >= $requestProduct['quantity']) {
                $productWithStock = $product->withStock($requestProduct['stock_id']);
                $productResource = (new ProductResource($productWithStock))->resolve();
                
                $sum += ($productResource['discounted_price'] ?? $productResource['price']) * $requestProduct['quantity'];
                
                $sum+=$productWithStock->stocks[0]->added_price;
                $productResource['order_quantity'] = $requestProduct['quantity'];
                $products[] = $productResource;
            } else {
                $requestProduct['we_have'] = $stock ? $stock->quantity : 0;
                $notFoundProducts[] = $requestProduct;
            }
        }
    
        if ($notFoundProducts == [] && $products != [] && $sum != 0) {

            $sum+=$deliveryMethod->sum;

            $order = auth()->user()->orders()->create([
                'comment' => $request->comment,
                'delivery_method_id' => $request->delivery_method_id,
                'payment_type_id' => $request->payment_type_id,
                'sum' => $sum,
                'status_id' => in_array($request['payment_type_id'], [1, 2]) ? 1 : 6,
                'address' => $address,
                'products' => $products,
            ]);
    
            if ($order) {
                foreach ($products as $product) {
                    if (isset($product['inventory'][0]['id'], $product['order_quantity'])) {
                        $stock = Stock::find($product['inventory'][0]['id']);
                        if ($stock) {
                            $stock->quantity -= $product['order_quantity'];
                            $stock->save();
                        }
                    }
                }
            }
    
            return $this->success('order created',$order);
        } else {
            return $this->error(
                'some products not found or does not have in inventory!',
                ['not_found_products' => $notFoundProducts]
            );
        }
    }
    

    /**
     * Display the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function show(Order $order)
    {
        return $this->response(new OrderResource($order));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function edit(Order $order)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \App\Http\Requests\UpdateOrderRequest  $request
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function update(UpdateOrderRequest $request, Order $order)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Models\Order  $order
     * @return \Illuminate\Http\Response
     */
    public function destroy(Order $order)
    {
        $order->delete();
        return 1;
    }
}
