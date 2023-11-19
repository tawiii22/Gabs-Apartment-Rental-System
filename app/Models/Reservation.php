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
        'gender',
        'email',
        'contact_no',
        'status'
    ];

    public function guest_house() {
        return $this->belongsTo(GuestHouses::class, 'room_id');
    }

}
