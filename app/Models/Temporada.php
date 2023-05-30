<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Temporada extends Model
{
    use HasFactory;

    protected $fillable = [ 'temporada',];

    public function episodios()
    {
        return $this->hasMany(Episodio::class);
    }
    
    public function series()
    {
        return $this->belongsTo(Series::class);
    }
}
