<?php 
require_once '../template/bootstrap.php';
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
          <a class="navbar-brand" href="index.php">What iGot</a>
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
        <h1>Create A New Ad</h1>
        <p>This is a template for a simple marketing or informational website. It includes a large callout called a jumbotron and three supporting pieces of content. Use it as a starting point to create something more unique.</p>
        <p><a class="btn btn-primary btn-lg" href="#" role="button">Learn more &raquo;</a></p>
      </div>
    </div>

    <div class="container">
      <!-- Example row of columns -->
        <form method="POST">
            <?php foreach ($errors as $error) : ?>
                <h4 id="error messages"><?= $error; ?></h4>
            <?php endforeach; ?>
            <div class="form-group">
                <label for="name">Item Name</label>
                <input type="text" class="form-control" name="name" id="name" placeholder="Enter Name" value="<?= isset($_POST['name']) ? Input::get('name') : '' ; ?>" require=' '>
                
            </div>
        <!--     <div class="form-group">
                <label for="location">Location of Park</label>
                <select name="location" id="location" class="form-control">
                    <?php foreach ($states as $state): ?>
                        <option value="<?= $state;  ?>"><?= $state; ?></option>
                    <?php endforeach ?>
                </select>
            </div> -->
            <!--  <div class="form-group">
                <label for="date">Date of Establishment</label>
                <input value="<?= isset($_POST['date']) ? Input::get('date') : '' ;  ?>" type="date" class="form-control" name="date" id="date" require=' '>
            </div> -->
             <div class="form-group">
                <label for="price">Asking Price</label>
                <input value="<?= isset($_POST['price']) ? Input::get('price') : '' ;  ?>" type="text" class="form-control" name="price" id="price"  require=' '>                
            </div>
             <div class="form-group">
                <label for="description">Description of Item</label>
                <textarea class="form-control" rows="3" name="description" id="description" placeholder="Description of Item" require=' '><?= isset($_POST['description']) ? Input::get('name') : '' ;  ?></textarea>
            </div>
            <input class="btn btn-primary" type="submit" style="float: right">
        </form>



      <footer>
        <p>&copy; Company 2014</p>
      </footer>
    </div> <!-- /container -->
    </body>
</html>

