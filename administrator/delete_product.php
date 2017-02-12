<?php
session_start();
include_once("includes/db.php");

/*if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    return;
}*/

if (!isset($_GET['pid'])) {
    header("Location: izdelki.php");
} else {
    $pid = $_GET['pid'];
    $sql = "DELETE FROM products WHERE id=$pid";
    mysqli_query($db, $sql) or die(mysqli_error());
    header("Location: izdelki.php");
}

?>

