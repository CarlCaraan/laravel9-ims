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
        Schema::create('family_children_lists', function (Blueprint $table) {
            $table->id();
            $table->integer('family_id')->nullable()->comment('FK = family id');
            $table->string('children_name')->nullable();
            $table->string('children_dob')->nullable();
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
        Schema::dropIfExists('family_children_lists');
    }
};
