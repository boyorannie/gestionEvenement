<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;

class Client extends Model
{
    use HasFactory, Notifiable;


    protected $fillable=[
        'prenom',
        'email',
        'telephone',
        'motpasse',
    ];

    public function clients(): HasMany
    {
        return $this->hasMany(Client::class);
    }


}


           