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
        Schema::create('visittes', function (Blueprint $table) {
            $table->unsignedBigInteger('visite_id')->primary()->autoIncrement();
            $table->unsignedBigInteger('commercial_id');
            $table->unsignedBigInteger('client_id');
            $table->unsignedBigInteger('contact_id');
            $table->dateTime('date_start');
            $table->string('type_visite');
            $table->string('objectif');
            $table->foreign('commercial_id')->references('commercial_id')->on('commercials');
            $table->foreign('client_id')->references('client_id')->on('clients');
            $table->foreign('contact_id')->references('contact_id')->on('contactes');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('visittes');
    }
};
