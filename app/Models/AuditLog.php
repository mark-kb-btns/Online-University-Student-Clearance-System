<?php namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class AuditLog extends Model
{
    protected $fillable = ['action', 'performed_by', 'ip_address', 'details'];

    // Cast the 'details' column to an array
    protected $casts = [
        'details' => 'array',
    ];
}
