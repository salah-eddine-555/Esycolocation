<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Mail;
use Illuminate\Support\Facades\Auth;
use App\Mail\InvitationMail;

 

use App\Http\Requests\InviationRequest;
use App\Models\Colocation;
use App\Models\Invitation;
use App\Models\User;


class InvitationController extends Controller
{
    
    public function store(InviationRequest $request,Colocation $colocation){

        $validated = $request->validated();
        $user = auth()->user();
        

        if(!$user->colocations()->wherePivot('role_colocation', 'owner')->exists()){
            return redirect()->back()->with('error', 'il n a pas le doit de inviter user');
        }
       
        $validated['id_colocation'] = $colocation->id;
        $validated['id_user'] = $user->id;
        $validated['token'] = Str::random(30);
        Invitation::create($validated);

        Mail::to($validated['email'])->send(new InvitationMail($validated['token']));

        return redirect()->back()->with('success', 'invitation est envoyer avec succee');
    }

    public function accept($token){
        
        $invitation = Invitation::where('token', $token)->first();
      
        $user = auth()->user();
        $userExiste = User::where('email', $invitation->email)->exists();
       

        if(!$user){
            if(!$userExiste){
                return redirect('/register');
            }else{
                return redirect('/login');
            } 
        }
         $colocation = $invitation->colocation;
     
       
         $invitation->colocation->users()->attach($user->id,[
            'role_colocation'=>'membre',
            'jointed_at'=> now(),
        ]);
     
        $invitation->statut = 'accept';
        $invitation->save();
    

         return redirect()->route('colocation.show', $colocation->id)->with('success', 'Vous avez rejoint la colocation');    
    }
}

