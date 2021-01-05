<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    
<table class="table table-hover">
        <thead>
            <tr>
                <th scope="col">ID</th>
                <th scope="col">Nombres</th>
                <th scope="col">Apellidos</th>
                <th scope="col">CI</th>
                <th scope="col">Edad</th>
                <th scope="col">Sexo</th>
                <th scope="col">Fecha de registro</th>
            </tr>
        </thead>
        <tbody>
            @foreach($estudiante as $es)
                <tr>
                    <td> {{$es->id}} </td>
                    <td> {{$es->names}} </td>
                    <td> {{$es->lastnames}} </td>
                    <td> {{$es->cedula_tipo}}-{{$es->cedula}} </td>
                    <td> {{$es->age}} </td>
                    <td> {{$es->sex}} </td>
                    <td> {{$es->created}} </td>
                </tr>
            @endforeach
        </tbody>
    </table>

</body>
</html>