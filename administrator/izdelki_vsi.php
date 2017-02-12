<?php

$page_title = "Čebelarstvo Zupanek";
include('includes/header.php');

if (!isset($_GET['pid'])) {
    header("Location: izdelki_vsi.php?pid=8");}
else {
    $pid = $_GET['pid'];}
?>
<style>
    .table {
        width: 100%;
        max-width: 80%;
        margin-bottom: 20px;
        font-size: 1.25em;
        text-align: justify;
</style>
<!-- Page Content -->

<div class="container">

    <div class="row">
        <div class="box">

            <div class="col-md-3">
                <p class="lead">Izdelki</p>
                <div class="list-group">
                    <?php
                    //get rows query
                    $query = $db->query("SELECT * FROM products ORDER BY pakiranje DESC LIMIT 10");
                    if ($query->num_rows > 0) {
                        while ($row = $query->fetch_assoc()) {
                            $id = $row['id'];
                            $pakiranje = $row['pakiranje'];
                            $naziv = $row['naziv'];
                            $barva = $row['barva'];
                            /*$aroma = $row['aroma'];
                            $okus = $row['okus'];
                            $kristalizacija = $row['kristalizacija'];
                            $castocenja = $row['castocenja'];
                            $uporaba = $row['uporaba'];
                            $posebnosti = $row['posebnosti'];
                            $cena = $row['cena'];
                            $slika = $row['slika'];*/

                            echo "
                    <a href='izdelki_vsi.php?pid=$id' class='list-group-item'>$naziv</a>
                                                ";

                        }
                    } ?>


                </div>


            </div>

            <div class="col-md-9">
                <?php
                require_once("nbbc/nbbc.php");

                $bbcode = new BBCode;   //spremeljivka da lepse izpise tekst


                $query = $db->query("SELECT * FROM products WHERE id=$pid LIMIT 1");
                if ($query->num_rows > 0) {
                while ($row = $query->fetch_assoc()) {
                    $id = $row['id'];
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

                    echo "
                <div class='thumbnail'>
                    <img class='img-responsive' src='img/honey_sample.jpg' alt=''>
                    <div class='caption-full'>
                        <h4 class='pull-right'>$cena €</h4>
                        <h4>$naziv</h4><br>
                        
                        <div class=\"table-responsive\">
                              <table class=\"table\">
                                <tr>
                                    <td>Barva</td>
                                    <td>$barva</td>
                                  </tr>
                                  <tr>
                                    <td>Aroma</td>
                                    <td>$aroma</td>
                                  </tr>
                                  <tr>
                                    <td>Okus</td>
                                    <td>$okus</td>
                                  </tr>
                                  <tr>
                                    <td>Kristalizacija</td>
                                    <td>$kristalizacija</td>
                                  </tr>
                                  <tr>
                                    <td>Čas točenja</td>
                                    <td>$castocenja</td>
                                  </tr>
                                  <tr>
                                    <td>Uporaba</td>
                                    <td>$uporaba_bb</td>
                                  </tr>
                                   <tr>
                                    <td>Posebnosti</td>
                                    <td>$posebnosti_bb</td>
                                  </tr>
                              </table>
                         </div>
                         
                          <div class='col-md-3'></div>                    
                          <div class='col-md-3'>
                                    <a class='btn btn-danger delete'
                                       href='delete_product.php?pid=$id'>Zbriši</a>
                                </div>
                          <div class='col-md-3'>
                                    <a class='btn btn-success'
                                       href='edit_product.php?pid=$id'>Uredi</a>
                                </div>
                                
                        
                        
                        <!--<p>See more snippets like these online store reviews at <a target='_blank' href='http://bootsnipp.com'>Bootsnipp - http://bootsnipp.com</a>.</p>
                        <p>Want to make these reviews work? Check out
                            <strong><a href='http://maxoffsky.com/code-blog/laravel-shop-tutorial-1-building-a-review-system/'>this building a review system tutorial</a>
                            </strong>over at maxoffsky.com!</p>
                        <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut aliquip ex ea commodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit esse cillum dolore eu fugiat nulla pariatur. Excepteur sint occaecat cupidatat non proident, sunt in culpa qui officia deserunt mollit anim id est laborum</p>
                    --></div>
                    <!--<div class='ratings'>
                        <p class='pull-right'>3 mnenja</p>
                        <p>
                            <span class='glyphicon glyphicon-star'></span>
                            <span class='glyphicon glyphicon-star'></span>
                            <span class='glyphicon glyphicon-star'></span>
                            <span class='glyphicon glyphicon-star'></span>
                            <span class='glyphicon glyphicon-star-empty'></span>
                            4.0 stars
                        </p>
                    </div>-->
                </div>
                ";
                }}
?>

<!--                <div class="well">

                    <div class="text-right">
                        <a class="btn btn-success">Leave a Review</a>
                    </div>

                    <hr>
-->
<!--                    <div class="row">
                        <div class="col-md-12">
                            <span class="glyphicon glyphicon-star"></span>
                            <span class="glyphicon glyphicon-star"></span>
                            <span class="glyphicon glyphicon-star"></span>
                            <span class="glyphicon glyphicon-star"></span>
                            <span class="glyphicon glyphicon-star-empty"></span>
                            Anonymous
                            <span class="pull-right">10 days ago</span>
                            <p>This product was great in terms of quality. I would definitely buy another!</p>
                        </div>
                    </div>

                    <hr>

                    <div class="row">
                        <div class="col-md-12">
                            <span class="glyphicon glyphicon-star"></span>
                            <span class="glyphicon glyphicon-star"></span>
                            <span class="glyphicon glyphicon-star"></span>
                            <span class="glyphicon glyphicon-star"></span>
                            <span class="glyphicon glyphicon-star-empty"></span>
                            Anonymous
                            <span class="pull-right">12 days ago</span>
                            <p>I've alredy ordered another one!</p>
                        </div>
                    </div>

                    <hr>

                    <div class="row">
                        <div class="col-md-12">
                            <span class="glyphicon glyphicon-star"></span>
                            <span class="glyphicon glyphicon-star"></span>
                            <span class="glyphicon glyphicon-star"></span>
                            <span class="glyphicon glyphicon-star"></span>
                            <span class="glyphicon glyphicon-star-empty"></span>
                            Anonymous
                            <span class="pull-right">15 days ago</span>
                            <p>I've seen some better than this, but not at this price. I definitely recommend this
                                item.</p>
                        </div>
                    </div>-->

                </div>

            </div>

        </div>

    </div>


<!-- /.container-->
<?php

include('includes/footer.php');

?>
