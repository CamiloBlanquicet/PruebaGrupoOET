<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Vehiculo;
use App\Models\Conductor;
use App\Models\Propietario;
use Illuminate\Support\Facades\DB;

class vehiculoController extends Controller
{
    
    public function getVehiculo($id){
        return Vehiculo::find($id);
    }
    public function getVehiculos(){
        return Vehiculo::all();
    }
    public function addVehiculo(Request $request){

        $vehiculo = new Vehiculo;
        $vehiculo->placa = $request->placa;
        $vehiculo->color = $request->color;
        $vehiculo->marca = $request->marca;
        $vehiculo->tipoVehiculo = $request->tipoVehiculo;
        $vehiculo->fk_conductor = $request->fk_conductor;
        $vehiculo->fk_propietario = $request->fk_propietario;
        $vehiculo->save();

        return redirect('/vehiculo');
    }
    public function setVehiculo(Request $request){
        $id = $request->input('id');
        $placa = $request->input('placa');
        $color = $request->input('color');
        $marca = $request->input('marca');

        $consultaTabla = "select T1.id, T1.placa, T1.marca, T1.color, T1.tipoVehiculo,  T1.fk_conductor, T1.fk_propietario,CONCAT(T2.primerNombre,' ',T2.segundoNombre, ' ', T2.apellidos) as Conductor, CONCAT(T3.primerNombre,' ',T3.segundoNombre, ' ', T3.apellidos) as Propietario from vehiculo T1 inner join conductor T2 on T1.fk_conductor = T2.id inner join propietario T3 on T1.fk_propietario = T3.id;";
        $Tabla = DB::select($consultaTabla);
        $Conductor = Conductor::all();
        $Propietario = Propietario::all();

        $tipoVehiculo = $request->input('tipoVehiculo');
        $fk_conductor = $request->input('fk_conductor');
        $fk_propietario = $request->input('fk_propietario');

        if ($tipoVehiculo === null ) {
            $consulta = 'select tipoVehiculo from vehiculo where id = '.$id;
            $tipoVehiculo = DB::select($consulta);
            $tipoVehiculo = $tipoVehiculo[0]->tipoVehiculo;
        }

        if ($fk_conductor === null ) {
            $consulta = 'select fk_conductor from vehiculo where id = '.$id;
            $fk_conductor = DB::select($consulta);
            $fk_conductor =  $fk_conductor[0]->fk_conductor;
        }

        if ($fk_propietario === null ) {
            $consulta = 'select fk_propietario from vehiculo where id = '.$id;
            $fk_propietario = DB::select($consulta);
            $fk_propietario = $fk_propietario[0]->fk_propietario;
        }
        $vehiculo = Vehiculo::where('id',$id)->update([
            'placa' => $placa,
            'color' => $color,
            'marca' => $marca,
            'tipoVehiculo' => $tipoVehiculo,
            'fk_conductor' => $fk_conductor,
            'fk_propietario' => $fk_propietario
        ]); 
        
        
        
        return redirect('/vehiculo');
     }

     public function deleteVehiculo(Request $request){
        $id = $request->input('id');
        $vehiculo = Vehiculo::findOrFail($id);
        $vehiculo->delete();
        return redirect('/vehiculo');

     }
}
