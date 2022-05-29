<?php
session_start();
    if (isset($_POST["username"]) && isset($_POST["password"]) )
    {
        $conn = mysqli_connect("localhost", "root", "", "hw1") or die(mysqli_error($conn));
        
        $username = mysqli_real_escape_string($conn, $_POST['username']);
        $password = mysqli_real_escape_string($conn, $_POST['password']);

        $query = "SELECT id, username, password FROM utenti WHERE username = '".$username."'";

        $res = mysqli_query($conn, $query) or die(mysqli_error($conn));
        if (mysqli_num_rows($res)) {
            $entry = mysqli_fetch_assoc($res);
            if ($_POST['password'] == $entry['password']) 
            {
                $_SESSION["username"] = $entry['username'];
                $_SESSION["user_id"] = $entry['id'];
                header("Location: homepage.php");
                mysqli_close($conn);
                exit;
            }
        }
        $error = "Username e/o password errati.";
    }
    else if (isset($_POST["username"]) || isset($_POST["password"])) {
        $error = "Inserisci username e password.";
    }
?>


<html>
    <head>
        <title>goodreads</title>
        <link rel="stylesheet" href="login.css" />
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;300&display=swap" rel="stylesheet">
        <meta name="viewport" content="width=device-width, initial-scale=1">
    </head>
    <body>
        <main>
            <div id="accedi">
                <a href="home.html" class="titolo">
                    good<strong>reads</strong>
                </a>
                <h3>bentornato!</h3>

                <form name="login" method="post">
                    <?php
                        if (isset($error)) {
                            echo "<div id='errore'>$error</div>";
                        }
                    ?>

                    <label>
                        Username <input type="text" name="username">
                    </label>
                
                    <label>
                        Password <input type="password" name="password">
                    </label>

                    <input id="bottone" type="submit" value="ACCEDI">
                </form>

                <div id="registrati">
                    Non hai ancora un account? <a href="registrazione.php">Registrati</a>
                </div>
                
             </div>
        </main>
    </body>
</html>