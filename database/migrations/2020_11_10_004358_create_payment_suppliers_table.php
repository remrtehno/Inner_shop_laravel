<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePaymentSuppliersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('payment_suppliers', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->integer('shop_id');
            $table->text('dollar_rate');
            $table->text('usd');
            $table->text('cash');
            $table->text('terminal');
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
        Schema::dropIfExists('payment_suppliers');
    }
}
