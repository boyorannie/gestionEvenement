<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reservation extends Model
{
    use HasFactory;

    protected $fillable=[
        'reference',
        'statut',
    ];

    public function client() {
        return $this->belongsTo(Client::class);
    }

    public function evenement() {
        
        return $this->belongsTo(Evenement::class);
    }
}
