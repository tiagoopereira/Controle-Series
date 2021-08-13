<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\Relation;

class Episode extends Model
{
    use HasFactory;

    public function season(): Relation
    {
        return $this->belongsTo(Seaso::class);
    }
}
