<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ClearanceRequestStats extends Model
{
    use HasFactory;

    protected $table = 'clearance_requests'; // Ensure the table name matches
    protected $fillable = [
        'clearance_id',
        'student_id',
        'request_date',
        'completion_date',
        'status',
        'purpose'
    ];

    // Define relationship if needed
    public function student()
    {
        return $this->belongsTo(User::class, 'student_id');
    }
}
