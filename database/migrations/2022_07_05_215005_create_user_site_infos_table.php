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
        Schema::create('user_site_infos', function (Blueprint $table) {
            $table->id();
            $table->string('email')->nullable();
            $table->string('mobile')->nullable();
            $table->string('facebook_link')->nullable();
            $table->string('website_link')->nullable();
            $table->text('address')->nullable();
            $table->text('footer')->nullable();
            $table->string('user_brand')->nullable();
            $table->string('auth_brand')->nullable();
            $table->text('terms')->nullable();
            $table->text('privacy')->nullable();
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
        Schema::dropIfExists('user_site_infos');
    }
};
