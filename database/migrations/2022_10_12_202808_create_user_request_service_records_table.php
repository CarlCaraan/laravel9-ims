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
        Schema::create('user_request_service_records', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id')->nullable()->comment('FK = user id');

            $table->string('service_record_status')->nullable();
            $table->string('sr_middle_name')->nullable();
            $table->string('sr_dob')->nullable();
            $table->string('sr_pob')->nullable();
            $table->string('archived')->nullable()->comment('Yes / No');
            $table->string('user_archived')->nullable()->comment('Yes / No');
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
        Schema::dropIfExists('user_request_service_records');
    }
};
