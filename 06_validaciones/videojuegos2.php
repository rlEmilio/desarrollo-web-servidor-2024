<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">


</head>
<body>
    
<div class="container">
    <h1>Formulario de videoujegos</h1>
    <form action="" method="post" class="col-6">
    

    <div class="mb-3">
    <label for="" class="form-label">Titulo</label>
    <input type="text" class="form-control" >
    </div>

    <div class="mb-3">
    <label for="" class="form-label">Descripcion</label>
    <textarea class="form-control" ></textarea>
    </div>
    
    <label for="consolas" class="form-label">Consolas</label>
    <div class="form-check">
  <input class="form-check-input" type="radio" name="consolas" value="play4">
  <label class="form-check-label" for="consolas">
    Playstation 4
  </label>
    </div>

    <div class="form-check">
  <input class="form-check-input" type="radio" name="consolas" value="play5">
  <label class="form-check-label" for="consolas">
    Playstation 5
  </label>
    </div>

    
    <div class="form-check">
  <input class="form-check-input" type="radio" name="consolas" value="PC">
  <label class="form-check-label" for="consolas">
    PC
  </label>
    </div>

       
    <div class="form-check">
  <input class="form-check-input" type="radio" name="consolas" value="switch">
  <label class="form-check-label" for="consolas">
    Swith
  </label>
    </div>


   
    <div class="form-check">
  <input class="form-check-input" type="radio" name="consolas" value="xbox">
  <label class="form-check-label" for="consolas">
    Xbox
  </label>
    </div>

<div class="mt-3">
    <label class="form-label" for="fecha">Fecha lanzamiento</label>
    <input type="date" class="form-control">
</div>

<div class="mt-3">
    <input class="btn btn-primary" type="submit" value="enviar">


</div>


    </form>

    </div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
</body>
</html>