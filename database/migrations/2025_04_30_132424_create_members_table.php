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
        Schema::create('members', function (Blueprint $table) {
            $table->id();
            $table->string('name', length: 300);
            $table->string('surname', length: 100)->nullable();
            $table->string('spouse', length: 100)->nullable();
            $table->integer('status');
            $table->string('event', length: 200)->nullable();
            $table->string('circle', length: 50)->nullable();
            $table->foreignId('entidade_id')->constrained('entidades');
            $table->string('sex', length: 1)->nullable();
            $table->integer('type');
            $table->string('telephone', 11)->nullable();
            $table->date('birth_date')->nullable();
            $table->string('batizado', 1)->nullable();
            $table->string('crismado', 1)->nullable();
            $table->string('uf', length: 2)->nullable();
            $table->string('city', length: 100)->nullable();
            $table->string('address', length: 300)->nullable();
            $table->string('photo', length: 300)->nullable();
            $table->json('team')->nullable();
            $table->string('observation', 500)->nullable();
            $table->foreignId('user_id')->constrained('users');
            $table->softDeletes();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('members');
    }
};
