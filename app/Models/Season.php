<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Relations\Relation;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Season extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $fillable = ['season_number', 'serie_id'];

    public function serie(): Relation
    {
        return $this->belongsTo(Serie::class);
    }

    public function episodes(): Relation
    {
        return $this->hasMany(Episode::class);
    }

    public function watchedEpisodes(): Collection
    {
        return $this->episodes->filter(function ($episode) {
            return $episode->watched;
        });
    }
}
