<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Association extends Model
{
    use HasFactory;

protected $fillable=[
    'nom',
    'date_création',
    'slogan',
    'logo',
];


    public function evenements(): HasMany
    {
        return $this->hasMany(Evenement::class);
    }
}
