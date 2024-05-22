<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\Hash;

use App\Models\User;
use Illuminate\Http\Request;
use App\Http\Requests\UserRequest;

class UserController extends Controller
{
    public function index(Request $request)
    {
        //dd($request);
        $texto=trim($request->get('texto'));
        $registros=User::where('name', 'like', '%' . $texto . '%')->paginate(10);
        return view('user.index',compact('registros','texto'));
    }


    public function create()
    {
        $user= new User();
        return view('user.action',['user'=>new User()]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(UserRequest $request)
    {
        $user = new User;
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        $user->password = bcrypt($request->input('password')); 
        $user->save();
    
        return response()->json([
            'status' => 'success',
            'message' => 'Usuario creado satisfactoriamente'
        ]);
    }

    /**
     * Display the specified resource.
     */
    public function show(User $user)
    {
        return "Mostrar";
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit($id)
    {
        $user=User::findOrFail($id);
        return view('user.action',compact('user'));
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UserRequest $request, $id)
    {
        $user = User::findOrFail($id);
        $user->name = $request->input('name');
        $user->email = $request->input('email');
        // Verifica si se proporcionó una nueva contraseña y la actualiza si es necesario
        if ($request->has('password')) {
            $user->password = bcrypt($request->input('password')); // Cambio aquí
        }
        $user->save();
    
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
        $registro = User::findOrFail($id);
        $registro->delete();

        return response()->json([
            'status' => 'success',
            'message' => $registro->nombre . ' Eliminado'
        ]);
    }
}
