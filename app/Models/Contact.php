<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Contact extends Model
{
    use HasFactory;
    protected $fillable = [
        'nom_entreprise',
        'secteur_activite',
        'email_entreprise',
        'telephone_entreprise',
        'adresse_entreprise',
        'user_id', 
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
