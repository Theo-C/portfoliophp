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
        echo($username);
        $request = "SELECT * FROM Users WHERE username=\"$username\"";
        $resultat = $db->query($request);
        $user = $resultat->fetch();

        if(password_verify($password, $user["password"]))
        {
            echo("Vous êtes connectés");

            session_start();
            $_SESSION["account"] = [
                'id' => $user["id"],
                'username' => $user["username"]
            ];

            header('Location: index.php');
        }
        else
        {
            echo("Impossible de se connecter ");
        }
    }

    function create_user($username, $password) {
        global $db;

        if (isset ($_POST['uname'])  && isset($_POST['psw']) ) {
          $name = $_POST['uname'];
          $password = $_PASSWORD['psw'];
          $sql = 'INSERT INTO Users(username, password) VALUES(:username, :password)';
          $statement = $connection->prepare($sql);

              if ($statement->execute([':uname' => $username, ':password' => $password])) {
                $message = 'data inserted successfully';
             }

         }

}
}

class Works {
    function get_works()
    {
        global $db;

        $request = "SELECT * FROM works";
        $resultat = $db->query($request);
        $user = $resultat->fetchAll();

        return($user);
    }

    function create($title, $description)
    {
        global $db;

        $request = $db->prepare('INSERT INTO works (title, description) VALUES (?, ?)');
        $request->execute([$title, $description]);
    }

    function update($title, $description, $id)
    {
        global $db;

        $request = $db->prepare('UPDATE works SET title=?, description=? WHERE id=?');
        $request->execute([$title, $description, $id]);
    }

}
?>
