<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mouvement extends Model
{
    use HasFactory;
    protected $fillable=[
        'mouvement1',
        'mouvement2',
        'personne_id',
        'date_entre',
        'date_sortie',
        'status',
        'motifs'
    ];

    protected function Nom(): Attribute
    {
        $user= Personne::where('id',$this->personne_id)->first();
        return Attribute::make(
            get: fn ($value) => $user->nom.' - '.$user->prenoms,
        );
    }
}

