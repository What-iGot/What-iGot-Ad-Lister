<?php 

require_once '../template/bootstrap.php';
require_once '../template/add_ad.php';
 ?>

<html>

    <?php include'../views/partials/header.php' ?>  
    <!-- Main jumbotron for a primary marketing message or call to action -->
    <div class="jumbotron">
        <div class="container">
            <h1>Create A New Ad</h1>
        </div>
    </div>

    <div class="container">
      <!-- Example row of columns -->
        <form method="POST" enctype="multipart/form-data">
            <?php foreach ($errors as $error) : ?>
                <h4 id="error messages"><?= $error; ?></h4>
            <?php endforeach; ?>
            <div class="form-group">
                <label for="item">Item Name *</label>
                <input type="text" class="form-control" name="item" id="item" placeholder="Enter Name" value="<?= isset($_POST['item']) ? Input::get('item') : '' ; ?>" require=' '>
            </div>
            <div class="form-group">
                <label for="price">Asking Price *</label>
                <input value="<?= isset($_POST['price']) ? Input::get('price') : '' ;  ?>" type="number" class="form-control" name="price" id="price"  require=' '>                
            </div>
            <div class="form-group">
                <label for="description">Description of Item *</label>
                <textarea class="form-control" rows="3" name="description" id="description" placeholder="Description of Item" require=' '><?= isset($_POST['description']) ? Input::get('description') : '' ;  ?></textarea>
            </div>
            <div class="form-group">
                <label for="somefile">Photo</label>
                <input type="file" class="btn btn-large" name="somefile" id="somefile">
                <p class="text text-error">* Required field</p>
                <input class="btn btn-primary" type="submit" style="float: right">
            </div>

        </form>
    <?php include'../views/partials/footer.php' ?>  
</html>

