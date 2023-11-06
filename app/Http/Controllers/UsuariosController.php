<?php

namespace App\Http\Controllers;

use App\Models\User;
use Hash;
use Illuminate\Http\Request;

class UsuariosController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index() //lista los usuarios
    {
        //
        $users = User::all();
        return $users;
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        //Entradas
        $inputs["first_name"] = $request->first_name;
        $inputs["last_name"] = $request->last_name;
        $inputs["username"] = $request->username;
        $inputs["email"] = $request->email;
        $inputs["user_type_id"] = 3; //1-admin, 2-Host, 3-Guest
        $inputs["password"] = Hash::make(trim($request->input('password')));

        $user = User::create($inputs);
        return $user;
    }

    public function login(Request $request){
        //  return $request->input();
        $email = $request->input('email');
        $password = $request->input('password');
        $user = User::where('email', $email)->first();

        if($user && Hash::check($password, $user->password)){
            return $user;
        }else{
            return response()->json([
                'error' => true,
                'message' => 'Usuario no encontrado'
            ]);
        }
    }

    /**
     * Display the specified resource.
     */
    public function show($id)
    {
        //
        $user = User::findorfail($id);
        return $user;
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, $id)
    {

        $response = User::find($id);
        // return $response;

        if(isset($response)){
            $response->first_name = $request->input('first_name');
            $response->last_name = $request->input('last_name');
            $response->email = $request->input('email');
            $response->password = Hash::make($request->input('password'));
            $response->save();

            return response()->json([
                'data' => $response,
                'message' => 'Usuario actualizado'
            ]);

        }
        return response()->json([
            'error' => true,
            'message' => 'Usuario no encontrado'
        ]);

    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy($id)
    {
        $response = User::find($id);
        if(isset($response)){

            $resp = $response->delete();

            return response()->json([
                'data' => [],
                'message' => 'Estudiante Eliminado'
            ]);

        }
        return response()->json([
            'error' => true,
            'message' => 'Estudiante no encontrado'
        ]);
    }
}
