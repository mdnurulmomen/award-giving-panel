<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreatePublishersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('publishers', function (Blueprint $table) {
            $table->bigIncrements('id');

            $table->string('publisher_name')->nullable();
            $table->string('representative_name')->nullable();
            $table->string('representative_designation')->nullable();
            $table->string('representative_organization')->nullable();
            $table->string('representative_phone')->nullable();
            $table->string('representative_email')->nullable();
            
            $table->bigInteger('application_related_media_id')->nullable();
            
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
        Schema::dropIfExists('publishers');
    }
}
