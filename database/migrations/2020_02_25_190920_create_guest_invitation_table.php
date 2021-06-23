<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateGuestInvitationTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('guest_invitation', function (Blueprint $table) {
            
            $table->bigIncrements('id');

            $table->bigInteger('guest_id')->unsigned();
            $table->bigInteger('invitation_id')->unsigned();
            
            $table->string('email')->nullable();
            $table->boolean('send_email')->nullable();
            $table->boolean('es_principal')->nullable();

            $table->integer('invitation_type')->nullable();
            $table->integer('guest_category_id')->nullable();            

            $table->bigInteger('app_ticket_id')->nullable();
            $table->string('ticket_qrcode')->nullable();

            $table->foreign('guest_id')->references('id')->on('guests')->onDelete('cascade');
            $table->foreign('invitation_id')->references('id')->on('invitations')->onDelete('cascade');
   
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
        Schema::dropIfExists('guest_invitation');
    }
}
