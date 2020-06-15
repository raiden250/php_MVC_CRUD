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

  <?php
  $numLivreur = $_GET['numLivreur'];
  //echo($numPizza);

  try{
    $bdd = mysqli_connect('localhost', 'root', '', 'pizzabox');
    mysqli_set_charset($bdd,"utf8");

    $req="SELECT * FROM livreur WHERE NroLivr=".$numLivreur;

    //echo($req);
    //$data = mysqli_result($bdd,$req);
    $data = $bdd->query($req)->fetch_row();

    //var_dump($data);
    echo('<nav class="navbar navbar-default">');
    echo('<div class="container-fluid">');
      echo('<div class="navbar-header">');
        echo('<a class="navbar-brand" href="#">WebPizza</a>');
      echo('</div>');
    echo('  <ul class="nav navbar-nav">');
      echo('  <li class="active"><a href="index.php">Pizza</a></li>');
      echo('  <li><a href="livreur.php">Livreur</a></li>');
    echo('  </ul> </div>');
echo('</nav>');

    echo("<a class='list btn btn-info' href='livreur.php'>Retour à la liste</a>");

    echo('<div class="container">');
    echo('<div class="col-md-offset-3 col-md-6"">');
      echo('<form action="recupModifLivreur.php" method="post">');
        echo('<input type="hidden" name="num" value="'.$numLivreur.'">');
        echo('<h1>Formulaire Modification Livreur</h1>');

        echo('<div class="form-group">');
          echo('<label>Nom du livreur :</label>');
          echo('<input type="text" class="form-control" name ="nom" id="nom" value="'.$data[1].'">');
        echo('</div>');

        echo('<div class="form-group">');
          echo('<label>Prenom du livreur :</label>');
          echo('<input type="text" class="form-control" name ="prenom" id="prenom" value="'.$data[2].'">');
        echo('</div>');

        echo('<div class="form-group">');
          echo('<label>Inserer la photo :</label>');
          echo("<img src='images/".$data[0].".png' style='width:300px'>");

          echo('<input class="form-control" type="file" name="photo" id="photo">');
        echo('</div>');

        echo('<div class="form-group">');
          echo('<label for="DatEmbauche">Date embauche :</label>');
          echo('<input type="date" id="DatEmbauche" name="DatEmbauche" value="'.$data[3].'">');
        echo('</div>');

        echo('<button type="submit" class="btn btn-default">Valider</button>');
      echo('</form>');
      echo('</div>');
    echo('</div>');


  }catch (Exception $e){
    echo "Erreur connection".$e;
  }
  ?>
</body>
</html>
