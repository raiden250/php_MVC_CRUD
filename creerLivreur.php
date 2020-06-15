<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <link rel="stylesheet" href="pizza.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
  <title>Document</title>
</head>
<body>
  <nav class="navbar navbar-default">
    <div class="container-fluid">
      <div class="navbar-header">
        <a class="navbar-brand" href="#">WebPizza</a>
      </div>
      <ul class="nav navbar-nav">
        <li class="active"><a href="index.php">Pizza</a></li>
        <li><a href="livreur.php">Livreur</a></li>
      </ul>
    </div>
  </nav>
  <a class='list btn btn-info' href='livreur.php'>Retour à la liste</a>

  <div class="container">
    <div class="col-md-offset-3 col-md-6">
      <form action="recupLivreur.php" method="post" enctype="multipart/form-data">
        <h1>Formulaire Création Livreur</h1>
        <div class="form-group">
          <label>Nom du livreur :</label>
          <input type="text" class="form-control" name ="nom" id="nom" required>
        </div>
        <div class="form-group">
          <label>Prenom du livreur :</label>
          <input type="text" class="form-control" name ="prenom" id="prenom" required>
        </div>

        <div class="form-group">
          <label>Inserer la photo :</label>
          <input class="form-control" type="file" name="photo" id="photo">
        </div>
        <div class="form-group">
          <label for="DatEmbauche">Date embauche :</label>
          <input type="date" id="DatEmbauche" name="DatEmbauche" required>
        </div>
        <button type="submit" class="btn btn-default">Créer un livreur</button>
      </form>
    </div>
  </div>

</body>
</html>
