<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Peserta extends Model
{
    use HasFactory;
    
    protected $table = 'pesertas';

    protected $fillable = [
        'user_id',
        'lomba_id',
        'nama_burung',
        'jenis_burung',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function lomba()
    {
        return $this->belongsTo(Lomba::class);
    }
}