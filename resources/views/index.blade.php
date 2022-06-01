<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-0evHe/X+R7YkIZDRvuzKMRqM+OrBnVFBL6DOitfPri4tjfHxaWutUpFmBp4vmVor" crossorigin="anonymous">
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.0/jquery.min.js" integrity="sha512-894YE6QWD5I59HgZOGReFYm4dnWc1Qt5NtvYSaNcOP+u1T9qYdvdihz0PPSiiqn/+/3e7Jo4EaG7TubfWGUrMQ==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <link rel="stylesheet" href="assets/css/style.css">
    <title>Transportes ACME S.A</title>
</head>
<body>

<nav>
    <a href="{{ url('/home') }}"><li  class="seleccionado">Inicio</li></a>
    <a href="{{ url('/vehiculo') }}"><li>Vehiculo</li></a>
    <a href="{{ url('/propietario') }}"><li>Propietarios</li></a>
    <a href="{{ url('/conductor') }}"><li>Conductores</li></a>
</nav>

<div class="contenido">




<div class="tabla">

<table id="tabla" class="table table-dark table-striped">
      <thead>
    <tr>
      <th scope="col">#</th>
      <th scope="col">Placa</th>
      <th scope="col">Marca</th>
      <th scope="col">Nombre Conductor</th>
      <th scope="col">Nombre Propietario</th>
    </tr>
  </thead>
  <tbody>
    @foreach($data as $datos)
    <tr>
      <th scope="row">1</th>
      <td>{{$datos->Placa}}</td>
      <td>{{$datos->Marca}}</td>
      <td>{{$datos->Conductor}}</td>
      <td>{{$datos->Propietario}}</td>
    </tr>
    @endforeach
    
  </tbody>

  </table>
  </div>
  </div>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.0-beta1/dist/js/bootstrap.bundle.min.js" integrity="sha384-pprn3073KE6tl6bjs2QrFaJGz5/SUsLqktiwsUTF55Jfv3qYSDhgCecCxMW52nD2" crossorigin="anonymous"></script>
<script src="assets/js/ajax.js"></script>
</body>
</html>