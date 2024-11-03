<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    // Define the correct table
    protected $table = 'system_users';

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'id',        // Include 'id' since the user will input it
        'user_name', // Ensure this matches the table column
        'email',
        'user_password', // Match column names in database
        'program_id',
        'department_id',
        'student_status',
        'user_role',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'user_password', // Make sure to hide the correct column name
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
        'user_password' => 'hashed', // This should reflect 'user_password' (not just 'password')
    ];

    public function department()
{
    return $this->belongsTo(Departments::class, 'department_id', 'department_id'); // Assuming 'department_id' is the primary key in 'departments'
}


    // Define relationship with Program
    public function program()
    {
        return $this->belongsTo(Programs::class, 'program_id', 'program_id');
    }
}
