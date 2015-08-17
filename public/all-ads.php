<?php 
$_ENV = include '../.env.php';
require_once '../db_controls/db_connect.php';
require_once '../template/Input.php';
// require_once '../template/control.php';

$limit = 25;

$cntstmt = $dbc->prepare("SELECT count(*) FROM items");

    $cntstmt->execute(); 

    $totalPages = ceil(($cntstmt->fetchColumn())/$limit);

    $input = Input::get('page');

    //if index at page is not set, not numeric, or greater than one then set page to page 1
    if (!$input || !is_numeric($input) || $input < 1) {
        $offset = 0;
        $page = 1;
        $input = 1;
    } else{
        //if not page 1, take index and set as page number, take index -1 * limit to get offset
        $offset = ($input - 1) * $limit;
        $page = $input; 
    }
    //if index at page is greater than the total number of pages then redirect to last available page
    if ($input > $totalPages){
        header("Location: ?page=$totalPages");
        exit();
    }
$query = ("SELECT * FROM items order by postdate DESC LIMIT :limit OFFSET :offset");

    $stmt = $dbc->prepare($query);
    $stmt->bindValue(':limit', $limit, PDO::PARAM_INT);
    $stmt->bindValue(':offset', $offset, PDO::PARAM_INT);

    //set query to select which table and what data to show from that table based on offset, limit, and table variables
    $stmt->execute();
    $displayArray = $stmt->fetchAll(PDO::FETCH_ASSOC);

$items = $displayArray;

?>
<html>
   <?php include'../views/partials/header.php' ?> 
        <!-- Main jumbotron for a primary marketing message or call to action -->
        <div class="jumbotron">
            <div class="container">
                <h1>What iGot <small>All Ads</small></h1>

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
                <a class="btn btn-warnig" href="/new-ad">Make New Ad</a>
            </div>

<?php include'../views/partials/footer.php' ?> 
</html>