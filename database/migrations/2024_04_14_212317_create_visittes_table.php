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
            $table->unsignedBigInteger('id')->primary()->autoIncrement();
            $table->unsignedBigInteger('commercial_id');
            $table->unsignedBigInteger('client_id');
            $table->unsignedBigInteger('contact_id');
            $table->date('date_start');
            $table->time('date_h');
            $table->string('type_visite');
            $table->string('objectif');
            $table->foreign('commercial_id')->references('commercial_id')->on('commercials');
            $table->foreign('client_id')->references('id')->on('clients');
            $table->foreign('contact_id')->references('contact_id')->on('contacttes');
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
