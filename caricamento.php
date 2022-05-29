<?php
    session_start();
    $conn = mysqli_connect("localhost", "root", "", "hw1") or die(mysqli_connect_error());

    $username = $_SESSION["username"];
    $query = "SELECT * from libro where username = '".$username."'";
    $res = mysqli_query($conn, $query);

    $jsonLibri = array();

    while($row = mysqli_fetch_assoc($res)){
        $jsonLibri[] = $row;
    }

    echo json_encode($jsonLibri);
    mysqli_close($conn);
?>