<?php
require("database.php");

class Users {
    function get_user($id)
    {
        global $db;

        $request = "SELECT * FROM Users WHERE id=$id";
        $resultat = $db->query($request);
        $user = $resultat->fetch();

        return($user);
    }

    function connect($username, $password)
    {
        global $db;
        
        $request = "SELECT * FROM Users WHERE username=\"$username\"";
        $resultat = $db->query($request);
        $user = $resultat->fetch();


        if(password_verify($password, $user["password"]))
        {
            session_start();
            $_SESSION["account"] = [
                'id' => $user["id"],
                'username' => $user["username"]
            ];

            header('Location: /');
        }
        else
        {
            echo("Impossible de se connecter");
        }
    }

    function create_user($username, $password) {
        global $db;

        if (isset ($_POST['uname'])  && isset($_POST['psw']) && $_POST["confirm_psw"]) {
		    $username = $_POST['uname'];
		    $password = password_hash($_POST["psw"], PASSWORD_DEFAULT);
		    $request = $db->prepare('INSERT INTO Users(username, password) VALUES(:username, :password)');
			if($request->execute([':username' => $username, ':password' => $password])){
				$message = 'Données bien envoyées';
			}
         }
	}

}

class Works {

    function get_works()
    {
        global $db;
        $request = $db->query("SELECT * FROM Works");
        $works = $request->fetchAll();
        return($works);
    }

    function get_work($id)
    {
        global $db;
        $request = $db->prepare('SELECT * FROM Works WHERE id=:id');
        $request->execute([
        	':id' => $id,
        ]);
        $work = $request->fetch(PDO::FETCH_ASSOC);
        return($work);
    }

    function create_works($title, $description)
    {
        global $db;
        $request = $db->prepare('INSERT INTO Works (title, description) VALUES (:title, :description)');
        $request->execute([
        	':title' => $title,
        	':description' => $description
        ]);
    }

    function update_works($id, $title, $description)
    {
        global $db;
        $request = $db->prepare('UPDATE Works SET title=:title, description=:description WHERE id=:id');
        $request->execute([
        	':title' => $title,
        	':description' => $description,
        	':id' => $id
        ]);
    }

    function delete_works($id)
    {
    	global $db;
    	
           	$request = $db->prepare('DELETE FROM Works WHERE id = :id');
        	$request->execute([':id' => $id]);

    }

}

?>