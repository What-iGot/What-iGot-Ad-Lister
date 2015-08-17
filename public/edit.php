<?php 

require_once '../template/bootstrap.php';
require_once '../template/edit_ad.php';
if(!empty($_GET['postid'])){
    $id = '' . $_GET['postid'];
    $stmt = $dbc->query("SELECT * FROM items WHERE id = '$id'");
    $item = $stmt->fetch(PDO::FETCH_ASSOC);
}

 ?>

<html>
<?php include '../views/partials/header.php';?>
    <!-- Main jumbotron for a primary marketing message or call to action -->
    <div class="jumbotron">
        <div class="container">
            <h1>Edit Ad</h1>
        </div>
    </div>

    <div class="container">
      <!-- Example row of columns -->
      <h1><?=$item['name']; ?></h2>
                <h3><?=$item['description']; ?></h3> 
                <h2><?='$' . $item['price']; ?></h2>
                <h6><?= $item['postdate']; ?></h6>
                <img src="<?=$item['image_url'] ; ?>" class="img-responsive">
        <form method="POST" enctype="multipart/form-data">
            <?php foreach ($errors as $error) : ?>
                <h4 id="error messages"><?= $error; ?></h4>
            <?php endforeach; ?>
            <div class="form-group">
                <label for="item">Item Name *</label>
                <input type="text" class="form-control" name="item" id="item" placeholder="Enter Name" value="<?= $item['name'] ; ?>" require=' '>
            </div>
            <div class="form-group">
                <label for="price">Asking Price *</label>
                <input value="<?= $item['price'] ;  ?>" type="number" class="form-control" name="price" id="price"  require=' '>                
            </div>
            <div class="form-group">
                <label for="description">Description of Item *</label>
                <textarea class="form-control" rows="3" name="description" id="description" placeholder="Description of Item" require=' ' value="<?= $item['description'] ;  ?>"></textarea>
            </div>
            <div class="form-group">
                <label for="somefile">Photo **</label>
                <input type="file" class="btn btn-large" name="somefile" id="somefile" value="<?= $item['image_url']; ?>">
                <p class="text text-error">* Required field <br>** If no file selected for image, ad will update to contain no image**</p>
                <input class="btn btn-primary" type="submit" style="float: right">
            </div>

        </form>
    </div> <!-- /container -->
    </body>
    <?php include '../views/partials/footer.php';?>
</html>