<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInvitationsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('invitations', function (Blueprint $table) {

            $table->bigIncrements('id');

            $table->bigInteger('user_id');     
            $table->bigInteger('event_id');                  
            $table->integer('zona_id')->nullable();   

            $table->bigInteger('estado')->nullable();
            $table->bigInteger('codigo')->nullable();
            
            $table->date('fecha_peticion'); 
            $table->bigInteger('cantidad')->nullable();  
                       
            $table->decimal('price', 8, 2)->default(0);
            $table->string('en_nombre_de')->nullable();      

            $table->integer('finalidad_id')->nullable();        
            $table->integer('tipo_invitacion_id')->nullable();      

            $table->integer('motivo_edicion_id')->nullable();      
            $table->string('motivo_edicion_descripcion')->nullable();     
            
            $table->boolean('cancelada')->nullable()->default(false);      
            $table->integer('tipo_edicion')->nullable()->default(0);      
            $table->integer('editada')->nullable()->default(0);      

            $table->bigInteger('user_edicion_id')->nullable()->default(0);
            $table->bigInteger('user_edicion_rol')->nullable()->default(0);
            
            $table->string('email_secundario_peticion')->nullable();      
            $table->integer('tipo_cupo')->nullable();      
            $table->integer('language_id')->nullable();      

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
        Schema::dropIfExists('invitations');
    }
}
