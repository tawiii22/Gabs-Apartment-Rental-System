<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    use HasFactory;

    protected $fillable = [
        'room_id',
        'fullname',
        'email',
        'contact_no',
        'status',
        'bed_number'
    ];

    public function guest_house() {
        return $this->belongsTo(GuestHouses::class, 'room_id');
    }

}
