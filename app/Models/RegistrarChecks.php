<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RegistrarChecks extends Model
{
    use HasFactory;

    protected $primaryKey = 'check_id';

    public function clearanceRequest()
    {
        return $this->belongsTo(ClearanceRequest::class, 'clearance_id');
    }
}
