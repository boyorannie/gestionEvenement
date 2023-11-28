<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Evenement extends Model
{
    use HasFactory;
    protected $fillable=[
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

    public function client(): BelongsTo
{
    return $this->belongsTo(Client::class);
}
}


