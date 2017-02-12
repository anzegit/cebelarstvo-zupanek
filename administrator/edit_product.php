<?php

session_start();
include('includes/header.php');
/*include_once("includes/db.php");*/

/*    if(!isset($_SESSION['username'])){
        header("Location: login.php");
        return;
    }*/
if (!isset($_GET['pid'])) {
    header("Location: izdelki.php");
}

$pid = $_GET['pid'];
if (isset($_POST['update'])) {
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

    $sql = "UPDATE products SET pakiranje='$pakiranje', naziv='$naziv', barva='$barva', aroma='$aroma', okus='$okus', 
          kristalizacija='$kristalizacija', castocenja='$castocenja', uporaba='$uporaba', posebnosti='$posebnosti', cena='$cena', slika='$slika'
           WHERE id=$pid";

    if($naziv == "" || $cena == "") {
        echo "Dopolni manjkajoce podatke!";
        return;
    }

    mysqli_query($db, $sql) or die(mysqli_error());

    header("Location: izdelki.php"); //Preusmeritev po koncanem vpisu
}
?>
<div class="row">

    <div class="box">

<?php
require_once("nbbc/nbbc.php");

$bbcode = new BBCode;   //spremeljivka da lepse izpise tekst

$sql_get = "SELECT * FROM products WHERE id=$pid LIMIT 1";
$res = mysqli_query($db, $sql_get);

if (mysqli_num_rows($res) > 0) {
while ($row = mysqli_fetch_assoc($res)) {

    $pakiranje = $row['pakiranje'];
    $naziv = $row['naziv'];
    $barva = $row['barva'];
    $aroma = $row['aroma'];
    $okus = $row['okus'];
    $kristalizacija = $row['kristalizacija'];
    $castocenja = $row['castocenja'];
    $uporaba = $row['uporaba'];
    $uporaba_bb = $bbcode->Parse($uporaba);

    $posebnosti = $row['posebnosti'];
    $posebnosti_bb = $bbcode->Parse($posebnosti);
    $cena = $row['cena'];
    $slika = $row['slika'];

    echo "<div class='col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1'>

            <form action='edit_product.php?pid=$pid' method='post' enctype='multipart/form-data'>
                <table>
                    <tr>
                        <td>Pakiranje:</td>
                        <td>
                        <label class='radio-inline'>
                            <input type='radio' name='pakiranje' id='inlineRadio1' value='1' required='required'> 900g
                        </label>
                        <label class='radio-inline'>
                            <input type='radio' name='pakiranje' id='inlineRadio2' value='2' required='required'> 450g
                        </label>
                        <label class='radio-inline'>
                            <input type='radio' name='pakiranje' id='inlineRadio3' value='3' required='required'> Komplet
                        </label>
                        </td>
                    </tr>
                    <tr>
                        <td>Naziv izdelka: </td>
                        </td>
                        <td><input placeholder='naziv' name='naziv' type='text' value='$naziv' autofocus size='48'><br /></td>
                    </tr>
                    <tr>
                        <td>Barva: </td>
                        <td><input placeholder='barva' name='barva' type='text' value='$barva' autofocus size='48'><br/></td>
                    </tr>
                    <tr>
                        <td>Aroma: </td>
                        <td><input placeholder='aroma' name='aroma' type='text' value='$aroma' autofocus size='48'><br/></td>
                    </tr>
                    <tr>
                        <td>Okus: </td>
                        <td><input placeholder='okus' name='okus' type='text' value='$okus' autofocus size='48'><br/></td>
                    </tr>
                    <tr>
                        <td>Kristalizacija: </td>
                        <td><input placeholder='kristalizacija' name='kristalizacija' type='text' value='$kristalizacija' autofocus size='48'><br/></td>
                    </tr>
                    <tr>
                        <td>Čas točenja: </td>
                        <td><input placeholder='castocenja' name='castocenja' type='text' value='$castocenja' autofocus size='48'><br/></td>
                    </tr>
                    <tr>
                        <td>Uporaba: </td>
                        <td><textarea placeholder='uporaba' name='uporaba' rows='10' cols='48'>$uporaba_bb</textarea></td>
                    </tr>
                    <tr>
                        <td>Posebnosti: </td>
                        <td><textarea placeholder='posebnosti' name='posebnosti' rows='10' cols='48'>$posebnosti_bb</textarea></td>
                    </tr>
                    <tr>
                        <td>Cena: </td>
                        <td><input placeholder='cena' name='cena' type='text' value='$cena' autofocus size='48'><br/></td>
                    </tr>
                    <tr>
                        <td>Slika: </td>
                        <td><input placeholder='slika' name='slika' type='text' id='exampleInputFile' value='$slika' autofocus size='48'><br/></td>
                    </tr>
                </table>
                   <input name='update' type='submit' class='btn-success delete'  value='Posodobi'>
            </form>
        </div>";
    }
    }
    ?>




</form>
</div>
</div>
</div>