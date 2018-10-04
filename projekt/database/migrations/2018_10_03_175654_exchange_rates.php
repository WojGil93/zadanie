<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class ExchangeRates extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::defaultStringLength(191);
        Schema::create('exchange_Rates', function (Blueprint $table) {
            $table->increments('id');
            $table->string('currency')->collate('utf8_bin');
            $table->string('code')->collate('utf8_bin');
            $table->float('mid', 10, 5);
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
       Schema::dropIfExists('exchange_Rates');
    }
}
