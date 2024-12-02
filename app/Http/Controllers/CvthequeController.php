<?php

namespace App\Http\Controllers;

use App\Models\Competence;
use App\Models\Metier;
use App\Models\Professionnel;
use Illuminate\Http\Request;

class CvthequeController extends Controller
{
    public function index()
    {
        $stats = [
            'competences' => Competence::count(),
            'metiers' => Metier::count(),
            'professionnels' => Professionnel::count()
        ];
        
        return view('accueilVue', compact('stats'));
    }
}