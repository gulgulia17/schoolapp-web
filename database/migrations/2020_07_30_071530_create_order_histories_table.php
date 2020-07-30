<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateOrderHistoriesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('order_histories', function (Blueprint $table) {
            $table->id();
            $table->string('ORDERID');
            $table->string('name');
            $table->string('email');
            $table->string('phone');
            $table->string('subscription');
            $table->string('TXNID')->nullable();
            $table->string('TXNAMOUNT')->nullable();
            $table->string('PAYMENTMODE')->nullable();
            $table->string('TXNDATE')->nullable();
            $table->string('STATUS')->nullable();
            $table->string('RESPCODE')->nullable();
            $table->string('BANKNAME')->nullable();
            $table->string('statuss')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('order_histories');
    }
}
