<!DOCTYPE html>
<?php
session_start();
include_once("php/code.php");

$user = new Users;
if(isset($_SESSION["account"]["id"]))
{
    header('Location: /demophp/index.php');
}
if(isset($_POST["submit"]))
{
    if($_POST["submit"] === "OK")
{
    if($_POST['uname'] != NULL && $_POST['psw'] != NULL)
    {
        $user->connect($_POST["uname"], $_POST["psw"]);
    }
    else
    {
        echo("Remplis le formulaire");
    }
}
}

function validateMember()
{
    $valid = true;
    $errorMessage = array();
    foreach ($_POST as $key => $value) {
        if (empty($_POST[$key])) {
            $valid = false;
        }
    }
    
    if($valid == true) {
        if ($_POST['password'] != $_POST['confirm_password']) {
            $errorMessage[] = 'Passwords should be same.';
            $valid = false;
        }
          
    }

    else {
        $errorMessage[] = "All fields are required.";
    }
    
    if ($valid == false) {
        return $errorMessage;
    }
    return;
}
?>

<html>
<head>
<title>Inscription</title>
</head>
<body>
    <form name="frmRegistration" method="post" action="">
        <div class="demo-table">
        <div class="form-head"><b>S'inscrire</b></div>
        <br>    
            
<?php
    if (! empty($errorMessage) && is_array($errorMessage)) {
?>  
            <div class="error-message">
            <?php 
                foreach($errorMessage as $message) {
                    echo $message . "<br/>";
                }
            ?>
            </div>
<?php
}
?>
            <div class="field-column">
                <label>Username</label>
                <div>
                    <input type="text" class="demo-input-box"
                        name="uname"
                        value="<?php if(isset($_POST['uname'])) echo $_POST['uname']; ?>">
                </div>
            </div>
            <br>
            
            <div class="field-column">
                <label>Password</label>
                <div><input type="password" class="demo-input-box"
                    name="psw" value=""></div>
            </div>
             <div class="field-column">
                <label>Confirm Password</label>
                <div>
                    <input type="password" class="demo-input-box"
                        name="confirm_password" value="">
                </div>
            <br>
            <div class="field-column">
                <div>
                    <input type="submit"
                        name="register-user" value="Register"
                        class="btnRegister">



