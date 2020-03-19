<!DOCTYPE html>
<?php
session_start();
include_once("php/code.php");

$user = new Users;
$work = new Works;
?>
<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>php</title>
</head>
<body>
    <p>Bonjour <?php if(isset($_SESSION["account"]["username"]))
    {
        echo($_SESSION["account"]["username"]);
    }
    else
    {
        echo "NOT CONNECTED ";
        // echo(password_hash("OUI", PASSWORD_DEFAULT));
    }
        ?></p>

    <br>
    <!-- <a href="login.php">Se connecter</a>

    <a href="logout.php">Se deconnecter</a> -->


          <a href="logout.php">
            <?php if(isset($_SESSION["account"]["username"]))
              {
                echo "Se deconnecter";
              }
            ?>
          </a>
          <a href="login.php">
            <?php if(isset($_SESSION["account"]["username"]) == false)
              {
                echo "Se connecter";
              }
            ?>
          </a>









    <?php
        $allworks = $work->get_works();
        foreach($allworks as $w)
        {
            echo($w["title"]);
            echo("|");
            echo($w["description"]);
        }

        ?>
</body>
</html>
