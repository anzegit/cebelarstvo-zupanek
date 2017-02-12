<?php
include("includes/config.php");
include("includes/db.php");

?>

<!DOCTYPE html>
<html lang="si">

<head>
    <meta http-equiv="Content-Type" content="text/html; charset=utf-8">


    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <meta name="description" content="">
    <meta name="author" content="">

    <title><?php echo $page_title; ?></title>

    <!-- Bootstrap Core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
    <script src="http://code.jquery.com/jquery-1.11.1.min.js"></script>

    <!-- Skripta za potrditev pri delete -->

    <script language="JavaScript" type="text/javascript">
        $(document).ready(function(){
            $("a.delete").click(function(e){
                if(!confirm('Ali ste prepričani, da želite potrditi spremembe?')){
                    e.preventDefault();
                    return false;
                }
                return true;
            });
        });
    </script>

    <!-- Custom CSS -->
    <link href="css/style.css" rel="stylesheet">
    <link href="css/business-casual.css" rel="stylesheet">
    <link href="css/shop-homepage.css" rel="stylesheet">


    <!-- Fonts -->
    <link href="font-awesome/css/font-awesome.min.css" rel="stylesheet" type="text/css">
    <link
        href="https://fonts.googleapis.com/css?family=Open+Sans:300italic,400italic,600italic,700italic,800italic,400,300,600,700,800"
        rel="stylesheet" type="text/css">

    <link
        href="https://fonts.googleapis.com/css?family=Josefin+Slab:100,300,400,600,700,100italic,300italic,400italic,600italic,700italic"
        rel="stylesheet" type="text/css">

    <script language="javascript" type="text/javascript" src="js/bootstrap.js">


    </script>


</head>

<body>

<div class="brand">&#268ebelarstvo Zupanek</div>

<div class="address-bar">Trdinova 5 | 1230 Dom&#382ale | 031 375 666</div>

<!-- Navigation -->
<nav class="navbar navbar-default" role="navigation">
    <div class="container">
        <!-- Brand and toggle get grouped for better mobile display -->
        <div class="navbar-header">
            <button type="button" class="navbar-toggle" data-toggle="collapse"
                    data-target="#bs-example-navbar-collapse-1">
                <span class="sr-only">Toggle navigation</span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
                <span class="icon-bar"></span>
            </button>
            <!-- navbar-brand is hidden on larger screens, but visible when the menu is collapsed -->
            <a class="navbar-brand" href="index.php">Čebelarstvo Zupanek</a>
        </div>
        <!-- Collect the nav links, forms, and other content for toggling -->
        <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
            <ul class="nav navbar-nav">
                <li>
                    <a href="../index.php">Domov</a>
                </li>
                <li>
                    <a href="add_product.php">Dodaj izdelek</a>
                </li>
                <li>
                    <a href="izdelki.php">Uredi izdelek</a>
                </li>
                <li>
                    <a href="post.php">Dodaj nasvet</a>
                </li>
                <li>
                    <a href="blog.php">Uredi nasvet</a>
                </li>


            </ul>
        </div>
        <!-- /.navbar-collapse -->
    </div>
    <!-- /.container -->
</nav>