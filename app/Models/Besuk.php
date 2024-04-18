<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Besuk extends Model
{
    use HasFactory, SoftDeletes;
    
    protected $table = 'besuk';

    protected $fillable = [
        'user_id',
        'tahanan_id',
        'hubungan',
        'keperluan',
        'status',
    ];

    public function user() {
        return $this->belongsTo(User::class);
    }

    public function tahanan() {
        return $this->belongsTo(Tahanan::class, 'tahanan_id');
    }
}
