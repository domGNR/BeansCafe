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
        Schema::create('addresses', function (Blueprint $table) {
            $table->id();
            $table->string('type');
            $table->string('street');
            $table->string('number');
            $table->string('zip');
            $table->string('city');
            $table->string('country');
            $table->unsignedBigInteger('user_id');
            $table->foreign('user_id')->references('id')->on('roles')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('addresses', function(Blueprint $table){
            $table->dropForeign(['user_id']);
        });
        Schema::dropIfExists('addresses');
    }
};
