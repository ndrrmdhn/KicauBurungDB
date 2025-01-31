<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Penilaian extends Model
{
    use HasFactory;

    protected $fillable = ['peserta_id', 'juri_id', 'kriteria', 'skor'];

    public function peserta()
    {
        return $this->belongsTo(Peserta::class);
    }

    public function juri()
    {
        return $this->belongsTo(User::class);
    }
}
