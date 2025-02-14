<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <form action="{{route('videojuegos.store')}}" method="post">
        @csrf
        <label>Nombre</label>
        <input type="text" name="nombre"><br>
        <label>Pegi</label>
        <input type="text" name="pegi"><br><br>
        <label>Genero</label>
        <input type="text" name="genero">
        <input type="submit" value="crear">
    </form>
</body>
</html>