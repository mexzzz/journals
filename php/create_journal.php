<?php
    error_reporting(E_ALL);
    ini_set('display_errors', 1);
    session_start();
    require "./db_connection.php";
    $journaltitle = $_POST['title'];
    $journalcontent = $_POST['content'];
    $username =   $_SESSION["username"];
    $img = $_POST['img'];
    $sql = "INSERT INTO journals(`title`, `content`,`username`,`img` ) VALUES ('$journaltitle','$journalcontent','$username', '$img')";
    $result = $conn->query($sql);

    header('location:../index.php')
?>