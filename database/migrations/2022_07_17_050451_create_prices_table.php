<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreatePricesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('prices', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id')->index();
            $table->float('origin_price', 4, 3);
            $table->float('actual_price_compra', 6, 3);
            $table->float('actual_price_venta', 6, 3);
            $table->float('modificador_compra', 6, 3);
            $table->float('modificador_venta', 6, 3);
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
        Schema::dropIfExists('prices');
    }
}
