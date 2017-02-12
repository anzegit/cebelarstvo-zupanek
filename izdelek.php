<?php

session_start();
include_once("db.php");

/*if(!isset($_SESSION['username'])){
    header("Location: login.php");
    return;
}*/


$sql = "SELECT * FROM products  ORDER BY id DESC";;

$res = mysqli_query($db, $sql) or die(mysqli_error());

$posts = "";


if (mysqli_num_rows($res) > 0) {
    while ($row = mysqli_fetch_assoc($res)) {
        $id = $row['id'];
        $naziv = $row['naziv'];
        $barva = $row['barva'];
        $aroma = $row['aroma'];
        $okus = $row['okus'];
        $kristalizacija = $row['kristalizacija'];
        $castocenja = $row['castocenja'];
        $uporaba = $row['uporaba'];
        $posebnosti = $row['posebnosti'];
        $cena = $row['cena'];
        $slika = $row['slika'];


        $posts .= "<div><h2><a href='izdelki_vsi.php?pid=$id' target='_blank'>$naziv</a></h2><h3>$barva</h3>$uporaba</div>";


    }
    echo $posts;
} else {
    echo "There are no posts to display!";
}


?>

