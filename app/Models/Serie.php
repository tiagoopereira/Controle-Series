<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Relation;

class Serie extends Model
{
    public $timestamps = false;
    protected $fillable = [
        'name'
    ];

    public function seasons(): Relation
    {
        return $this->hasMany(Season::class);
    }
}