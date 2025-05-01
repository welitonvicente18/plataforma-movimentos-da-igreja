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
        Schema::create('events', function (Blueprint $table) {
            $table->id();
            $table->string('name', length: 200);
            $table->date('date_event');
            $table->foreignId('entidade_id')->constrained('entidades');
            $table->foreignId('user_id')->constrained('users');
            $table->string('uf', length: 2);
            $table->string('city', length: 100)->nullable();
            $table->string('address', length: 300)->nullable();
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('events');
    }
};
