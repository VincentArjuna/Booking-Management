<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class RoomType extends Model
{
    use HasFactory;

    protected $guarded = ['id'];

    public function accomodation()
    {
        return $this->belongsTo(Accomodation::class, 'accomodation_id');
    }

    public function rooms()
    {
        return $this->hasMany(Room::class, 'room_type_id');
    }
}
