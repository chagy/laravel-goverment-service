<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class GovernmentServiceItem extends Model
{
    use HasFactory;

    protected $fillable = [
        'government_service_id',
        'user_id',
        'position_id',
        'gose_item_fullname',
        'gose_item_position',
        'gose_item_type'
    ];

    public function governmentService()
    {
        return $this->belongsTo(GovernmentService::class,'government_service_id');
    }

    public function user()
    {
        return $this->belongsTo(User::class,'user_id');
    }

    public function position()
    {
        return $this->belongsTo(Position::class,'position_id');
    }
}
