<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/css/bootstrap.min.css">
  <link rel="stylesheet" href="pizza.css">
  <!-- DataTables Select CSS -->
  <link href="css/addons/datatables-select2.min.css" rel="stylesheet">
  <link href="css/addons/datatables2.min.css" rel="stylesheet">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.0/js/bootstrap.min.js"></script>
  <!-- DataTables JS -->
<script src="js/addons/datatables2.min.js" type="text/javascript"></script>
<script src="js/addons/datatables-select2.min.js" type="text/javascript"></script>

<script src="https://use.fontawesome.com/8832b1453e.js"></script>



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

  $sql_req="SELECT * FROM commande";
  $req = mysqli_query($con,$sql_req);
  //echo "AFFICHAGE Des pizzas :" ; echo ("<br>");

echo("<a class='list btn btn-info' href='livreur.php'>Retour à la liste</a>");

  echo ("<div class='container'>");

  echo("<table id='dtBasicExample' class='table table-striped table-bordered table-sm'  cellspacing='0' width='100%'>");
  echo("<thead class='thead-dark'>");
    echo("<tr>");
      echo("<th class='th-sm' scope='col'>Numero Commande</th>");
      echo("<th class='th-sm' scope='col'>Date </th>");
      echo("<th class='th-sm' scope='col'>heure</th>");
      echo("<th class='th-sm' scope='col'>numero client</th>");
      echo("<th class='th-sm' scope='col'>numero livreur</th>");
    echo("</tr>");
  echo("</thead>");
  echo("<tbody>");



  while ($ligne  = mysqli_fetch_array($req)){
    $numLivreur=$ligne['NroLivrCmde'];
    $numClient=$ligne['NroClieCmde'];
    $data=null;
    if ($ligne['NroLivrCmde']==null) {
      $nomLivreur="";

    }else{
      $req2="SELECT * FROM livreur WHERE NroLivr=".$numLivreur;

      //echo($req);
      //$data = mysqli_result($bdd,$req);
      $data = $con->query($req2)->fetch_row();
      //print_r($data);
      //$tab=$data[0];
      //print_r($tab[1]);
      $nomLivreur=$data[1]." ".$data[2];

}
if ($ligne['NroClieCmde']==null) {
    $nomClient="";
}else{
  $req3="SELECT * FROM client WHERE NroClie=".$numClient;

  //echo($req);
  //$data = mysqli_result($bdd,$req);
  $data2 = $con->query($req3)->fetch_row();
  //print_r($data);
  //$tab=$data2[0];
  //print_r($tab[1]);
  $nomClient=$data2[1]." ".$data2[2];

}
    echo("<tr>");
      echo("<th scope='col'>".$ligne['NroCmde']."</th>");
      echo("<td>".$ligne['DateCmde']."</td>");
      echo("<td>".$ligne['HeureCmde']."</td>");
      echo("<td>".$nomClient."</td>");
      echo("<td>".$nomLivreur."</td>");
    echo("</tr>");

    //echo('<input type="hidden" name="num" value="'.$ligne['NroPizz'].'">');

    //echo("<a class='dec btn btn-info' href='confirmationDelete.php?numPizza=".$ligne['NroPizz']."'>Supprimer</a>");

  }
  echo("</tbody>");
echo("</table>");

  echo("</div>");
  ?>

<script>
  $(document).ready(function () {
    $('#dtBasicExample').DataTable();
    $('.dataTables_length').addClass('bs-select');
  });
</script>

</body>
</html>
