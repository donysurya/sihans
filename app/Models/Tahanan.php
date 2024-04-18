<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Tahanan extends Model
{
    use HasFactory, SoftDeletes;
    
    protected $table = 'tahanan';

    protected $fillable = [
        'nama',
        'nik',
        'no_tahanan',
        'pekerjaan',
        'image',
        'alamat',
        'perkara',
        'updated_by',
        'tempat_lahir',
        'tgl_lahir',
        'jenis_kelamin',
        'kewarganegaraan',
        'agama',
        'pendidikan',
    ];

    public function admin() {
        return $this->belongsTo(Pidum::class, 'updated_by');
    }

    public function besuk() {
        return $this->hasMany(Besuk::class);
    }
}
