<?php
    error_reporting(E_ALL);
    ini_set('display_errors', 1);

    require "./db_connection.php";
    $journalID = $_GET['ID'];
    $sql = "DELETE FROM journals WHERE ID =  '{$journalID}'";
    $result = $conn->query($sql);

    header('location:../index.php')
?>