<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8" />
    <meta http-equiv="X-UA-Compatible" content="IE=edge" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <script src="https://kit.fontawesome.com/0bf422052a.js" crossorigin="anonymous"></script>
    <title>Journals - Publish your story</title>
    <link rel="stylesheet" href="./css/style.css" />
    <link rel="stylesheet" href="css/icons.css">
</head>

<body>

<?php
  error_reporting(E_ALL);
  ini_set('display_errors', 1);

    // Include the database connection
    require_once "./php/db_connection.php";

    // Query to fetch blog posts
    $sql = "SELECT j.ID, j.title, j.username, u.username, u.avatar FROM journals j LEFT JOIN users u ON j.username = u.username";
    $result = $conn->query($sql);


    $journalsArray = array();

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        // Add each row to the array
        $journalsArray[] = $row;
    }
} else {
    // echo "No journals found.";
}
  ?>

    <div class="navbar">
        <ul>
            <!-- <li><a href="#">Home</a></li> -->
            <li><a href="#">Journals</a></li>
            <li><a href="pages/account.html">Account</a></li>
        </ul>
    </div>

    <article class="card">
        <header>
            <div>
                <h2 class='typewriter'></h2>
                <h4>Explore other journals</h4>
            </div>
            <div class="buttons">
                <button class="active" onclick="selectList(this, 0)">Month</button>
                <button onclick="selectList(this, 1)">Week</button>
                <button onclick=""><a href="./pages/journal.html"><i class="fa-solid fa-plus"></i></a></button>
            </div>
        </header>
        <div class="tables">
            <div class="card-container">
                <table class="active">
                    <tbody class="active">
                      <?php 
                        foreach ($journalsArray as $journal) {
                          ?>
                        
                      
                        <tr>
                            <td class="td-1">
                                <img class="avatar" src="images/<?= $journal['avatar'] ?>" />
                            </td>
                            <td class="td-2">
                                <h3><?= $journal['title'] ?></h3>
                                <h4><?= $journal['username'] ?></h4>
                            </td>
                            <td class="td-3">
                                <h4>Rating</h4>
                                <div class="stars">
                                    <img src="images/star-1.svg" />
                                    <img src="images/star-1.svg" />
                                    <img src="images/star-1.svg" />
                                    <img src="images/star-1.svg" />
                                    <img src="images/star-0.svg" />
                                </div>
                            </td>
                            <td>
                              <div class="inline-i">
                                <a href="/journals/php/view_journal.php?ID=<?= $journal['ID']?>" class=""><i class="fa-solid fa-eye"></i></a>
                                <a href="/journals/php/delete.php?ID=<?= $journal['ID']?>" class=""><i class="fa-solid fa-trash"></i></a>
                                <a href="/journals/php/edit_journal.php?ID=<?= $journal['ID']?>" class=""><i class="fa-solid fa-marker"></i></a>
                              </div>
                            </td>
                        </tr>
                      <?php
                      }
                        ?>
                    </tbody>
                </div>
            </table>
            <table>
                <tbody class="active">
                </tbody>
            </table>
            <table>
                <tbody class="active">
                </tbody>
            </table>
        </div>
    </article>
    <script src="./js/script.js"></script>
</body>

</html>