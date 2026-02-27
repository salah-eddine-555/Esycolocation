<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Requests\CategorieRequest;
use App\Models\Colocation;
use App\Models\Categorie;


class CategorieController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(CategorieRequest $request,Colocation $colocation)
    {
        $validated = $request->validated();
        $user = auth()->user();
        $UserColocation = $colocation->users()->where('user_id', $user->id)->first();


        if($UserColocation->pivot->role_colocation !== 'owner'){
            return redirect()->back()->with('error', 'n est pas le droit pour crre categorie');
        }
        $validated['colocation_id'] = $colocation->id;
        Categorie::create($validated);
        return redirect()->back()->with('success', 'categorie ajouter avec success');
    }

    /**
     * Display the specified resource.
     */
    public function show()
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Categorie $categorie)
    {
        return view("colocations.modifierCategorie", compact('categorie'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(CategorieRequest $request, string $id)
    {
        $categorie = Categorie::findOrFail($id);
        $colocation = $categorie->colocation;
      
        dd($colocation);
        $user = auth()->user();
        $UserColocation = $colocation->users()->where('user_id', $user->id)->first();

        if($UserColocation->pivot->role_colocation !== 'owner'){
            return redirect()->back()->with('error', 'n est pas le droit de modifier categorie');
        }
        $validated = $request->validated();
        $categorie->update($validated);
        return redirect()->route('colocation.show')->with('success', 'le categorie est modifier avec succes !');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        //
    }
}
