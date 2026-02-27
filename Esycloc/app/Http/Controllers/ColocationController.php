<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
use Illuminate\Http\RedirectResponse;

use App\Http\Requests\ColocationRequest;

use App\Models\Colocation;
use Illuminate\Support\Facades\Auth;


class ColocationController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $colocations = Auth::user()->colocations;
        $depenses = Auth::user()->depenses;
        
        return view('colocations.index', compact('colocations','depenses'));
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
        $user = auth()->user();

        if($user->role->name !== 'admin'){
            $existColocation = $user->colocations()->wherePivot('left_at', null)->first();
             
            if($existColocation){
                return redirect()->back()->with('error', 'vous avex deja  une colocation active .');
            }
        }
        $validated = $request->validated();
        $colocation = Colocation::create($validated);

        $colocation->users()->attach(auth()->id(), [
            'role_colocation'=> 'owner',
            'jointed_at'=> now(),
        ]);

        return redirect()->back();
    }

    /**
     * Display the specified resource.
     */
    public function show(Colocation $colocation)
    {
        $colocation->load('categories');
        return view('colocations.details', compact('colocation'));
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
