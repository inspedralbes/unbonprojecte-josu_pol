<?php

namespace App\Http\Controllers;

use App\Models\Coche;
use Illuminate\Http\Request;

class CocheController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $coches = Coche::all();
        return response()->json(['coches' => $coches], 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $request->validate([
            'marca' => 'required|string',
            'modelo' => 'required|string',
            'año' => 'required|integer'
        ]);

        $coche = Coche::create([
            'marca' => $request->marca,
            'modelo' => $request->modelo,
            'año' => $request->año
        ]);

        return response()->json(['coche' => $coche], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(string $id)
    {
        $coche = Coche::find($id);
        
        if (!$coche) {
            return response()->json(['message' => 'Coche no encontrado'], 404);
        }
        
        return response()->json(['coche' => $coche], 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, string $id)
    {
        $request->validate([
            'marca' => 'required|string',
            'modelo' => 'required|string',
            'año' => 'required|integer'
        ]);

        $coche = Coche::find($id);
        
        if (!$coche) {
            return response()->json(['message' => 'Coche no encontrado'], 404);
        }

        $coche->update([
            'marca' => $request->marca,
            'modelo' => $request->modelo,
            'año' => $request->año
        ]);

        return response()->json(['coche' => $coche], 200);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(string $id)
    {
        $coche = Coche::find($id);
        
        if (!$coche) {
            return response()->json(['message' => 'Coche no encontrado'], 404);
        }

        $coche->delete();

        return response()->json(['message' => 'Coche eliminado correctamente'], 200);
    }
}
