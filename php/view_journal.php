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
           $sql = "SELECT title, content, img FROM journals WHERE ID = '$journalID'";
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

        <form>
            <input type="text" disabled name="title" id="title" value="<?= $journalsArray['title'] ?>">
            <textarea name="content" disabled id="content" cols="90" rows="10"><?= $journalsArray['content'] ?></textarea>
            <div id="image-preview"><img src="../images/<?= $journalsArray['img']; ?>" alt=""></div>
        </form>
    </div>
</body>
</html>