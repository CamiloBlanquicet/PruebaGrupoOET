<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Conductor;
class conductorController extends Controller
{
    public function getConductor($id){
        return Conductor::find($id);
    }
    public function allConductor(){
        return Conductor::all();
    }
    public function addConductor(Request $request){
 
        $conductor = new Conductor;
        $conductor->cedula = $request->cedula;
        $conductor->primerNombre = $request->primerNombre;
        $conductor->segundoNombre = $request->segundoNombre;
        $conductor->apellidos = $request->apellidos;
        $conductor->direccion = $request->direccion;
        $conductor->telefono = $request->telefono;
        $conductor->ciudad = $request->ciudad;
        $conductor->save();

        return redirect('/conductor');

    }
    public function setConductor(Request $request){
        $id = $request->input('id');
        $cedula = $request->input('cedula');
        $primerNombre = $request->input('primerNombre');
        $segundoNombre = $request->input('segundoNombre');
        $apellidos = $request->input('apellidos');
        $direccion = $request->input('direccion');
        $telefono = $request->input('telefono');
        $ciudad = $request->input('ciudad');

        $conductor = Conductor::where('id',$id)->update([
           'cedula' => $cedula,
           'primerNombre' => $primerNombre,
           'segundoNombre' => $segundoNombre,
           'apellidos' => $apellidos,
           'direccion' => $direccion,
           'telefono' => $telefono,
           'ciudad' => $ciudad
        ]);

        return redirect('/conductor');
    }
    public function deleteConductor(Request $request){
        $id = $request->input('id');
        $propietario = Conductor::findOrFail($id);
        $propietario->delete();
        return redirect('/conductor');

     }
}
