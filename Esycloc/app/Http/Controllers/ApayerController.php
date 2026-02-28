<?php

namespace App\Http\Controllers;
use App\Models\Colocation;
use App\Models\Apayer;


use Illuminate\Http\Request;


class ApayerController extends Controller
{
    
    public function calculer($depense){

        $colocation = Colocation::findOrFail($depense->colocation_id);
        $montantpayee = $depense->montant / count($colocation->users);

        foreach($colocation->users as $user){
            $apyer = new Apayer();
            $apyer->montant = $montantpayee;
            $apyer->depense_id = $depense->id;
            $apyer->user_id = $user->id;

            $apyer->save();
        }
        $user = auth()->user();
        $apayes = $depense->apayees;
        foreach($apayes as $apaye){
            if($apaye->user_id == $user->id){
                $apaye->statut = true;
                $apaye->save();
            }
        }


    }
}
