<!DOCTYPE html>
<html>
<head>
    <title></title>
</head>
<body>

<?php
session_start();
include_once("php/code.php");

$user = new Users;

if(isset($_POST["submit"]))
{
    if($_POST["submit"] === "OK")
{
    if($_POST['uname'] != NULL && $_POST['psw'] != NULL && $_POST['confirm_psw'] != NULL && $_POST['psw'] == $_POST['confirm_psw'])
    {
        $user->create_user($_POST["uname"], password_hash($_POST["psw"], PASSWORD_DEFAULT));
        header("Location: login.php");
    }
    else
    {
        echo("Remplis le formulaire");
    }
}
}

?>
<form action="sub.php" method="post">
<div class="field-column">
    <label for="username">Nom d'utilisateur</label>
    <div>
        <input type="text" class="demo-input-box"
            name="uname" required>
    </div>
</div>

    <br>

<div class="field-column">
    <label for="psw">Mot de passe</label>

    <div>
        <input type="password" class="demo-input-box"
        name="psw" required >
    </div>
</div>

<div class="field-column">
    <label for="confirm_psw">Confirmation du mot de passe</label>

        <div>
            <input type="password" class="demo-input-box"
                name="confirm_psw" required>
        </div>
    <br>

    <div class="field-column">
        <div>
            <button type="submit" name="submit" value="OK"> S'enregistrer</button> 
        </div>
    </div>
</div>
</form>

</body>
</html>


