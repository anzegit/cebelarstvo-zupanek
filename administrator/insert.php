<?php

session_start();
include('includes/header.php');
include_once('includes/db.php');

/*    if(!isset($_SESSION['username'])){
        header("Location: login.php");
        return;
    }*/

if (isset($_POST['post'])) {
    $pakiranje = strip_tags($_POST['pakiranje']);
    $naziv = strip_tags($_POST['naziv']);
    $barva = strip_tags($_POST['barva']);
    $aroma = strip_tags($_POST['aroma']);
    $okus = strip_tags($_POST['okus']);
    $kristalizacija = strip_tags($_POST['kristalizacija']);
    $castocenja = strip_tags($_POST['castocenja']);
    $uporaba = strip_tags($_POST['uporaba']);
    $posebnosti = strip_tags($_POST['posebnosti']);
    $cena = strip_tags($_POST['cena']);
    $slika = strip_tags($_POST['slika']);


    $pakiranje = mysqli_real_escape_string($db, $pakiranje);
    $naziv = mysqli_real_escape_string($db, $naziv);
    $barva = mysqli_real_escape_string($db, $barva);
    $aroma = mysqli_real_escape_string($db, $aroma);
    $okus = mysqli_real_escape_string($db, $okus);
    $kristalizacija = mysqli_real_escape_string($db, $kristalizacija);
    $castocenja = mysqli_real_escape_string($db, $castocenja);
    $uporaba = mysqli_real_escape_string($db, $uporaba);
    $posebnosti = mysqli_real_escape_string($db, $posebnosti);
    $slika = mysqli_real_escape_string($db, $slika);


    //$user = $_SESSION['username'];

    $created = date('d.m.Y h:i:s');
    $modified = date('d.m.Y h:i:s');

    $sql = "INSERT into products (pakiranje, naziv, barva, aroma, okus, kristalizacija, castocenja, uporaba, posebnosti, cena, slika) 
            VALUES ('$pakiranje','$naziv', '$barva', '$aroma', '$okus','$kristalizacija', '$castocenja', '$uporaba', '$posebnosti','$cena', '$slika')";
    /*if($title == "" || $content == ""){
        echo "Please complete your post!";
        return;
    }*/

    mysqli_query($db, $sql);

    header("Location: index.php"); //Preusmeritev po koncanem vpisu
}
?>