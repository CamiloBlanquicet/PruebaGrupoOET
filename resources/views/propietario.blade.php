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
  <a href="{{ url('/vehiculo') }}"><li >Vehiculo</li></a>
  <a href="{{ url('/propietario') }}"><li class="seleccionado">Propietarios</li></a>
  <a href="{{ url('/conductor') }}"><li >Conductores</li></a>
</nav>

<div class="contenido">


<!-- Button trigger modal -->


<!-- Modal -->
<div class="modal fade" id="modalCreate" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Creando Propietario</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
            <form method="POST" action="createPropietario">
              @csrf
            <div class="mb-3">
                <label for="cedula" class="form-label">cedula</label>
                <input type="text" class="form-control" id="cedula" name="cedula" placeholder="cedula" required>
            </div>

            <div class="mb-3">
                <label for="primerNombre" class="form-label">Primer Nombre</label>
                <input type="text" class="form-control" id="primerNombre" name="primerNombre" placeholder="Primer Nombre" required>
            </div>

            <div class="mb-3">
                <label for="segundoNombre" class="form-label">Segundo Nombre</label>
                <input type="text" class="form-control" id="segundoNombre" name="segundoNombre" placeholder="Segundo Nombre" required>
            </div>

            <div class="mb-3">
              <label for="apellidos" class="form-label">Apellidos</label>
              <input type="text" class="form-control" id="apellidos" name="apellidos" placeholder="Apellidos" required>
            </div>

            <div class="mb-3">
            <label for="direccion" class="form-label">Dirección</label>
            <input type="text" class="form-control" id="direccion" name="direccion" placeholder="Dirección" required>
            </div>

            <div class="mb-3">
              <label for="telefono" class="form-label">Telefono</label>
              <input type="text" class="form-control" id="telefono" name="telefono" placeholder="Telefono" required>
              </div>


              <div class="mb-3">
                <label for="ciudad" class="form-label">Ciudad</label>
                <input type="text" class="form-control" id="ciudad" name="ciudad" placeholder="Ciudad" required>
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
      <th scope="col">Cedula</th>
      <th scope="col">Nombre</th>
      <th scope="col">Dirección</th>
      <th scope="col">Telefono</th>
      <th scope="col">Ciudad</th>
      <th scope="col">Gestion</th>
    </tr>
  </thead>
  <tbody>
      @foreach ($data as $datos)
    <tr>
      <th scope="row">{{$datos->id}}</th>
      <td>{{$datos->cedula}}</td>
      <td>{{$datos->primerNombre}} {{$datos->segundoNombre}} {{$datos->apellidos}}</td>
      <td>{{$datos->direccion}}</td>
      <td>{{$datos->telefono}}</td>
      <td>{{$datos->ciudad}}</td>
      <td>
        <div style="display: flex; justify-content: center; align-items: center">

        
        <button type="button" class="btn btn-success margin" data-bs-toggle="modal" data-bs-target="#modal{{$datos->id}}">
            Actualizar
         </button>
         
         <form action="deletePropietario" method="POST">
          @csrf
          <input type="hidden" name="id" value="{{$datos->id}}">
          <button type="submit" class="btn btn-danger">Borrar</button>
         </form>
        </div>
        </td>
    </tr>
    <form action="setPropietario" method="POST" >
      <input type="hidden" name="id" value="{{$datos->id}}">
      @csrf
    <div class="modal fade" id="modal{{$datos->id}}" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
        <div class="modal-dialog">
          <div class="modal-content">
            <div class="modal-header">
              <h5 class="modal-title" id="exampleModalLabel">Actualizando {{$datos->primerNombre}}</h5>
              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                
              <div class="mb-3">
                <label for="cedula" class="form-label">cedula</label>
                <input type="text" class="form-control" id="cedula" name="cedula" placeholder="cedula" value="{{$datos->cedula}}" required>
            </div>

            <div class="mb-3">
                <label for="primerNombre" class="form-label">Primer Nombre</label>
                <input type="text" class="form-control" id="primerNombre" name="primerNombre" placeholder="Primer Nombre" value="{{$datos->primerNombre}}" required>
            </div>

            <div class="mb-3">
                <label for="segundoNombre" class="form-label">Segundo Nombre</label>
                <input type="text" class="form-control" id="segundoNombre" name="segundoNombre" placeholder="Segundo Nombre" value="{{$datos->segundoNombre}}" required>
            </div>

            <div class="mb-3">
              <label for="apellidos" class="form-label">Apellidos</label>
              <input type="text" class="form-control" id="apellidos" name="apellidos" placeholder="Apellidos" value="{{$datos->apellidos}}" required>
            </div>

            <div class="mb-3">
            <label for="direccion" class="form-label">Dirección</label>
            <input type="text" class="form-control" id="direccion" name="direccion" placeholder="Dirección" value="{{$datos->direccion}}" required>
            </div>

            <div class="mb-3">
              <label for="telefono" class="form-label">Telefono</label>
              <input type="text" class="form-control" id="telefono" name="telefono" placeholder="Telefono" value="{{$datos->telefono}}" required>
              </div>


              <div class="mb-3">
                <label for="ciudad" class="form-label">Ciudad</label>
                <input type="text" class="form-control" id="ciudad" name="ciudad" placeholder="Ciudad" value="{{$datos->ciudad}}" required>
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