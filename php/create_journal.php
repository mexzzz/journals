<?php
    error_reporting(E_ALL);
    ini_set('display_errors', 1);
    session_start();
    require "./db_connection.php";
    $journaltitle = $_POST['title'];
    $journalcontent = $_POST['content'];
    $username =   $_SESSION["username"];
    $sql = "INSERT INTO journals(`title`, `content`,`username` ) VALUES ('$journaltitle','$journalcontent','$username')";
    $result = $conn->query($sql);

    header('location:../index.php')
?>