<?php

namespace App\Services;

use App\Models\Order;

abstract class AbstractPaymentService implements PaymentService
{
    protected $data;

    public function __construct()
    {
        
    }

    public function setUp( Order $order, array $data )
    {
    }

    public function createCharge( Order $order, $total)
    {
    }
        
}
