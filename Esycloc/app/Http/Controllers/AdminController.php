<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\Colocation;
use App\Models\Depense;

class AdminController extends Controller
{
    public function index(){

        $totalMembres = User::count();
        $totalColocations = Colocation::count();
        $totalDepenses = Depense::sum('montant');
        $users = User::all();

    
    return view('admin', compact('totalMembres', 'totalColocations', 'totalDepenses','users'));
    }
}
