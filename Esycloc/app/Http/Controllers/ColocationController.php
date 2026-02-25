<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;

use App\Models\Colocation;

class ColocationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $colocations = Colocation::all();
        return view('colocations.index', compact('colocations'));
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
    public function store(ColocationRequest $request): RedirectResponse
    {
        $validated = $request->validated();
        $colocation = Colocation::create($validated);

        $colocation->users()->attach(auth()->id(), [
            'role_colocation'=> 'gerant',
            'jointed_at'=> now(),
        ]);

        return redirect()->route('colocation.index');
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
    public function edit(Colocation $colocation)
    {
        return view('colocations.edit', compact('colocation'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(ColocationRequest $request,Colocation $colocation)
    {
        $validated = $request->validated();

        $colocation->update($validated);
        return redirect()->route('colocation.index');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Colocation $colocation)
    {
        $colocation->delete();
        return redirect()->route('colocation.index');
    }
}
