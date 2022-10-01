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
        Schema::create('pds_form_lists', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id')->nullable()->comment('FK = user id');

            $table->string('pds_tracking_no')->nullable();
            $table->string('pds_title')->nullable();
            $table->string('pds_status')->nullable();
            $table->string('pds_date_uploaded')->nullable();
            $table->string('pds_filename')->nullable();
            $table->string('pds_archived')->nullable()->comment('Yes / No');
            $table->string('pds_message')->nullable();

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
        Schema::dropIfExists('pds_form_lists');
    }
};
