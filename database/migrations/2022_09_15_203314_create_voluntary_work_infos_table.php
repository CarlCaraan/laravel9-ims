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
        Schema::create('voluntary_work_infos', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id')->nullable()->comment('FK = user id');

            $table->text('organization_name_address')->nullable();
            $table->string('voluntary_date_from')->nullable();
            $table->string('voluntary_date_to')->nullable();
            $table->string('number_of_hours')->nullable();
            $table->string('voluntary_jobtitle')->nullable();

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
        Schema::dropIfExists('voluntary_work_infos');
    }
};
