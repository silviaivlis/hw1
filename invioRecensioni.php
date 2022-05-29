<?php
    session_start();

    if(isset($_POST['titolo']) && isset($_POST['autore']) && isset($_POST['commento'])){

        $conn = mysqli_connect("localhost", "root", "", "hw1") or die(mysqli_error($conn));
        
        $username = mysqli_real_escape_string($conn, $_SESSION['username']);
        $titolo = mysqli_real_escape_string($conn, $_POST['titolo']);
        $autore = mysqli_real_escape_string($conn, $_POST['autore']);
        $commento = mysqli_real_escape_string($conn, $_POST['commento']);

        $query = "INSERT INTO recensione (username, titolo, autore, testo) VALUES ('".$username."', '".$titolo."', '".$autore."', '".$commento."')";
        $res = mysqli_query($conn, $query)  or die(mysqli_error($conn));

        if($res){
            header("Location: recensioni.php");
        }

        mysqli_close($conn);
    }
?>