<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('system_settings', function (Blueprint $table) {
            $table->id();
            $table->timestamps();
            $table->string('system_name');
            $table->string('system_slogan1');
            $table->string('system_slogan2');
            $table->string('facebook_link');
            $table->string('email_link');
            $table->string('number');
            $table->string('system_logo');
            $table->string('background_img');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('system_settings');
    }
};
