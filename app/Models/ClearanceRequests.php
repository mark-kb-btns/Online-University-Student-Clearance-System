<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class ClearanceRequests extends Model
{
    use HasFactory;

    protected $table = 'clearance_requests'; // Ensure the table name matches
    protected $fillable = [
        'clearance_id',
        'student_id',
        'request_date',
        'completion_date',
        'status',
        'purpose',
    ];
}
