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
        Schema::create('educational_infos', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id')->nullable()->comment('FK = user id');

            // Elementary
            $table->string('elementary_school')->nullable();
            $table->string('elementary_course')->nullable();
            $table->string('elementary_from')->nullable();
            $table->string('elementary_to')->nullable();
            $table->string('elementary_units')->nullable();
            $table->string('elementary_graduated')->nullable()->comment('Year Graduated');
            $table->string('elementary_honors')->nullable();

            // Secondary
            $table->string('secondary_school')->nullable();
            $table->string('secondary_course')->nullable();
            $table->string('secondary_from')->nullable();
            $table->string('secondary_to')->nullable();
            $table->string('secondary_units')->nullable();
            $table->string('secondary_graduated')->nullable()->comment('Year Graduated');
            $table->string('secondary_honors')->nullable();

            // Vocational
            $table->string('vocational_school')->nullable();
            $table->string('vocational_course')->nullable();
            $table->string('vocational_from')->nullable();
            $table->string('vocational_to')->nullable();
            $table->string('vocational_units')->nullable();
            $table->string('vocational_graduated')->nullable()->comment('Year Graduated');
            $table->string('vocational_honors')->nullable();

            // College
            $table->string('college_school')->nullable();
            $table->string('college_course')->nullable();
            $table->string('college_from')->nullable();
            $table->string('college_to')->nullable();
            $table->string('college_units')->nullable();
            $table->string('college_graduated')->nullable()->comment('Year Graduated');
            $table->string('college_honors')->nullable();

            // Graduate Studies
            $table->string('studies_school')->nullable();
            $table->string('studies_course')->nullable();
            $table->string('studies_from')->nullable();
            $table->string('studies_to')->nullable();
            $table->string('studies_units')->nullable();
            $table->string('studies_graduated')->nullable()->comment('Year Graduated');
            $table->string('studies_honors')->nullable();
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
        Schema::dropIfExists('educational_infos');
    }
};
