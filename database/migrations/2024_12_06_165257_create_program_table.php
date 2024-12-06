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
    Schema::create('program', function (Blueprint $table) {
        $table->id('program_id'); // Auto-increment primary key
        $table->string('program_name', 100); // Name of the course
        $table->unsignedBigInteger('department_id'); // Foreign key for department
        $table->foreign('department_id')->references('department_id')->on('departments')->onDelete('cascade'); // Foreign key relationship with departments table
        $table->timestamps(); // Created at and updated at timestamps
    });
}

public function down()
{
    Schema::dropIfExists('program');
}

};
