<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Product;
use App\Models\Status;

class ProductVariantsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function getCart($cart)
    {
        /* 
            this function support only one product, for more product needs to be modify
            example varian_id = 1 and quantity = 1, $cart will be '1:1'
        */
        $cartData = explode(':',base64_decode($cart));
        if (!is_array($cartData) && count($cartData) != 2) {
            /* TO DO
                create an Exception class ProductNotFound
            */
            throw new Error('Product Not Found');
        }
        $data = Product::query()
                ->with(['variants' => function($query) use ($cartData) {
                    $query->where('id', $cartData[0])
                          ->where('stock', '>=', $cartData[1]);
                }])
                ->where('status_id', Status::LIVE)
                ->get();

        return response()->json([ 'data' => $data ]);
    }
}
