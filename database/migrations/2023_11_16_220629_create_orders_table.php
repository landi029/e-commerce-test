<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->references('id')->on('users')->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('payment_method_id')->references('id')->on('payment_methods')->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('address_id')->references('id')->on('addresses')->onUpdate('cascade')->onDelete('cascade');
            $table->foreignId('status_id')->references('id')->on('order_status')->onUpdate('cascade')->onDelete('cascade');
            $table->string('payment_reference')->nullable();
            $table->integer('total');
            /* TO DO */
            /* add indexes */
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orders');
    }
};
