<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Professionnel extends Model
{
    use HasFactory;

    protected $fillable = [
        'nom',
        'email',
        'numero_de_telephone',
        'password',
        'metier_id',
        'cv_path'
    ];

    public function competences()
    {
        return $this->belongsToMany(Competence::class, 'professionnel_competence');
    }
}
