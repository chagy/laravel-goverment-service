<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Department extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'parent_id',
        'depa_num',
        'depa_name',
        'depa_desc'
    ];

    public function departmentMain()
    {
        return $this->belongsTo(Department::class,'parent_id');
    }
}
