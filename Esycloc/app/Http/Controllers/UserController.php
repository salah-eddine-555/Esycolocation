<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Depense;
use App\Models\User;

class UserController extends Controller
{
    public function index(){
        $user = auth()->user();
        $depenses = Depense::where('user_id', $user->id)->get();
        $totalDepenses = Depense::where('user_id', $user->id)->sum('montant');
        $scoreReputation = User::where('id', $user->id)->sum('reputation');

        return view('dashboard', compact('depenses', 'totalDepenses', 'scoreReputation'));
    }

}
