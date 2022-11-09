<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mahasiswa extends Model
{
    use HasFactory;
    protected $table = 'mahasiswa';
    protected $primaryKey = 'nim';
    public $incrementing = false;
    protected $keyType = 'bigint';
    protected $fillable = [
        'nim', 'user_id', 'nama', 'kelas', 'ttl', 'alamat'
    ];
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
