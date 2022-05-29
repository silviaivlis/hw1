<?php
    session_start();
    $conn = mysqli_connect("localhost", "root", "", "hw1") or die(mysqli_connect_error());

    $username = $_SESSION["username"];
    $testo = mysqli_real_escape_string($conn, $_GET["q"]);
    $query = "DELETE from recensione where username = '".$username."' AND testo = '".$testo."'";
    mysqli_query($conn, $query);

    mysqli_close($conn);
?>