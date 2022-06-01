<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;
use App\Models\Conductor;
use App\Models\Propietario;
class baseController extends Controller
{
    public function inicio(){
        $consulta = "select T1.placa as Placa, T1.marca as Marca, CONCAT(T2.primerNombre,' ',T2.segundoNombre, ' ', T2.apellidos) as Conductor, CONCAT(T3.primerNombre,' ',T3.segundoNombre, ' ', T3.apellidos) as Propietario from vehiculo T1 inner join conductor T2 on T1.fk_conductor = T2.id inner join propietario T3 on T1.fk_propietario = T3.id;";
        $respuesta = DB::select($consulta);
        return view('index',['data' => $respuesta]);
    }
    public function vehiculo(){
        $consultaTabla = "select T1.id, T1.placa, T1.marca, T1.color, T1.tipoVehiculo,  T1.fk_conductor, T1.fk_propietario,CONCAT(T2.primerNombre,' ',T2.segundoNombre, ' ', T2.apellidos) as Conductor, CONCAT(T3.primerNombre,' ',T3.segundoNombre, ' ', T3.apellidos) as Propietario from vehiculo T1 inner join conductor T2 on T1.fk_conductor = T2.id inner join propietario T3 on T1.fk_propietario = T3.id;";
        $Tabla = DB::select($consultaTabla);
        $Conductor = Conductor::all();
        $Propietario = Propietario::all();
        return view('vehiculo',['data' => $Tabla, 'conductores' => $Conductor, 'propietarios' => $Propietario]);
    }
    public function propietario(){
        $consulta = "select * FROM `propietario`";
        $respuesta = DB::select($consulta);
        return view('propietario',['data' => $respuesta]);
    }
    public function conductor(){
        $consulta = "select * FROM `conductor`";
        $respuesta = DB::select($consulta);
        return view('conductor',['data' => $respuesta]);
    }
}
