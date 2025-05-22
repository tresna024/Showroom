<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Booking extends Model
{
        /**
     * Nama tabel yang digunakan.
     *
     * @var string
     */
    protected $table = 'bookings';

    /**
     * Atribut yang dapat diisi secara massal.
     *
     * @var array
     */
    protected $fillable = [
        'name',
        'email',
        'alamat',
        'telepon',
        'mobil',
        'harga',
    ];
}
