<?php

session_start();
include("includes/db.php");

/*    if(!isset($_SESSION['admin']) && $_SESSION['admin'] != 1) {
        header("Location: login.php");
        return;
    }*/

?>
<!DOCTYPE html>
<html>
<head>
    <naslov>Blog</naslov>
</head>

<body>
<?php
require_once("nbbc/nbbc.php");

$bbcode = new BBCode;

$sql = "SELECT * FROM posts ORDER BY id DESC limit 1";

$res = mysqli_query($db, $sql) or die(mysqli_error());

$posts = "";

if (mysqli_num_rows($res) > 0) {
    while ($row = mysqli_fetch_assoc($res)) {
        $id = $row['id'];
        $naslov = $row['naslov'];
        $datum = $row['datum'];
        $besedilo = $row['besedilo'];




        $output = $bbcode->Parse($besedilo);

        $posts .= "<div><h2><a href='view_post.php?pid=$id' target='_blank'>$naslov</a></h2><h3>$datum</h3>$output</div>";


    }
    echo $posts;
} else {
    echo "There are no posts to display!";
}


?>

</body>

</html>