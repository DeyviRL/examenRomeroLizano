<?php

namespace App\Http\Controllers;

use App\Models\Estudiante;
use Illuminate\Http\Request;
use App\Http\Requests\EstudianteRequest;

class EstudianteController extends Controller
{
    
   public function index(Request $request)
    {
        //dd($request);
        $texto=trim($request->get('texto'));
        $registros=Estudiante::where('nombres', 'like', '%' . $texto . '%')->paginate(10);
        return view('estudiante.index',compact('registros','texto'));
    }


    public function create()
    {
        $estudiante= new Estudiante();
        return view('estudiante.action',['estudiante'=>new Estudiante()]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(EstudianteRequest $request)
    {
        $estudiante = new Estudiante;
        $estudiante->codigo = $request->input('codigo');
        $estudiante->nombres = $request->input('nombres');
        $estudiante->apellidos = $request->input('apellidos');
        $estudiante->edad = $request->input('edad');
        $estudiante->promedio = $request->input('promedio');
        $estudiante->save();
    
        return response()->json([
            'status' => 'success',
            'message' => 'Estudiante creado satisfactoriamente'
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(Estudiante $estudiante)
    {
        return "Mostrar";
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $estudiante=Estudiante::findOrFail($id);
        return view('estudiante.action',compact('estudiante'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(EstudianteRequest $request, $id)
    {
        $estudiante = Estudiante::findOrFail($id);
        $estudiante->codigo = $request->input('codigo');
        $estudiante->nombres = $request->input('nombres');
        $estudiante->apellidos = $request->input('apellidos');
        $estudiante->edad = $request->input('edad');
        $estudiante->promedio = $request->input('promedio');
        $estudiante->save();
    
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
        $registro = Estudiante::findOrFail($id);
        $registro->delete();

        return response()->json([
            'status' => 'success',
            'message' => $registro->nombre . ' Eliminado'
        ]);
    }
}
