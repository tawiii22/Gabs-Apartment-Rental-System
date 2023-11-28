<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Listing extends Model
{
    use HasFactory;

    protected $fillable = [
        'room_name', 
        'room_details', 
        'room_price', 
        'room_image',
        'room_gender'
    ];

    public function beds() {
        return $this->hasMany(Bed::class);
    }

}
