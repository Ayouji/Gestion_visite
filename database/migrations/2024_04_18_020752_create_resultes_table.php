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
        Schema::create('resultes', function (Blueprint $table) {
            $table->unsignedBigInteger('result_id')->primary()->autoIncrement();
            $table->string('etat');
            $table->string('type_result');
            $table->string('comment');
            $table->unsignedBigInteger('visite_id');
            $table->unsignedBigInteger('admin_id');
            $table->foreign('visite_id')->references('id')->on('visittes');
            $table->foreign('admin_id')->references('id')->on('admins');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('resultes');
    }
};
