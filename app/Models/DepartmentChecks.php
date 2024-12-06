<?php
namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class DepartmentChecks extends Model
{
    use HasFactory;

    protected $primaryKey = 'check_id';

    public function clearanceRequest()
    {
        return $this->belongsTo(ClearanceRequest::class, 'clearance_id');
    }

    public function department()
    {
        return $this->belongsTo(Department::class, 'department_id');
    }
}
