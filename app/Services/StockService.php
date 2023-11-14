<?php

namespace App\Checkout\Services;

use Aflete\Models\Entities\ProductVariant;


class StockService
{
    public function decrementStock($variantId)
    {
        \DB::table('product_variants')
            ->where('id', $variant->id)
            ->decrement('stock', $orderItem->qty);
    }

    public function incrementStock($order)
    {
        \DB::table('product_variants')
            ->where('id', $variant->id)
            ->increment('stock', $orderItem->qty);
    }}
