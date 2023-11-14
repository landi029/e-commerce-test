<?php

namespace App\Contracts\Payment;

use App\Models\Order;

interface PaymentService
{
    /**
     * PaymentService constructor.
     */
    public function __construct();

    /**
     * @param Order $order
     * @param array $data
     * @return mixed Generic method for operations. It's always called before createCharge
     *
     * Generic method for operations. It's always called before createCharge
     */
    public function setUp( Order $order, array $data );

    /**
     * @param Order $order
     * @param $total
     * @param $data
     * @return string
     *
     * Method for do the charge operation
     */
    public function createCharge( Order $order, $total );
}