<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="style.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">

    <title> Inscription </title>

</head>
<body>

<?php
session_start();
include_once("php/code.php");

$user = new Users;


if(isset($_POST["save"]))
{
    if($_POST["save"] === "OK")
{
    if($_POST['uname'] != NULL && $_POST['psw'] != NULL && $_POST['confirm_psw'] != NULL && $_POST['psw'] == $_POST['confirm_psw'])
    {
        $user->create_user($_POST["uname"], password_hash($_POST["psw"], PASSWORD_DEFAULT));
        header("Location: /login.php");
    }
    else
    {
        echo("Remplis le formulaire");
    }
}
}

?>

<div class="inscriptionCss">
<form action="sub.php" method="POST">

    <div class="form-group">
        <label>Nom d'utilisateur</label>
        <input type="text" name="uname" placeholder="exemple : Jacques" class="form-control" required>
    </div>

    <div class="form-group">
        <label>Mot de passe</label>
        <input type="password" name="psw" class="form-control" required >
    </div>

    <div class="form-group">
        <label>Confirmation du mot de passe</label>
        <input type="password" name="confirm_psw" class="form-control" required>
    </div>

    <div class="form-group">
    <button type="submit" name="save" value="OK" class="btn btn-primary">S'enregistrer</button>
    </div>

</form>
</div>

</body>
</html>

