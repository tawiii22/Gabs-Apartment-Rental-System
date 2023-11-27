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

    public function scopeFilter($query, array $filters) {

        if($filters['search'] ?? false) {
            $query->where('room_name', 'LIKE', '%'. request('search') .'%')
            ->orWhere('room_details', 'LIKE', '%'. request('search') .'%')
            ->orWhere('room_location', 'LIKE', '%'. request('search') .'%')
            ->orWhere('room_price', 'LIKE', '%'. request('search') .'%');
        }

    }

}
