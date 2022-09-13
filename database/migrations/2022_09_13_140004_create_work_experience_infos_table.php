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
        Schema::create('work_experience_infos', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id')->nullable()->comment('FK = user id');

            $table->string('work_date_from')->nullable();
            $table->string('work_date_to')->nullable();
            $table->string('job_title')->nullable();
            $table->string('job_type')->nullable();
            $table->double('monthly_salary')->nullable();
            $table->string('salary_grade')->nullable();
            $table->string('status_of_appointment')->nullable();
            $table->string('gov_service')->nullable();

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
        Schema::dropIfExists('work_experience_infos');
    }
};
