<!DOCTYPE html>



<html lang="fr">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" type="text/css" href="style.css">
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
    <title> Page d'accueil </title>
</head>
<body>

<?php
session_start();

// Include lib
include_once("php/code.php");

// Instantiating "singletons"

$works = new Works;

// Check if a work must be deleted
// NOTE : The user must be logged in

if(isset($_SESSION["account"]["username"])) {
	if(isset($_POST["delete"]))
	{
	    if($_POST["delete"] === "OK")
		{
	       $works->delete_works($_POST['id']);
	    }
	}
}
?>	

<section class="container sectionOne">

	<div class="header">
		<div class="helloAcc">
		    <?php if(isset($_SESSION["account"]["username"]))
		    {
		    	echo("Bonjour, ");
		        echo($_SESSION["account"]["username"]);
		    }
		    else
		    {
		        echo "Désolé vous n'êtes pas connecté...";
		        // echo(password_hash("OUI", PASSWORD_DEFAULT));
		    }
		    ?>
	    </div>

	    <div class="logInOut">
			<a href="logout.php">
			<?php if(isset($_SESSION["account"]["username"]))
			  {
			?>
			    <button class="btn btn-light"><?php echo("Se deconnecter"); ?></button>
			<?php  
			  }
			?>
			</a>

			<a href="login.php">
			<?php 
				if(isset($_SESSION["account"]["username"]) == false)
				{ 
			?>
				
				<button class="btn btn-primary"> <?php echo("Se connecter"); ?> </button> 
			
			<?php
				}
			?>
			</a>
		</div>
	</div>

	<br>

</section>

<section class="container sectionTwo">
	<table class="table table-striped table-hover">
		
		<thead class="thead-dark">
			<tr>
				<th scope="col">#</th>
				<th scope="col">Titre</th>
				<th scope="col">Description</th>
				<th scope="col">Options</th>

			</tr>
		</thead>
	
		<tbody>	
			<?php
			$allworks = $works->get_works();
			foreach($allworks as $w)
			{ 
			?>
			

			<form action="index.php" method="post">
				<input type="hidden" name="id" value="<?php echo $w['id']; ?>">
				<tr>
					<th scope="row"> 
						<?php

						echo $w['id']; 
						
						?> 
					</th>

					<td>
						<strong><?php echo($w["title"]); ?></strong>
					</td>

					<td>
						<?php echo($w["description"]); ?>
					</td>

					<td>

						<a href="editProjet.php?id=<?php echo $w['id']; ?>" class="btn btn-dark">Edit</a>

						
						<button type="submit" name="delete" value="OK" class="btn btn-danger">
							Delete
						</button>

					</td>



				</tr>
			</form>

			<?php
			}
			?>

		</tbody>

	</table>
</section>


<section class="container sectionThree">
	
<div class="addProject">
	<form action="ajoutProjet.php">
		<button class="btn btn-success">
		
		<?php if(isset($_SESSION["account"]["username"]))
			{
			echo "Ajouter un projet";
			}
		?>
		
		</button>
	</form>
</div>

</section>

</body>
</html>