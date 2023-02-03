<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateAwardSettingsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('award_settings', function (Blueprint $table) {
            $table->increments('id');

            $table->string('current_year')->nullable()->default('0000');
            $table->string('submission_deadline')->nullable();
            $table->mediumText('delay_submission_message')->nullable();

            $table->string('first_email')->nullable()->default('first@email.com');
            $table->string('first_email_holder_name')->nullable()->default('first');
            $table->string('second_email')->nullable()->default('second@email.com');
            $table->string('second_email_holder_name')->nullable()->default('second');

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
        Schema::dropIfExists('award_settings');
    }
}
