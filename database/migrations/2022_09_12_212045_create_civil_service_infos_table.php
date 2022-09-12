<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('civil_service_infos', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id')->nullable()->comment('FK = user id');

            $table->string('cse_type')->nullable();
            $table->string('cse_rating')->nullable();
            $table->string('cse_date')->nullable()->comment('Date of Examination');
            $table->string('cse_place')->nullable()->comment('Place of Examination');
            $table->string('cse_license_number')->nullable();
            $table->string('cse_license_date')->nullable();

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
        Schema::dropIfExists('civil_service_infos');
    }
};
