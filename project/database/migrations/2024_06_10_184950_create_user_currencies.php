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

        Schema::create('user_currencies', function (Blueprint $table) {

            $table->id();
            $table->timestamps();
            $table->longText('currency')->nullable();
            $table->string('email')->unique();



        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_currencies');
    }
};
