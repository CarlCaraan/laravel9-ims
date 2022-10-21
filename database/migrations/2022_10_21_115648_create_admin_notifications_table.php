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
        Schema::create('admin_notifications', function (Blueprint $table) {
            $table->id();

            $table->integer('user_id')->nullable()->comment('FK = User Table');
            $table->integer('pds_id')->nullable()->comment('FK = pds_form_lists ID table');
            $table->integer('sr_id')->nullable()->comment('FK = user_request_service_records ID table');
            $table->string('description')->nullable();

            $table->string('seen_status')->nullable()->comment('seen / unseen');
            $table->string('status')->nullable()->comment('Task / Resolved');

            $table->datetime('timestamp')->nullable();
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
        Schema::dropIfExists('admin_notifications');
    }
};
