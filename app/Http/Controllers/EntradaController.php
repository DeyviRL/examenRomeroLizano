<?php

namespace App\Http\Controllers;

use App\Models\Entrada;
use Illuminate\Http\Request;
use App\Http\Requests\EntradaRequest;

class EntradaController extends Controller
{
    
   public function index(Request $request)
    {
        $texto = trim($request->get('texto'));
        $entradas = Entrada::where('placa', 'like', '%' . $texto . '%')->paginate(10);
        return view('entrada.index', compact('entradas', 'texto'));
    }


    public function create()
    {
        $entrada = new Entrada();
        return view('entrada.action', ['entrada' => new Entrada()]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(EntradaRequest $request)
    {
        $entrada = new Entrada;
        $entrada->placa = $request->input('placa');
        $entrada->fecha = $request->input('fecha');
        $entrada->save();
    
        return response()->json([
            'status' => 'success',
            'message' => 'Entrada creada satisfactoriamente'
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Entrada $entrada)
    {
        return "Mostrar";
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $entrada = Entrada::findOrFail($id);
        return view('entrada.action', compact('entrada'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(EntradaRequest $request, $id)
    {
        $entrada = Entrada::findOrFail($id);
        $entrada->placa = $request->input('placa');
        $entrada->fecha = $request->input('fecha');
        $entrada->save();
    
        return response()->json([
            'status' => 'success',
            'message' => 'Actualización de datos satisfactoria'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $entrada = Entrada::findOrFail($id);
        $entrada->delete();

        return response()->json([
            'status' => 'success',
            'message' => 'Entrada eliminada'
        ]);
    }
}