<?php

$page_title = "Čebelarstvo Zupanek";
include('includes/header.php');

?>
<!-- Page Content -->
<div class="container">

    <div class="row">
        <div class="box">

            <div class="col-md-3">
                <p class="lead">MED</p>
                <!--<div class="list-group">
                    <a href="#" class="list-group-item">Manjši kozarec</a>
                    <a href="#" class="list-group-item">Večji kozarec</a>
                    <a href="#" class="list-group-item">Darilni komplet</a>
                </div>-->


            </div>

            <div class="col-md-9">

                <div class="row carousel-holder">

                    <div class="col-md-12">
                        <div id="carousel-example-generic" class="carousel slide" data-ride="carousel">
                            <ol class="carousel-indicators">
                                <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
                                <li data-target="#carousel-example-generic" data-slide-to="1"></li>
                                <li data-target="#carousel-example-generic" data-slide-to="2"></li>
                            </ol>
                            <div class="carousel-inner">
                                <div class="item active">
                                    <img class="slide-image" src="img/slide-izdelki-1.jpg" alt="">
                                </div>
                                <div class="item">
                                    <img class="slide-image" src="img/slide-izdelki-1.jpg" alt="">
                                </div>
                                <div class="item">
                                    <img class="slide-image" src="img/slide-izdelki-1.jpg" alt="">
                                </div>
                            </div>
                            <a class="left carousel-control" href="#carousel-example-generic" data-slide="prev">
                                <span class="glyphicon glyphicon-chevron-left"></span>
                            </a>
                            <a class="right carousel-control" href="#carousel-example-generic" data-slide="next">
                                <span class="glyphicon glyphicon-chevron-right"></span>
                            </a>
                        </div>
                    </div>

                </div>

                <div class="row">
                    <?php
                    //get rows query
                    $query = $db->query("SELECT * FROM products ORDER BY id DESC LIMIT 10");
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
                            $posebnosti = $row['posebnosti'];
                            $cena = $row['cena'];
                            $slika = $row['slika'];

                            echo "
                    <div class='col-sm-4 col-lg-4 col-md-4'>
                        <div class='thumbnail'>
                        <br>
                        <h4 class='list-group-item-heading' text-align: center;>$naziv</h4><br>
                        <img max-height='200px' src='img/$slika' >
                            <div class='caption'>
                                
                    <p class='list-group-item-text'>$okus</p><br>
                    <p class='list-group-item-text'>$uporaba</p>
             
                    <h4 class=\"pull-right\">$cena €</h4>
                    
                                                   </div>
                    </div>
                </div>
                        ";

                        }
                    } ?>

                </div>

            </div>

        </div>

    </div>

</div>
<!-- /.container
<?php

include('includes/footer.php');

?>
