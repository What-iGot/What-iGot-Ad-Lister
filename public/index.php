<?php 
require_once "../template/bootstrap.php";
 ?>
 <html>
    <head>
        <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../favicon.ico">
        <title>What iGot</title>
    </head>
    <body>
        <nav class="navbar navbar-inverse navbar-fixed-top">
        <div class="container">
        <div class="navbar-header">
          <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar" aria-expanded="false" aria-controls="navbar">
            <span class="sr-only">Toggle navigation</span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            </button>
            <a class="navbar-brand" href="home.php">What iGot</a>
        </div>
        <div id="navbar" class="navbar-collapse collapse">
            <form class="navbar-form navbar-right">
                <div class="form-group">
                    <input type="email" placeholder="Email" class="form-control">
                </div>
                <div class="form-group">
                    <input type="password" placeholder="Password" class="form-control">
                </div>
                <button type="submit" class="btn btn-success">Sign in</button>
            </form>
        </div><!--/.navbar-collapse -->
        </div>
    </nav>

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

        

        <img src="<?=$item['image_url'] ; ?>">


        <!-- <form method="POST" actions="upload.php" enctype="multipart/form-data">
            <?php foreach ($errors as $error) : ?>
                <h4 id="error messages"><?= $error; ?></h4>
            <?php endforeach; ?>
            <div class="form-group">
                <label for="item">Item Name *</label>
                <input type="text" class="form-control" name="item" id="item" placeholder="Enter Name" value="<?= $item['name'] ; ?>" require=' '>
            </div>
            <div class="form-group">
                <label for="price">Asking Price *</label>
                <input value="<?= $item['price'] ;  ?>" type="number" class="form-control" name="price" id="price" >                
            </div>
            <div class="form-group">
                <label for="description">Description of Item *</label>
                <textarea class="form-control" rows="3" name="description" id="description" placeholder="Description of Item" value="<?= $item['description'] ;  ?>"></textarea>
            </div>
            <div class="form-group">
                <label for="somefile">Photo</label>
                <input type="file" class="btn btn-large" name="somefile" id="somefile">
                <p class="text text-error">* Required field</p>
                <input class="btn btn-primary" type="submit" style="float: right">
            </div>

        </form> -->

    </div> <!-- /container -->
    </body>
    <footer>
        <p>&copy; What iGot 2015 <br>What iGot is currently only available in San Antonio Tx</p>
    </footer>
</html>
