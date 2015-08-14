<?php 
require_once "../template/bootstrap.php";
 ?>
 <html>
    <?php include '../views/partials/header.php' ;?>


    <!-- Main jumbotron for a primary marketing message or call to action -->
    <div class="jumbotron">
        <div class="container">
            <h1>What iGot</h1>
        </div>
    </div>

    <div class="container">
      <!-- Example row of columns -->

                <h1><?=$item['name']; ?></h2>
                <h3><?=$item['description']; ?></h3> 
                <h2><?='$' . $item['price']; ?></h2>
                <h6><?= $item['postdate']; ?></h6>

        

        <img src="<?=$item['image_url'] ; ?>" class="img-responsive">

    <?php include'../views/partials/footer.php' ?>  

</html>
