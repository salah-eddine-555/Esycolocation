<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\;
use App\Http\Requests\InviationRequest;
use App\Models\Colocation;


class InvitationController extends Controller
{
    
    public function store(InviationRequest $request,Colocatilon $colocation){

        $validated = $request->validated();

        $user = auth()->user();
        $validated['id_colocation'] = $colocation->id;
        $validated['id_user'] = $user->id;
        $validated['token'] = Str::
        Inviataion::create($validated);

    }
}
