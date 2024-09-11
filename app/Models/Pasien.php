<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasOne;
use Illuminate\Database\Eloquent\SoftDeletes;

class Pasien extends Model
{
    use SoftDeletes;
    
    protected $table = 'pasien';
    protected $fillable = [
        'user_id',
        'address',
        'phone',
    ];

    public function user(): HasOne
    {
        return $this->hasOne(PenggunaModel::class, 'id', 'user_id');
    }
}