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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->float('total',2);
            $table->unsignedBigInteger('status_id');
            $table->foreign('status_id')->references('id')->on('order_statuses')->onDelete('cascade');
            $table->string('name');
            $table->string('surname');
            $table->string('state');
            $table->string('address');
            $table->string('city');
            $table->string('zip');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('orders', function(Blueprint $table){
            $table->dropForeign(['status_id']);
        });
        Schema::dropIfExists('orders');
    }
};
