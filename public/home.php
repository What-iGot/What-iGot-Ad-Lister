<?php
require_once '../template/bootstrap.php';  

$items = $displayArray;

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
                        <span class="icon-bar">
                        </span>
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
                <h1>What iGot <small>Ecommerce for the Modern World</small></h1>
                <div>
                    <img src="img/logo-idea-copy.jpg" class="img-rounded" alt="Confusion">
                </div>
            </div>
        </div>
            <div>
                <div>
                    <table class=" col-md-4 container  table table-striped table-bordered">
                        <thead>
                            <tr>
                                <th>Item</th>
                                <th>Description</th>
                                <th>Price</th>
                            </tr>
                        </thead>
                        <tbody>
                            <!-- set foreach loop to display information in human friendly manner -->
                            <? foreach ($items as $item): ?>
                                <tr>
                                    <td><a href="index.php?postid=<?="{$item['id']}"; ?>"><?="{$item['name']}"; ?></a></td>
                                    <td><?="{$item['description']}"; ?></td> 
                                    <td>$<?="{$item['price']}"; ?></td>
                                </tr>
                            <? endforeach; ?>
                        </tbody>
                    </table>
                    <? if ($page > 2 && $page <= $totalPages): ?>
            <a class='btn btn-primary' href="?page=1">FIRST</a>
        <? endif; ?>
       
        <!-- allow previous button to be seen on all pages after page 1 -->
        <div class="pagination pagination-centered">
            <? if ($page > 1 && $page <= $totalPages): ?>
                <a class='btn btn-primary' href="?page=<?= $page - 1; ?>">PREVIOUS</a>
            <? endif; ?>
           
            <!-- allow next button to be seen on all pages before last page -->
            <? if ($page < $totalPages): ?>
                <a class='btn btn-primary' href="?page=<?= $page + 1; ?>">NEXT</a>
            <? endif; ?>
           
            <!-- allow next button to be seen on all pages before second to last page -->
            <? if ($page < ($totalPages - 1)): ?>
                <a class='btn btn-primary' href="?page=<?= $totalPages; ?>">LAST</a>
            <? endif; ?>
        </div>
            </div>
                <a class="btn btn-warnig" href="new_ad.php">Make New Ad</a>
            </div>

            <hr>

            
        </div> <!-- /container -->
        <audio src="loopit.wav" id='loop'></audio>
        <script>
            "use strict";
                function playSound(sound){
                    document.getElementById(sound).play();
                }
                (function(){
                    var konamiCode = "38,38,40,40,37,39,37,39,66,65,13";
                    var code = [];
                    $(document).keyup(function(event){
                        console.log(event.keyCode);
                        code.push(event.keyCode);
                        if (code.toString().indexOf(konamiCode) >= 0){
                            playSound('loop');
                        }
                    })
                })();
            </script>
    </body>
    <footer>
        <p>&copy; What iGot 2015 <br>What iGot is currently only available in San Antonio Tx<br> Image By Steven Lewis</p>
    </footer>
</html>