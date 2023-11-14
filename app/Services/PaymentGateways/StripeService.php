<?php

namespace App\Checkout\Services;

use App\Models\Order;

/**
 * Class StripeService
 * @package Aflete\Models\Services
 */
class StripeService extends AbstractPaymentService
{
    /*
        TO DO
     */
    public function setUp( Order $order, array $payment )
    {

    }

    /*
        TO DO
     */
    public function createCharge( Order $order, $total )
    {
    }

}
