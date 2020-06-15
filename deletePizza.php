<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <?php
    $numPizza = $_GET['numPizza'];
    echo($numPizza);

    try{
        $bdd = mysqli_connect('localhost', 'root', '', 'pizzabox');
        mysqli_set_charset($bdd,"utf8");

        $req="DELETE FROM pizza WHERE NroPizz=".$numPizza;

      //  echo $req;

      //  die();

        mysqli_query($bdd,$req);

        mysqli_close($bdd);

    }catch (Exception $e){
        echo "Erreur connection".$e;
    }

    echo "<script type='text/javascript'>document.location.replace('http://localhost/pizzaPhp-CRUD/');</script>";
    ?>
</body>
</html>
