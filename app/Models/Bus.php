<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Bus extends Model
{
    protected $table = 'buses';

    protected $fillable = [
        'bus_name',
        'image',
        'rute_from',
        'rute_to',
        'price',
        'total_seat',
        'available_seat',
        'departure_time'
    ];

    public function Users() {
        // untuk mengambil relasi dan data dari tabel lain
        return $this->belongsToMany(
            User::class,
            'orders',
            'bus_id',
            'user_id'
            // withpivot adalah untuk mengambil data dari tabel pivot yang tidak ada di table relasi yang bersebrangan 
        )->withPivot('book_seat', 'total_price');
    }
}
