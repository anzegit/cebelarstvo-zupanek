<?php
$page_title = "Cebelarstvo Zupanek - Ali ste vedeli?";
include('includes/header.php');
/**
 * if(isset($_GET['kategorija'])) {
 *         $category = mysqli_real_escape_string($db, $_GET['kategorija']);
 *         $query = "SELECT * FROM posts WHERE kategorija=$kategorija";
 *     }else {
 */

$query = "SELECT * FROM posts ORDER BY id DESC";
/**
 *     }
 */

$posts = $db->query($query);

/**
 * if(!isset($_SESSION['username'])){
 *             header("Location: login.php");
 *             return;
 *         }
 */


?>
    <div class="container">
    <div class="row">
        <?php if ($posts->num_rows > 0) {
            while ($row = $posts->fetch_assoc()) {
                ?>
                <div class="box">
                    <div class="col-md-1 text-center">
                        <p><i class="fa fa-camera fa-4x"></i>
                        </p>
                        <p><?php echo $row['datum']; ?></p>
                    </div>
                    <div class="col-md-5">
                        <a href=#">
                            <img class="img-responsive img-hover" src="http://placehold.it/600x300" alt="">
                        </a>
                    </div>
                    <div class="col-md-6">
                        <h2 class="blog-post-title"><?php echo $row['naslov']; ?></a>
                        </h2>

                        <p><?php $body = $row['besedilo'];
                            echo $body;

                            ?></p>

                    </div>
                </div>

                <!-------------------------------------------------------------------------->
            <?php }
        } ?>
    </div>



<?php
include('includes/footer.php');
?>