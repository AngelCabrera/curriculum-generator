<html>

<head>
  <title>Añade un trabajo - Curriculum</title>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/css/materialize.min.css">
  <link rel="stylesheet" href="./css/styles.css">
</head>

<body>
  <div>
    <div class="row">
      <div class="col s12 jumbotrom blue darken-4">
        <h1 class="title white-text">Añadir un trabajo al curriculum</h1>
      </div>
    </div>
    <div class="row">
      <div class="col s6 m4 offset-s3 offset-m4">
        <div class="card" class="text-darken-2">
          <div class=" card-content">
            <form action="/curriculum/addJob.php" method="GET">
              <label for="title" class="">Título</label>
              <input type="text" name="title" id="title" placeholder="Ingresa el título">
              <label for="description">Descripción</label>
              <textarea name="description" id="description" placeholder="Ingresa la descripción"></textarea>
              <label for="months">Meses</label>
              <input type="number" name="months" id="months" placeholder="Ingresa la cantidad de meses trabajados">
              <button class="mt-2 waves-effect waves-light btn blue darken-4" type="submit">Añadir</button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>

  <script src="https://cdnjs.cloudflare.com/ajax/libs/materialize/1.0.0/js/materialize.min.js"></script>
</body>

</html>