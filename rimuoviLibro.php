<?php
    session_start();
    $conn = mysqli_connect("localhost", "root", "", "hw1") or die(mysqli_connect_error());

    $username = $_SESSION["username"];
    $titolo = mysqli_real_escape_string($conn, $_GET["q"]);
    $query = "DELETE from libro where username = '".$username."' AND titolo = '".$titolo."'";
    mysqli_query($conn, $query);

    mysqli_close($conn);
?>
