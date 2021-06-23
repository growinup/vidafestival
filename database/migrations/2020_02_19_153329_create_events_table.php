<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEventsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('events', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('codigo')->nullable();

            $table->bigInteger('app_event_id')->nullable();
            $table->bigInteger('app_schedule_id')->nullable();
            
            $table->bigInteger('id_partido')->nullable();
            $table->bigInteger('id_aforo')->nullable();

            $table->string('nombre')->nullable();
            $table->bigInteger('jornada')->nullable();
            $table->bigInteger('id_competicion')->nullable();
            
            $table->boolean('not_confirmed_date')->default(0);
            $table->date('fecha')->nullable();
            $table->time('hora')->nullable();

            $table->boolean('activo')->default(0);
            
            $table->boolean('emitiendo')->default(0);
            $table->boolean('excluido')->default(0);
            
            $table->bigInteger('ubicacion_id')->nullable();
            $table->integer('activity_id')->default(0);
            $table->integer('type_id')->default(0);
            $table->integer('tipo_cupo')->default(1);
            
            $table->integer('level')->default(1);
            

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
        Schema::dropIfExists('events');
    }
}
