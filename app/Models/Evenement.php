<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Evenement extends Model
{
    use HasFactory;
    protected $fillable = [
        'libelle',
        'date_limite_inscription',
        'image_mise_en_avant',
        'description',
        'statut',
        'date_evenement',
    ];

    public function association(): BelongsTo
    {
        return $this->belongsTo(Association::class);
    }

    public function client()
    {
        return $this->hasMany(Client::class);
    }
    public function reservation()
    {
        return $this->hasMany(Reservation::class);
    }
}
