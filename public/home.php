<?php

require_once '../template/bootstrap.php';  

$items = $displayArray;

?>
<html>
    <?php include '../views/partials/header.php' ;?>
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
                                    <td><a href="show.php?postid=<?="{$item['id']}"; ?>"><?="{$item['name']}"; ?></a></td>
                                    <td><?="{$item['description']}"; ?></td> 
                                    <td>$<?="{$item['price']}"; ?></td>
                                </tr>
                            <? endforeach; ?>
                        </tbody>
                    </table>
                           
                            <!-- allow previous button to be seen on all pages after page 1 -->
                            <div class="pagination pagination-centered">
                                <? if ($page > 2 && $page <= $totalPages): ?>
                                    <a class='btn btn-primary' href="?page=1">FIRST</a>
                                <? endif; ?>
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
                       <?php include'../views/partials/footer.php' ?>         
</html>