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

    <form enctype="multipart/form-data" action="_URL_" method="post">
      <!-- MAX_FILE_SIZE doit précéder le champ input de type file -->
      <input type="hidden" name="MAX_FILE_SIZE" value="30000" />
      <!-- Le nom de l'élément input détermine le nom dans le tableau $_FILES -->
      Envoyez ce fichier : <input name="userfile" type="file" />
      <input type="submit" value="Envoyer le fichier" />
    </form>
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
