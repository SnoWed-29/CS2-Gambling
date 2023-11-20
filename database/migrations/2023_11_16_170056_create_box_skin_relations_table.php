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
        Schema::create('box_skin_relations', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('box_id');
            $table->unsignedBigInteger('skin_id');
 
            $table->foreign('box_id')->references('id')->on('boxes');
            $table->foreign('skin_id')->references('id')->on('skins');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('box_skin_relations');
    }
};
