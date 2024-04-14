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
        Schema::create('contactes', function (Blueprint $table) {
            $table->unsignedBigInteger('contact_id')->primary()->autoIncrement();
            $table->unsignedBigInteger('client_id');
            $table->string('nom');
            $table->string('prenom');
            $table->integer('tel');
            $table->string('adress');
            $table->string('email');
            $table->foreign('client_id')->references('client_id')->on('clients');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('contactes');
    }
};
