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
        Schema::create('service_records', function (Blueprint $table) {
            $table->id();
            $table->integer('service_request_record_id')->nullable()->comment('FK = user_request_service_records id');

            $table->string('sr_from')->nullable();
            $table->string('sr_to')->nullable();
            $table->string('sr_designation')->nullable();
            $table->string('sr_status')->nullable();
            $table->string('sr_salary')->nullable();
            $table->string('sr_place_of_assignment')->nullable();
            $table->string('sr_branch')->nullable();
            $table->string('sr_leave_of_absence')->nullable();
            $table->string('sr_separation_date_caused')->nullable();
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
        Schema::dropIfExists('service_records');
    }
};
