<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <link rel="stylesheet" href="assets/css/style.css">
    <title>Transportes ACME S.A</title>
</head>
<body>

<nav>
    <a href="{{ url('/home') }}"><li  >Inicio</li></a>
    <a href="{{ url('/vehiculo') }}"><li class="seleccionado">Vehiculo</li></a>
    <a href="{{ url('/propietario') }}"><li>Propietarios</li></a>
    <a href="{{ url('/conductor') }}"><li >Conductores</li></a>
</nav>

<div class="contenido">


<!-- Button trigger modal -->


<!-- Modal -->
<div class="modal fade" id="modalCreate" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Creando Vehiculo</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <form method="POST" action="createVehiculo">
              @csrf
            <div class="mb-3">
                <label for="placa" class="form-label">Placa</label>
                <input type="text" class="form-control" id="placa" name="placa" placeholder="placa" required>
            </div>

            <div class="mb-3">
                <label for="color" class="form-label">Color</label>
                <input type="text" class="form-control" id="color" name="color" placeholder="color" required>
            </div>

            <div class="mb-3">
                <label for="marca" class="form-label">Marca</label>
                <input type="text" class="form-control" id="marca" name="marca" placeholder="marca" required>
            </div>

            <div class="mb-3">
                <select class="form-select" aria-label="" name="tipoVehiculo" required>
                    <option selected>Tipo de vehículo</option>
                    <option value="Particular">Particular</option>
                    <option value="Privado">Privado</option>
                </select>
            </div>

            <div class="mb-3">
                <select class="form-select" aria-label="" name="fk_conductor" required>
                    <option selected>Conductor</option>
                    @foreach ($conductores as $conductor)
                    <option value="{{$conductor->id}}">{{$conductor->id}} - {{$conductor->primerNombre}} {{$conductor->apellidos}} </option>
                    @endforeach
                </select>
            </div>

            
            <div class="mb-3">
                <select class="form-select" aria-label="Default select example" name="fk_propietario" required>
                    <option selected>Propietario</option>
                    @foreach ($propietarios as $propietario)
                    <option value="{{$propietario->id}}">{{$propietario->id}} - {{$propietario->primerNombre}} {{$propietario->apellidos}} </option>
                    @endforeach
                </select>
            </div>

          
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
          <button type="submit" class="btn btn-primary">Guardar</button>
        </form>
        </div>
      </div>
    </div>
  </div>



<div class="tabla">
<div class="boton">
        <button type="button" class="btn btn-success margin" data-bs-toggle="modal" data-bs-target="#modalCreate">
        Agregar
        </button>
    </div>
<table id="tabla" class="table table-dark table-striped">
      <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Placa</th>
      <th scope="col">Color</th>
      <th scope="col">Marca</th>
      <th scope="col">Tipo de vehiculo</th>
      <th scope="col">Nombre Conductor</th>
      <th scope="col">Nombre Propietario</th>
      <th scope="col">Gestionar</th>
    </tr>
  </thead>
  <tbody>
      @foreach ($data as $datos)
    <tr>
      <th scope="row">{{$datos->id}}</th>
      <td>{{$datos->placa}}</td>
      <td>{{$datos->color}}</td>
      <td>{{$datos->marca}}</td>
      <td>{{$datos->tipoVehiculo}}</td>
      <td>{{$datos->Conductor}}</td>
      <td>{{$datos->Propietario}}</td>
      <td>
        <div style="display: flex; justify-content: center; align-items: center">

        
        <button type="button" class="btn btn-success margin" data-bs-toggle="modal" data-bs-target="#modal{{$datos->id}}">
            Actualizar
         </button>
         
         <form action="deleteVehiculo" method="POST">
          @csrf
          <input type="hidden" name="id" value="{{$datos->id}}">
          <button type="submit" class="btn btn-danger">Borrar</button>
         </form>
        </div>
        </td>
    </tr>
    <form action="setvehiculo" method="POST" >
      <input type="hidden" name="id" value="{{$datos->id}}">
      @csrf
    <div class="modal fade" id="modal{{$datos->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true" >
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Actualizando Placa {{$datos->placa}}</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                
                <div class="mb-3">
                    <label for="placa" class="form-label">Placa</label>
                    <input type="text" class="form-control" id="placa" name="placa" placeholder="placa" value="{{$datos->placa}}" required>
                </div>

                <div class="mb-3">
                    <label for="color" class="form-label">Color</label>
                    <input type="text" class="form-control" id="color" name="color" placeholder="color" value="{{$datos->color}}" required>
                </div>

                <div class="mb-3">
                    <label for="marca" class="form-label">Marca</label>
                    <input type="text" class="form-control" id="marca" name="marca" placeholder="marca" value="{{$datos->marca}}" required>
                </div>

                <div class="mb-3">
                    <select class="form-select" aria-label="" name="tipoVehiculo">
                        @if ($datos->tipoVehiculo === "Particular")
                        <option value="Particular" selected>Particular</option>
                        <option value="Privado">Privado</option>
                        @else
                        <option value="Particular">Particular</option>
                        <option value="Privado" selected>Privado</option> 
                        @endif
                        <option value="Particular">Particular</option>
                        <option value="Privado">Privado</option>
                    </select>
                </div>

                <div class="mb-3">
                    <select class="form-select" aria-label="" name="fk_conductor">
                        @foreach ($conductores as $conductor)
                            @if ($conductor->id == $datos->fk_conductor)
                            <option value="{{$conductor->id}}" selected>{{$conductor->id}} - {{$conductor->primerNombre}} {{$conductor->apellidos}} </option>
                            @else
                            <option value="{{$conductor->id}}">{{$conductor->id}} - {{$conductor->primerNombre}} {{$conductor->apellidos}} </option>
                            @endif
                        @endforeach
                    </select>
                </div>

                <div class="mb-3">
                    <select class="form-select" aria-label="" name="fk_propietario">
                        @foreach ($propietarios as $propietario)
                        @if ($propietario->id == $datos->fk_propietario)
                        <option value="{{$propietario->id}}" selected>{{$propietario->id}} - {{$propietario->primerNombre}} {{$propietario->apellidos}} </option>
                        @else
                        <option value="{{$propietario->id}}">{{$propietario->id}} - {{$propietario->primerNombre}} {{$propietario->apellidos}} </option>
                        @endif
                        @endforeach
                    </select>
                </div>
            </div>
            <div class="modal-footer">
              <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
              <button type="submit" class="btn btn-primary">Guardar</button>
            </div>
          </div>
        </div>
      </div>
    </form>
        @endforeach
    
  </tbody>

  </table>
  </div>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
</body>
</html>