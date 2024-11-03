<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up()
{
    Schema::create('system_users', function (Blueprint $table) {
        $table->id();
        $table->string('user_name');
        $table->string('email')->unique();
        $table->string('user_password');
        $table->string('program')->nullable();
        $table->enum('year_of_study', ['freshman', 'sophomore', 'junior', 'senior'])->nullable();
        $table->enum('user_role', ['student', 'admin', 'registrar', 'department']);
        $table->timestamps();
    });
}



    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('system_users');
    }
};
