<!DOCTYPE html>
<html lang="en" dir="ltr">
  <head>
    <meta charset="utf-8">
    <title></title>
  </head>
  <body>

  	<?php
session_start();
include_once("php/code.php");

$work = new Works;

if(isset($_POST["submit"]))
{
    if($_POST["submit"] === "OK")
{
    if($_POST['title'] != NULL && $_POST['desc'] != NULL)
    {
        $work->create_works($_POST["title"], ($_POST["desc"]));
        header("Location: /index.php");
    }
    else
    {
        echo("Remplis le formulaire");
    }
}
}

?>

    <form action=".php" method="post">

    <div class="container">
        <label for="title"><b>titre</b></label>
        <input type="text" placeholder="Enter title" name="title" required>

        <label for="desc"><b>Description</b></label>
        <input type="text" placeholder="Enter description" name="desc" required>

        <button type="submit" name="submit" value="OK">Ajouter</button>
    </div>
    </form>

  </body>
</html>
