<?php

session_start();
include('includes/header.php');
/*include_once("includes/db.php");*/

/*    if(!isset($_SESSION['username'])){
        header("Location: login.php");
        return;
    }*/
if (!isset($_GET['pid'])) {
    header("Location: blog.php");
}

$pid = $_GET['pid'];

if (isset($_POST['update'])) {

    require_once("nbbc/nbbc.php");

    $bbcode = new BBCode;   //spremeljivka da lepse izpise tekst

    $naslov = strip_tags($_POST['naslov']);
    $besedilo = strip_tags($_POST['besedilo']);

    $naslov = mysqli_real_escape_string($db, $naslov);
    $besedilo = mysqli_real_escape_string($db, $besedilo);

    $besedilo_bb = $bbcode->Parse($besedilo);

    $datum = date('d.m.Y');

    $sql = "UPDATE posts SET naslov='$naslov', besedilo='$besedilo_bb', datum='$datum' WHERE id=$pid";

    if ($naslov == "" || $besedilo == "") {
        echo "Please complete your post!";
        return;
    }
    mysqli_query($db, $sql);

    header("Location: blog.php"); //Preusmeritev po koncanem vpisu
}
?>
<div class="row">

    <div class="box">
        <div class="col-md-3"></div>
        <div class="col-md-6">

<?php
$sql_get = "SELECT * FROM posts WHERE id=$pid LIMIT 1";
$res = mysqli_query($db, $sql_get);

if (mysqli_num_rows($res) > 0) {
    while ($row = mysqli_fetch_assoc($res)) {
        $naslov = $row['naslov'];
        $besedilo = $row['besedilo'];
        $img = $row['img'];




        echo "<form action='edit_post.php?pid=$pid' method='post' enctype='multipart/form-data'>";
        echo "<input placeholder='naslov' name='naslov' type='text' value='$naslov' autofocus size='48'><br /><br />";
        echo "<textarea placeholder='besedilo' name='besedilo' rows='20' cols='50'>$besedilo</textarea><br />";
        echo "<input placeholder='slika' name='img' type='text' value='$img' autofocus size='48'><br /><br />";

    }
}
?>


<input name="update" type="submit" value="Posodobi">
</form>
        </div>
</div>
</div>