<?php
    session_start();
    $conn = mysqli_connect("localhost", "root", "", "hw1") or die(mysqli_connect_error());

    $utente = mysqli_real_escape_string($conn, $_SESSION["username"]);
    $copertina = mysqli_real_escape_string($conn, $_GET["copertina"]);
    $titolo = mysqli_real_escape_string($conn, $_GET["titolo"]);
    $autore = mysqli_real_escape_string($conn, $_GET["autore"]);

    $query = "INSERT INTO libro (username, titolo, autore, immagine) VALUES ('$utente', '$titolo', '$autore', '$copertina')";

    $res = mysqli_query($conn, $query);
    echo 1;

    mysqli_close($conn);
?>