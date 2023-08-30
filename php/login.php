<?php
 error_reporting(E_ALL);
 ini_set('display_errors', 1);

   // Include the database connection
   require_once "../php/db_connection.php";

// Handle login form submission
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST["username"];
    $password = $_POST["password"];

    // Fetch user from the database
    $sql = "SELECT * FROM users WHERE username = '$username'";
    $result = mysqli_query($conn, $sql);
    $user = mysqli_fetch_assoc($result);

    // Verify password
    if ($user["password"] == $password && $user["username"] == $username) {
        // Successful login
        session_start();
        $_SESSION["username"] = $username;
        header("Location: ../index.php"); // Redirect to dashboard or desired page
        exit();
    } else {
        // Invalid login
        $error_message = "Invalid username or password";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <head>
        <meta charset="UTF-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        <script src="https://kit.fontawesome.com/0bf422052a.js" crossorigin="anonymous"></script>
        <title>Journals - Publish your story</title>
        <link rel="stylesheet" href="../css/style.css" />
        <link rel="stylesheet" href="../css/icons.css">
    </head>
</head>
<body>
    <div class="login-container">
        <div class="login-card">
            <h2>Login</h2>
            <form method="post">
                <input type="text" name="username" class="login-input" placeholder="Username">
                <input type="password" name="password" class="login-input" placeholder="Password">
                <button type="submit" class="login-button">Login</button>
            </form>
            <?php if(isset($error_message)) { echo "<p>$error_message</p>"; } ?>
        </div>
    </div>
</body>
</html>
