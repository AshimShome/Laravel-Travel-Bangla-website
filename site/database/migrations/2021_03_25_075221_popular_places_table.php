<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class PopularPlacesTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('popularPlaces',function(Blueprint $table){
            $table->bigIncrements('id');
            $table->string('image_link');
            $table->string('place_name');
            $table->string('place_desc');
            $table->string('review');
            $table->string('Days');
            $table->string('offer_price');
        });

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //
    }
}
