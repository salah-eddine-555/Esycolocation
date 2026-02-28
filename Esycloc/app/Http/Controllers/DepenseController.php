<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Colocation;
use App\Models\Depense;
use App\Http\Requests\DepenseRequest;


class DepenseController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Colocation $colocation)
    {
            // $depenses = $colocation->depenses();
            // return view('colocations.details', compact('depenses'));
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
    public function store(DepenseRequest $request,Colocation $colocation,ApayerController $apaye)
    {
        $user = auth()->user();
        
        $validated = $request->validated();

        $validated['user_id'] = $user->id;
        
        $validated['colocation_id'] = $colocation->id;
       

        $depense = Depense::create($validated);

        $apaye->calculer($depense);

        return redirect()->back()->with('success', 'depense est cree avec succes');
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Depense $depense)
    {
        $depense->delete();

        return redirect()->back();

    }
}
