<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInvitationDetailsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('invitation_details', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->unsignedBigInteger('invitation_id');

            $table->unsignedBigInteger('zona_id');

            $table->integer('boca_id')->nullable()->default(0);
            $table->integer('fila_id')->nullable()->default(0);
            $table->integer('asiento_id')->nullable()->default(0);

            $table->string('boca')->nullable()->default('');
            $table->string('fila')->nullable()->default('');
            $table->string('asiento')->nullable()->default('');

            $table->string('descripcion')->nullable()->default('');

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
        Schema::dropIfExists('invitation_details');
    }
}
