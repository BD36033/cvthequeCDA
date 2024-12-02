<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Str;

class Metier extends Model
{
    use HasFactory;

    protected $fillable = [
        'designation', 
        'description',
        'slug'
    ] ;

    protected static function boot()
    {
        parent::boot();
        
        static::creating(function ($metier) {
            $metier->slug = Str::slug($metier->designation);
        });
        
        static::updating(function ($metier) {
            $metier->slug = Str::slug($metier->designation);
        });
    }
}
