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
    $nom = $_POST["nom"];
    $description = $_POST["description"];
    $tarif = $_POST["tarif"];

        if($bdd = mysqli_connect('localhost', 'root', '', 'pizzabox')){
      //  echo("<br>Je suis connecté");


        $sql1="UPDATE pizza SET DesignPizz='$nom', TarifPizz='$tarif' WHERE NroPizz=".$_POST['num'];

       //echo "<br>".$sql1;


        mysqli_query($bdd,$sql1);

        $req = "SELECT max(NroPizz) FROM pizza";
        $data = $bdd->query($req)->fetch_row();

        echo($data[0]);

        $dossier = 'images/';

        if(isset($_FILES['photo'])){
            if(move_uploaded_file($_FILES['photo']['tmp_name'], $dossier.$data[0].".jpg")){
                echo "<br>.ok";
            }else{
                echo "<br>.pas ok";
            }
        }
        mysqli_close($bdd);

    }else{
        echo ("<br>Je ne suis pas connecté");
    }

    echo "<script type='text/javascript'>document.location.replace('http://localhost/pizzaPhp-CRUD/');</script>";

    ?>

</body>
</html>
