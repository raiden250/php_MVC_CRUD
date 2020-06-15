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
  <script> var livreurId</script>
  <nav class="navbar navbar-default">
  <div class="container-fluid">
    <div class="navbar-header">
      <a class="navbar-brand" href="#">WebPizza</a>
    </div>
    <ul class="nav navbar-nav">
      <li class="active"><a href="index.php">Pizza</a></li>
      <li><a href="livreur.php">Livreur</a></li>
      <li><a href="listeCommande.php">Commandes</a></li>
    </ul>
  </div>
</nav>
  <?php
  $con = mysqli_connect('localhost', 'root', '', 'pizzabox');
  mysqli_set_charset($con,"utf8"); //résoud les problèmes d'accents

  $sql_req="SELECT * FROM livreur";
  $req = mysqli_query($con,$sql_req);
  //echo "AFFICHAGE Des pizzas :" ; echo ("<br>");



  echo("<a class='create btn btn-info btn-pos' href='creerLivreur.php'>Créer Livreur</a>");

  echo ("<div class='container'>");

  while ($ligne  = mysqli_fetch_array($req)){
    echo("<div class='col-sm-4'>");
    echo("<img class='image' src='images/".$ligne['NroLivr'].".png'>");
    echo("<h3><b>".$ligne['NomLivr']." ".$ligne['PrenomLivr']."</b></h2>");
    echo("<p><b>".$ligne['DatEmbauchLivr']."</b></p>");
    echo("<a class='btn btn-info' href='listeCommandeLivreur.php?numLivreur=".$ligne['NroLivr']."'>commande</a>");
    echo("<a class='btn btn-info' href='ModifLivreur.php?numLivreur=".$ligne['NroLivr']."'>Modifier</a>");


    //echo('<input type="hidden" name="num" value="'.$ligne['NroPizz'].'">');

    //echo("<a class='dec btn btn-info' href='confirmationDelete.php?numPizza=".$ligne['NroPizz']."'>Supprimer</a>");
    echo('<button type="button" class="dec btn btn-primary" data-toggle="modal" data-target="#exampleModalCenter"  data-livreur-id="'.$ligne['NroLivr'].'" >Supprimer</button>');



    echo("</div>");
  }

  echo("</div>");
  ?>
  <script>
  $(document).ready(function(){
    $('#exampleModalCenter').on('show.bs.modal', function(e) {

      //get data-id attribute of the clicked element
      livreurId = $(e.relatedTarget).data('livreur-id');
      //alert("toto"+ pizzaId);
      //populate the textbox
      $(".modal-body #LivreurId").val( livreurId);

      message= "deletLivreur.php?numLivreur="+livreurId;

      $("#monbutton").attr("href",message);

    });
  });
  </script>

  <!-- Modal -->
  <div class="modal fade" id="exampleModalCenter" tabindex="-1" role="dialog" aria-labelledby="exampleModalCenterTitle" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLongTitle">Confirmation</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          Êtes vous sûr de vouloir supprimer ce livreur ?
          <input type="hidden" name="LivreurId" id="LivreurId" value=""/>
        </div>

        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Annuler</button>

          <a id ="monbutton" class='dec btn btn-info' href="" >Supprimer</a>


        </div>
      </div>
    </div>
  </div>

</body>
</html>
