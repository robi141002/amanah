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
        'room_id',
        'date_in',
        'date_out',
        'name',
        'address',
        'phone',
        'kk',
        'ktp',
        'rujukan',
        'bpjs',
        'pas_photo',
        'sktm',
        'status',
    ];

    public function kamar(): HasOne
    {
        return $this->hasOne(Rooms::class, 'id', 'room_id');
    }

    /**
     * The "booted" method of the model.
     */
    protected static function booted(): void
    {
        static::created(function (Bookings $booking) {
            $booking->code = range("A", "Z")[$booking->room_id - 1] . $booking->created_at->format('Ymd') . sprintf("%04d", $booking->id);
            $booking->save();
        });
    }
}
