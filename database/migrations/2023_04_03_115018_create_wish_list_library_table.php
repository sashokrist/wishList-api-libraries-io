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
        Schema::create('library_wish_list', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('wish_list_id');
            $table->unsignedBigInteger('library_id');
            $table->timestamps();

            $table->foreign('wish_list_id')->references('id')->on('wish_lists')->onDelete('cascade');
            $table->foreign('library_id')->references('id')->on('libraries')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('wish_list_library');
    }
};
