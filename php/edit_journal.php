<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <script src="https://kit.fontawesome.com/0bf422052a.js" crossorigin="anonymous"></script>
    <title>Journals - Publish your story</title>
    <link rel="stylesheet" href="../css/style.css" />
    <link rel="stylesheet" href="css/icons.css">
</head>

<body>
    <?php
    	 error_reporting(E_ALL);
         ini_set('display_errors', 1);
       
           // Include the database connection
           require_once "db_connection.php";
            $journalID = $_GET['ID'];
           // Query to fetch blog posts
           $sql = "SELECT title, content FROM journals WHERE ID = '$journalID'";
           $result = $conn->query($sql);


           $journalsArray = $result->fetch_assoc();

    ?>

    <div class="navbar">
        <ul>
            <!-- <li><a href="#">Home</a></li> -->
            <li><a href="../index.php">Journals</a></li>
            <li><a href="account.html">Account</a></li>
        </ul>
    </div>
    
    <div class="card">
        <h2>Edit Journal</h2>
        <h4>Write a story!</h4>
        <br>


        <?php
        if ($_SERVER['REQUEST_METHOD'] === 'POST') {

        error_reporting(E_ALL);
        ini_set('display_errors', 1);
        session_start();
        require "./db_connection.php";
        $journaltitle = $_POST['title'];
        $journalcontent = $_POST['content'];
        $username =   $_SESSION["username"];
        $sql = "UPDATE `journals` SET `title`='$journaltitle',`content`='$journalcontent' WHERE ID = '$journalID'";
        $result = $conn->query($sql);
    
        header('location:../index.php'); 
            }
    ?>

        <form method="post" action="">
            <input type="text" name="title" id="title" value="<?= $journalsArray['title'] ?>">
            <textarea name="content" id="content" cols="90" rows="10"><?= $journalsArray['content'] ?></textarea>
            <div class="buttons">
                <button type="submit"><h4>Update</h4></button>
                <label class="file-input-label" for="file-input"><i class="fas fa-images"></i></label>
                <input type="file" id="file-input" name="file-input" class="file-input">
            </div>
        </form>
    </div>
</body>
</html>