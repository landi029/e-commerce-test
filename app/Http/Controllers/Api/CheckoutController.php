<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\ProductVarian;
use App\Models\Address;
use App\Models\OrderStatus;

class CheckoutController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function checkout(Request $request)
    {
        $data = $request->all();
        /* TO DO
            add validation to check data on request
        */

        $variant = ProductVariant::find($data['variant_id']);
        $user  = \Auth::user();
        $address = Address::query()
                        ->where('user_id', $user->id)
                        ->where('current', 1)
                        ->first();

        $order = DB::transaction(function () use ($data, $variant, $address, $user) {
            /* decrement stock $this->stockService->decrementStock($variant->id); */ 
            /* 
                create order, 
                TODO create OrderServiceClass and move this part of code there
            */
            $order = Order::create([
                'user_id' => $user->id,
                'payment_method_id' => $data['payment_method_id'],
                'status_id' => OrderStatus::CART,
                'address_id' => $address->id,
            ]);

            /* 
                create order item, 
                TODO create OrderItemServiceClass and move this part of code there
            */
            $orderItem = OrderItem::create([
                'order_id' => $order->id,
                'variant_id' => $variant->id,
                'quantity' => $data['qty'],
                'total' => $data['qty'] * $variant->price,
            ]);

            /*
                define payment change from $this->stripeService->createCharge($order, $orderItem->total);
                update order total,
                if response is successfully
                update payment_reference
                update order status, add cart status to order history
                if response not successfully Increment Stock
                $this->stockService->incrementStock($variant->id);
            */

            return $order;
        });

        return response()->json([ 'data' => $order ]);
    }
}
