<?php

namespace App\Http\Controllers;

use App\Models\Vehiculo;
use Illuminate\Http\Request;
use App\Http\Requests\VehiculoRequest;

class VehiculoController extends Controller
{
    
   public function index(Request $request)
    {
        $texto = trim($request->get('texto'));
        $vehiculos = Vehiculo::where('placa', 'like', '%' . $texto . '%')->paginate(10);
        return view('vehiculo.index', compact('vehiculos', 'texto'));
    }


    public function create()
    {
        $vehiculo = new Vehiculo();
        return view('vehiculo.action', ['vehiculo' => new Vehiculo()]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(VehiculoRequest $request)
    {
        $vehiculo = new Vehiculo;
        $vehiculo->placa = $request->input('placa');
        $vehiculo->modelo = $request->input('modelo');
        $vehiculo->propietario = $request->input('propietario');
        $vehiculo->save();
    
        return response()->json([
            'status' => 'success',
            'message' => 'Vehículo creado satisfactoriamente'
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Vehiculo $vehiculo)
    {
        return "Mostrar";
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $vehiculo = Vehiculo::findOrFail($id);
        return view('vehiculo.action', compact('vehiculo'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(VehiculoRequest $request, $id)
    {
        $vehiculo = Vehiculo::findOrFail($id);
        $vehiculo->placa = $request->input('placa');
        $vehiculo->modelo = $request->input('modelo');
        $vehiculo->propietario = $request->input('propietario');
        $vehiculo->save();
    
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
        $vehiculo = Vehiculo::findOrFail($id);
        $vehiculo->delete();

        return response()->json([
            'status' => 'success',
            'message' => $vehiculo->placa . ' Eliminado'
        ]);
    }
}
