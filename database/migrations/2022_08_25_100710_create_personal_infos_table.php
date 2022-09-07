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
        Schema::create('personal_infos', function (Blueprint $table) {
            $table->id();
            $table->integer('user_id')->nullable()->comment('FK = user id');
            $table->string('cs_id_no')->nullable();
            $table->string('middle_name')->nullable();
            $table->string('extension_name')->nullable();
            $table->string('dob')->nullable()->comment('Date of Birth');
            $table->string('pob')->nullable()->comment('Place of Birth');
            $table->string('civil_status')->nullable();
            $table->string('height')->nullable();
            $table->string('weight')->nullable();
            $table->string('blood_type')->nullable();
            $table->string('gsis_id_no')->nullable();
            $table->string('pagibig_id_no')->nullable();
            $table->string('philhealth_no')->nullable();
            $table->string('sss_no')->nullable();
            $table->string('tin_no')->nullable();
            $table->string('agency_employee_no')->nullable();
            $table->string('citizenship')->nullable();
            $table->string('citizenship_country')->nullable();

            // Residential Address
            $table->string('r_house_no')->nullable();
            $table->string('r_subdivision')->nullable();
            $table->string('r_city')->nullable();
            $table->string('r_street')->nullable();
            $table->string('r_barangay')->nullable();
            $table->string('r_province')->nullable();
            $table->string('r_zip_code')->nullable();

            // Permanent Address
            $table->string('p_house_no')->nullable();
            $table->string('p_subdivision')->nullable();
            $table->string('p_city')->nullable();
            $table->string('p_street')->nullable();
            $table->string('p_barangay')->nullable();
            $table->string('p_province')->nullable();
            $table->string('p_zip_code')->nullable();

            $table->string('telephone')->nullable();
            $table->string('mobile')->nullable();
            $table->string('contact_email')->nullable();

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
        Schema::dropIfExists('personal_infos');
    }
};
