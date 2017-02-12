<?php

session_start();
include('includes/header.php');
include("includes/db.php");
?>


<div class="row">

    <div class="box">
        <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">

            <form action="edit_product.php" method="post" enctype="multipart/form-data">
                <table>
                    <tr>
                        <td>Pakiranje:</td>
                        <td>
                        <label class="radio-inline">
                            <input type="radio" name="pakiranje" id="inlineRadio1" value="1"> 900g
                        </label>
                        <label class="radio-inline">
                            <input type="radio" name="pakiranje" id="inlineRadio2" value="2"> 450g
                        </label>
                        <label class="radio-inline">
                            <input type="radio" name="pakiranje" id="inlineRadio3" value="3"> Komplet
                        </label>
                        </td>
                    </tr>
                    <tr>
                        <td>Naziv izdelka:</td>
                        </td>
                        <td><input name="naziv" type="text" autofocus size="48"><br/></td>
                    </tr>
                    <tr>
                        <td>Barva:</td>
                        <td><input name="barva" type="text" autofocus size="48"><br/></td>
                    </tr>
                    <tr>
                        <td>Aroma:</td>
                        <td><input name="aroma" type="text" autofocus size="48"><br/></td>
                    </tr>
                    <tr>
                        <td>Okus:</td>
                        <td><input name="okus" type="text" autofocus size="48"><br/></td>
                    </tr>
                    <tr>
                        <td>Kristalizacija:</td>
                        <td><input name="kristalizacija" type="text" autofocus size="48"><br/></td>
                    </tr>
                    <tr>
                        <td>Čas točenja:</td>
                        <td><input name="castocenja" type="text" autofocus size="48"><br/></td>
                    </tr>
                    <tr>
                        <td>Uporaba:</td>
                        <td><textarea name="uporaba" rows="10" cols="48"></textarea></td>
                    </tr>
                    <tr>
                        <td>Posebnosti:</td>
                        <td><textarea name="posebnosti" rows="10" cols="48"></textarea></td>
                    </tr>
                    <tr>
                        <td>Cena:</td>
                        <td><input name="cena" type="text" autofocus size="48"><br/></td>
                    </tr>
                    <tr>
                        <td>Slika:</td>
                        <td><input name="slika" type="text" id="exampleInputFile" autofocus size="48"><br/></td>
                    </tr>
                </table>
                <input name="post" type="submit" value="Vnesi">
            </form>
        </div>
    </div>
</div>
<?php
include('includes/footer.php');
?>
