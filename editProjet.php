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

$works = new Works;
$workId = array_key_exists("id", $_GET) ? $_GET["id"] : $_POST["id"]; 
$work = $works->get_work($workId);

if(isset($_POST["submit"]))
{
    if($_POST["submit"] === "OK")
    {
      if($_POST['id'] != NULL && $_POST['title'] != NULL && $_POST['description'] != NULL)
      {
          $works->update_works($_POST["id"], $_POST["title"], $_POST["description"]);
          header("Location: index.php");
      }
    }
}

?>

    <form action="editProjet.php" method="post">

    <div class="container">
        <input type="hidden" name="id" value="<?php echo $work["id"] ?>">
        <label for="title"><b>Titre</b></label>
        <input type="text" placeholder="Enter title" name="title" value="<?php echo $work["title"] ?>" required>

        <label for="desc"><b>Description</b></label>
        <textarea name="description" placeholder="Enter description" required>
          <?php echo $work["description"] ?>
        </textarea>

        <button type="submit" name="submit" value="OK">Mettre à jour</button>
    </div>
    </form>

  </body>
</html>
