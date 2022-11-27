<?php

namespace App\Http\Controllers;

use App\Models\Professeur;
use App\Models\Student;
use App\Models\Tp;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{
    public function index()
    {
        return view('dashboard', ['professeurs' => Professeur::all()]);
    }
}
