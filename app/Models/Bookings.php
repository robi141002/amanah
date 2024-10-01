<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\SoftDeletes;

class Bookings extends Model
{
    use SoftDeletes;

    protected $table = 'bookings';
    protected $fillable = [
        'code',
        'pasien_id',
        'room_id',
        'date_in',
        'date_out',
        'name',
        'address',
        'phone',
        'jenis_kelamin',
        'birthdate',
        'kriteria',
        'kk',
        'ktp',
        'rujukan',
        'bpjs',
        'pas_photo',
        'sktm',
        'pendamping_name',
        'pendamping_address',
        'pendamping_phone',
        'pendamping_ktp',
        'pendamping_pasfoto',
        'status',
        'keterangan',
        'revisied_at',
    ];

    protected $casts = [
        'revisied_at' => 'datetime',
        'created_at' => 'datetime',
        'updated_at' => 'datetime',
    ];

    public function kamar(): HasOne
    {
        return $this->hasOne(Rooms::class, 'id', 'room_id');
    }

    public function pasien(): HasOne
    {
        return $this->hasOne(Pasien::class, 'id', 'pasien_id');
    }

    /**
     * The "booted" method of the model.
     */
    protected static function booted(): void
    {
        static::created(function (Bookings $booking) {
            $booking->code = "RSA" . range("A", "Z")[$booking->room_id - 1] . $booking->created_at->format('Y') . sprintf("%04d", $booking->id);
            $booking->save();
        });
    }
}
