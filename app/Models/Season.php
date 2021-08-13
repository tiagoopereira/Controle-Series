<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Relation;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Season extends Model
{
    use HasFactory;

    public function serie(): Relation
    {
        return $this->belongsTo(Serie::class);
    }

    public function episodes(): Relation
    {
        return $this->hasMany(Episode::class);
    } 
}
