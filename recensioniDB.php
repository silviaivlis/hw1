<?php
    session_start();
    $conn = mysqli_connect("localhost", "root", "", "hw1") or die(mysqli_error($conn));
    
    $query = "SELECT * FROM recensione";
    $res = mysqli_query($conn, $query) or die(mysqli_error($conn));

    $jsonRecensioni = array();

    while($row = mysqli_fetch_assoc($res)){
        $jsonRecensioni[] = $row;
    }

    echo json_encode($jsonRecensioni);
    mysqli_close($conn);

?>