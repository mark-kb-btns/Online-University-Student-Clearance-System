<?php 
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateSystemUsersTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('system_users', function (Blueprint $table) {
            $table->integer('id')->primary(); // 7-digit ID, non-auto-increment
            $table->string('user_name', 255);
            $table->string('email', 255)->unique();
            $table->string('user_password', 255);
            
            $table->unsignedBigInteger('program_id')->nullable();
            $table->foreign('program_id')->references('program_id')->on('program')->onDelete('set null')->onUpdate('cascade');

            $table->unsignedBigInteger('department_id')->nullable();
            $table->foreign('department_id')->references('department_id')->on('departments')->onDelete('set null')->onUpdate('cascade');

            $table->enum('student_status', ['Active', 'Dropped', 'Graduated'])->nullable();
            $table->enum('year_level', ['1st Year', '2nd Year', '3rd Year', '4th Year'])->nullable();
            $table->enum('user_role', ['student', 'admin', 'registrar', 'department']);
            
            $table->timestamps(); // Adds created_at and updated_at
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('system_users');
    }
}
