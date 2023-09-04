<?php
    error_reporting(E_ALL);
    ini_set('display_errors', 1);
    session_start();
    require "./db_connection.php";
    $journaltitle = $_POST['title'];
    $journalcontent = $_POST['content'];
    $username =   $_SESSION["username"];


    $targetDir = '../images/';

    if (isset($_POST['submit'])) {
        

        if (!empty($_FILES['file']['name'])) {
            $photoFile = $_FILES['file'];

            $photoName = $_FILES['file']['name'];
            $photoTmpName = $_FILES['file']['tmp_name'];
            $photoType = $_FILES['file']['type'];

            $targetPath = $targetDir . $photoName;

            if (move_uploaded_file($photoTmpName, $targetPath)) {
                
            } else {
                echo "error";
            }

        }
$sql = "INSERT INTO journals(`title`, `content`,`username`,`img` ) VALUES ('$journaltitle','$journalcontent','$username', '$photoName')";
        $result = $conn->query($sql);
        
    
        header('location:../index.php');
    }
?>