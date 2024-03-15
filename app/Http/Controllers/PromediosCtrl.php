<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;

class PromediosCtrl extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $promedios = PromediosCtrl::all(); 

        return view('Promedios.index', compact('promedios')); 
    }

    public function create()
    {
        return view('Promedios.create'); 
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validatedData = $request->validate([ 
            'Nombre' => 'required|max:50',
            'Calificación' => 'required|max:,2,2',
          ]); 
          PromediosCtrl::create($validatedData); 
        
          return redirect('/Promedios')->with('success', 'La calificación ha sido registrada exitosamente.'); 
    }

    /**
     * Display the specified resource.
     */
    public function show(string $Entregable_ID)
    {
        $promedio = PromediosCtrl::findOrFail($Entregable_ID); 

        return view('Promedios.show', compact('promedio'));
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(string $Entregable_ID)
    {
        $promedio = PromediosCtrl::findOrFail($Entregable_ID); 

        return view('Promedios.edit', compact('promedio'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $Entregable_ID)
    {
        
        $validatedData = $request->validate([ 
            'Nombre' => 'required|max:50',
            'Calificación' => 'required|max:,2,2',
          ]); 
          PromediosCtrl::create($validatedData); 
        
          return redirect('/Promedios')->with('success', 'La calificación ha sido actualizada exitosamente.'); 
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $Entregable_ID)
    {
        $promedio = PromediosCtrl::findOrFail($Entregable_ID); 
        $promedio->delete(); 

        return redirect('/Promedios')->with('success', 'La calificación ha sido eliminada de manera exitosa.');
    }
}
