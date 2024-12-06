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
    Schema::create('clearance_requests', function (Blueprint $table) {
        $table->id('clearance_id'); // Auto-increment primary key
        $table->unsignedBigInteger('student_id'); // Foreign key for system_users (students)
        $table->date('request_date'); // Date when the request was made
        $table->date('completion_date')->nullable(); // Date when the clearance was completed
        $table->enum('status', ['No Action', 'Pending', 'On-Hold', 'Completed'])->default('No Action'); // Status of the request
        $table->string('purpose'); // Purpose of the clearance request
        $table->timestamps(); // Created at and updated at timestamps

        // Define foreign key relationship with system_users table
        $table->foreign('student_id')->references('id')->on('system_users')->onDelete('cascade');
    });
}

public function down()
{
    Schema::dropIfExists('clearance_requests');
}

};
