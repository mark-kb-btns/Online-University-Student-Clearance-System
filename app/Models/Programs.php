<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Programs extends Model
{
    use HasFactory;

    protected $table = 'program'; // Ensure the table name matches
    protected $fillable = [
        'program_id',
        'program_name',
    ];
}
