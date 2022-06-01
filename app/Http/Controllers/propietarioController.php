<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Propietario;

class propietarioController extends Controller
{
    public function getPropietario($id){
        return Propietario::find($id);
    }
    public function allPropietario(){
        return Propietario::all();
    }
    public function addPropietario(Request $request){
 
        $propietario = new Propietario;
        $propietario->cedula = $request->cedula;
        $propietario->primerNombre = $request->primerNombre;
        $propietario->segundoNombre = $request->segundoNombre;
        $propietario->apellidos = $request->apellidos;
        $propietario->direccion = $request->direccion;
        $propietario->telefono = $request->telefono;
        $propietario->ciudad = $request->ciudad;
        $propietario->save();

        return redirect('/propietario');

    }
    public function setPropietario(Request $request){
        $id = $request->input('id');
        $cedula = $request->input('cedula');
        $primerNombre = $request->input('primerNombre');
        $segundoNombre = $request->input('segundoNombre');
        $apellidos = $request->input('apellidos');
        $direccion = $request->input('direccion');
        $telefono = $request->input('telefono');
        $ciudad = $request->input('ciudad');

        $propietario = Propietario::where('id',$id)->update([
           'cedula' => $cedula,
           'primerNombre' => $primerNombre,
           'segundoNombre' => $segundoNombre,
           'apellidos' => $apellidos,
           'direccion' => $direccion,
           'telefono' => $telefono,
           'ciudad' => $ciudad
        ]);

        return redirect('/propietario');
    }
    public function deletePropietario(Request $request){
        $id = $request->input('id');
        $propietario = Propietario::findOrFail($id);
        $propietario->delete();
        return redirect('/propietario');

     }
}
