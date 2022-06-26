<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class SubDistrict extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = [
        'district_id',
        'subd_name',
        'subd_desc',
        'subd_zipcode',
    ];

    public function district()
    {
        return $this->belongsTo(District::class,'district_id');
    }
}
