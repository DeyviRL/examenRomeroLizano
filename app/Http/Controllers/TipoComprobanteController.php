<?php

namespace App\Http\Controllers;

use App\Models\TipoComprobante;
use Illuminate\Http\Request;
use App\Http\Requests\TipoComprobanteRequest;

class TipoComprobanteController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $texto=trim($request->get('texto'));
        $registros=TipoComprobante::where('codigo', 'like', '%' . $texto . '%')->paginate(10);
        return view('tipoComprobante.index',compact('registros','texto'));
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $tipoComprobante= new TipoComprobante();
        return view('tipoComprobante.action',['tipoComprobante'=>new TipoComprobante()]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(TipoComprobanteRequest $request)
    {
        $registro = new TipoComprobante;
        $registro->codigo=$request->input('codigo');
        $registro->descripcion=$request->input('descripcion');
        $registro->save();
        return response()->json([
            'status'=> 'success',
            'message'=>'Registro creado satisfactoriamente'
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(TipoComprobante $tipoComprobante)
    {
        return "Mostrar";
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $tipoComprobante=TipoComprobante::findOrFail($id);
        return view('tipoComprobante.action',compact('tipoComprobante'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(TipoComprobanteRequest $request, $id)
    {
        $tipoComprobante=TipoComprobante::findOrFail($id);
        $tipoComprobante->codigo=$request->codigo;
        $tipoComprobante->descripcion=$request->descripcion;

        $tipoComprobante->save();

        return response()->json([
            'status'=> 'success',
            'message'=> 'Actualización de datos satisfactoria'
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $registro = TipoComprobante::findOrFail($id);
        $registro->delete();

        return response()->json([
            'status' => 'success',
            'message' => $registro->codigo . ' Eliminado'
        ]);
    }
}
