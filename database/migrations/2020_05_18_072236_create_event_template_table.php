<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateEventTemplateTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('email_template_event', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->bigInteger('event_id')->unsigned();
            $table->bigInteger('email_template_id')->unsigned();
            
            $table->string('name')->nullable();
          
            $table->string('subject');
            
            $table->text('content');

            $table->integer('activity_id');
            $table->integer('activity_type_id');
            
            $table->integer('invitation_type_id');
            $table->integer('language_id');
  
            $table->foreign('event_id')->references('id')->on('events')->onDelete('cascade');
            $table->foreign('email_template_id')->references('id')->on('email_templates')->onDelete('cascade');
             
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
        Schema::dropIfExists('email_template_event');
    }
}
