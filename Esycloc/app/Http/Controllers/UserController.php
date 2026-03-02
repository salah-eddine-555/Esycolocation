<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Depense;
use App\Models\User;
use App\Models\Colocation;
use App\Models\Apayer;

class UserController extends Controller
{
    public function index(){
        $user = auth()->user();
        $depenses = Depense::where('user_id', $user->id)->get();
        $totalDepenses = Depense::where('user_id', $user->id)->sum('montant');
        $scoreReputation = User::where('id', $user->id)->sum('reputation');

        return view('dashboard', compact('depenses', 'totalDepenses', 'scoreReputation'));
    }

    public function quit(Colocation $colocation){
        $user = auth()->user();

        $dette = Apayer::where('user_id', $user->id)->where('statut', false)->exists();

        if($dette){
            $user->reputation -= 1;
            $user->save();
        }
        $user->colocations()->updateExistingPivot($colocation->id,['left_at'=> now()]);

        return redirect()->back()->with('success', 'vous avez quite le colocation');

    }

}
