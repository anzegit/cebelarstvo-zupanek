<?php

session_start();
include('includes/header.php');
include_once("includes/db.php");

/*if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    return;
}*/

if (isset($_POST['post'])) {
    require_once("nbbc/nbbc.php");

    $bbcode = new BBCode;   //spremeljivka da lepse izpise tekst

    $naslov = strip_tags($_POST['naslov']);
    $besedilo = strip_tags($_POST['besedilo']);
    $img = strip_tags($_POST['img']);

    $naslov = mysqli_real_escape_string($db, $naslov);
    $besedilo = mysqli_real_escape_string($db, $besedilo);
    $img = mysqli_real_escape_string($db, $img);

    $besedilo_bb = $bbcode->Parse($besedilo);


    $datum = date('d.m.Y h:i:s');

    $sql = "INSERT into posts (naslov, besedilo, datum, img) VALUES ('$naslov', '$besedilo_bb', '$datum', '$img')";

    if ($naslov == "" || besedilo_bb == "") {
        echo "Izpolni vsa polja!";
        return;
    }
    mysqli_query($db, $sql);

    header("Location: blog.php"); //Preusmeritev po koncanem vpisu
}
?>



<div class="row">

                <div class="box">
                <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">

            <form action="post.php" method="post" enctype="multipart/form-data">
                <input placeholder="Naslov" name="naslov" type="text" autofocus size="48"><br /><br />
                <textarea placeholder="Vsebina" name="besedilo" rows="10" cols="50"></textarea><br />
                <input placeholder='Slika (ime datoteke)' name='img' type='text' autofocus size='48'><br /><br />";
                <input name="post" type="submit" value="Objavi" >
            </form>
                </div>
                </div>
</div>


<?php
include('includes/footer.php');
?>
