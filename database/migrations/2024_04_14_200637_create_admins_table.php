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
        Schema::create('admins', function (Blueprint $table) {
            $table->unsignedBigInteger('id')->primary()->autoIncrement();
            $table->string('nom');
            $table->string('prenom');
            $table->string('tel',10);
            $table->string('adress');
            $table->string('email');
            $table->string('password');
            $table->string('image');
            $table->boolean('admin')->default(0);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('admins');
    }
};
