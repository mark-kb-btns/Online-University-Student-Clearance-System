<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class departments extends Model
{
    use HasFactory;

    protected $table = 'departments'; // Ensure the table name matches
    protected $fillable = [
        'department_id',
        'department_name',
    ];
}