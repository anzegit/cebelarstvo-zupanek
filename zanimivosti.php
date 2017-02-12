<?php
$page_title = "Cebelarstvo Zupanek";
include('includes/header.php');
?>

<!------------------------- HTML --------------------------------------------------------------------------->

<div class="container">

    <div class="row">
        <div class="box">
            <div class="col-lg-12 text-center">
                <div id="carousel-example-generic" class="carousel slide">
                    <!-- Indicators -->
                    <ol class="carousel-indicators hidden-xs">
                        <li data-target="#carousel-example-generic" data-slide-to="0" class="active"></li>
                        <li data-target="#carousel-example-generic" data-slide-to="1"></li>
                        <li data-target="#carousel-example-generic" data-slide-to="2"></li>
                        <li data-target="#carousel-example-generic" data-slide-to="3"></li>
                    </ol>

                    <!-- Wrapper for slides -->
                    <div class="carousel-inner">
                        <div class="item active">
                            <img class="img-responsive img-full" src="img/slide-1.jpg" alt="">
                        </div>
                        <div class="item">
                            <img class="img-responsive img-full" src="img/slide-2.jpg" alt="">
                        </div>

                    </div>

                    <!------------------------- Controls --------------------------------------------------------------------------->
                    <a class="left carousel-control" href="#carousel-example-generic" data-slide="prev">
                        <span class="icon-prev"></span>
                    </a>
                    <a class="right carousel-control" href="#carousel-example-generic" data-slide="next">
                        <span class="icon-next"></span>
                    </a>
                </div>


            </div>
        </div>
    </div>
    <!--------------------------------------------------------------------------------------------------------------->
    <div class="row">
        <div class="box">
            <div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1">
                <div class="post-preview">
                    <a href="post.php">
                        <h2 class="post-title">
                            Zdravilno delovanje medu
                        </h2>

                    </a>
                    <p class="post-meta">Objavil <a href="#">Anze</a> September 24, 2014</p>
                </div>
                <hr>
                <div class="post-preview">
                    <a href="post.php">
                        <h2 class="post-title">
                            Nasvet iz narave za lep�o ko�o
                        </h2>
                    </a>
                    <p class="post-meta">Objavil <a href="#">Peter</a> Oktober 24, 2016</p>
                </div>
                <hr>


                <!-- Pager -->
                <ul class="pager">
                    <li class="next">
                        <a href="#">Starej�e &rarr;</a>
                    </li>
                </ul>
            </div>


        </div>


    </div>
</div>

</div>
<!-- /.container -->

<?php
include('includes/footer.php');
?>
