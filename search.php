<?php
    $key='AIzaSyBBqrbNaBzTKcoNRrC3rPpdlVHl2LxXeik';

    $query = urlencode($_GET["q"]);
    $url = 'https://www.googleapis.com/books/v1/volumes?q='.$query.'&maxResults=20&key='.$key;

    $ch = curl_init($url);
    curl_setopt($ch, CURLOPT_RETURNTRANSFER, 1);

    $data = curl_exec($ch);
    $json = json_decode($data, true);

    curl_close($ch);
    echo json_encode($json);
?>
