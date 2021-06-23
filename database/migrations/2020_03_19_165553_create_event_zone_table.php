<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEventZoneTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('event_zone', function (Blueprint $table) {

            $table->bigIncrements('id');

            $table->bigInteger('event_id')->unsigned();
            $table->bigInteger('zone_id')->unsigned();
            $table->bigInteger('cupo')->unsigned()->default(0);
            $table->decimal('price', 8, 2)->default(0);            
            
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
        Schema::dropIfExists('event_zone');
    }
}
