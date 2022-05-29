<?php
    session_start();
    if(!empty($_POST['nome']) && !empty($_POST["cognome"]) && !empty($_POST["username"]) && !empty($_POST["email"]) 
        && !empty($_POST["password"]) && !empty($_POST["conferma-password"]))
    {
        $error = [];
        $conn = mysqli_connect("localhost", "root", "", "hw1") or die(mysqli_error($conn));

        //username
        if(!preg_match('/^[a-zA-Z0-9_]{1,15}$/', $_POST['username']))
        {
            $error[]= "Username non valido";
        }else{
            $username = mysqli_real_escape_string($conn, $_POST['username']); 
            $query = "SELECT username FROM utenti WHERE username = '".$username."';";
            $res = mysqli_query($conn , $query);
            if(mysqli_num_rows($res) > 0)
            {
                $error[]= "Username già presente";
            }
        }

        //email
        if(!filter_var($_POST['email'], FILTER_VALIDATE_EMAIL))
        {
            $error[]= "Email non valida";
        }else {
            $email = mysqli_real_escape_string($conn, strtolower($_POST['email']));
            $res = mysqli_query($conn, "SELECT email FROM utenti WHERE email = '".$email."';");
            if (mysqli_num_rows($res) > 0) {
                $error[] = "Sei già registrato";
            }
        }

        //password
        if(strlen($_POST['password']) < 8)
        {
            $error[]= "La password non è valida";
        }

        //conferma-password
        if(strcmp($_POST['password'],$_POST['conferma-password']) != 0){
            $error[]= "Le due password non coincidono";
        }

        
        //database
        if(count($error) == 0){
            $username = mysqli_real_escape_string($conn, $_POST['username']);
            $nome = mysqli_real_escape_string($conn, $_POST['nome']);
            $cognome = mysqli_real_escape_string($conn, $_POST['cognome']);
            $email = mysqli_real_escape_string($conn, strtolower($_POST['email']));
            $password = mysqli_real_escape_string($conn, $_POST['password']);

            $query = "INSERT INTO utenti (`nome`,`cognome`,`username`,`email`, `password`) VALUES ('".($nome)."' ,'".($cognome)."' ,'".($username)."', '".($email)."', '".($password)."');";
            $val = mysqli_query($conn , $query) or die(mysqli_error($conn));

            $_SESSION['username'] = $username;
            $_SESSION['user_id'] = mysqli_insert_id($conn);
            mysqli_close($conn);
            header("Location: login.php");
            exit;
        }
        mysqli_close($conn);
        exit;
    }
?>





<html>
    <head>
        <title>goodreads</title>
        <link rel="stylesheet" href="registrazione.css" />
        <script src="registrazione.js" defer></script>
        <link href="https://fonts.googleapis.com/css2?family=Poppins:wght@100;300&display=swap" rel="stylesheet">
        <meta name="viewport" content="width=device-width, initial-scale=1">
    </head>
    <body>
        <main>
            <div id="registrati">
                <a href="home.html" class="titolo">
                    good<strong>reads</strong>
                </a>
                <h3>benvenuto!</h3>

                <form name="registazione" method="post">
                    <section>
                        <div>
                            <label>
                                Nome <input type="text" name="nome">
                                <span id="nome" class="errore"></span>
                            </label>
                            
                            <label>
                                Cognome <input type="text" name="cognome">
                                <span id="cognome" class="errore"></span>
                            </label>
                        </div>

                        <div>
                            <label>
                                Username <input type="text" name="username">
                                <span id="username" class="errore"></span>
                            </label>

                            <label>
                                E-mail <input type="text" name="email">
                                <span id="email" class="errore"></span>
                            </label>
                        </div>

                        <div>
                            <label>
                                Password <input type="password" name="password">
                                <span id="password" class="errore"></span>
                            </label>
                            
                            <label>
                                Conferma password <input type="password" name="conferma-password">
                                <span id="conferma-password" class="errore"></span>
                            </label>
                        </div>
                    </section>

                    <input id="bottone" type="submit" value="REGISTRATI">
                </form>

                <div id="accedi">
                    Hai già un account? <a href="login.php">Accedi</a>
                </div>
                
             </div>
        </main>
    </body>
</html>