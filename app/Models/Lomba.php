<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Lomba extends Model
{
    use HasFactory;

    /**
     * The table associated with the model.
     *
     * @var string
     */
    protected $table = 'lombas';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'nama_lomba',
        'tanggal',
        'lokasi',
        'kategori',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'tanggal' => 'date',
    ];

    /**
     * Get the participants associated with the competition.
     */
    public function pesertas()
    {
        return $this->hasMany(Peserta::class, 'lomba_id');
    }
}
