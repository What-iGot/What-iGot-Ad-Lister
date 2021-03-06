<?php
//call files to connect to database use $config for code reusability

require_once '../template/Input.php';

if(!empty($_GET['postid'])){
    $id = '' . $_GET['postid'];
    $stmt = $dbc->query("SELECT * FROM items WHERE id = '$id'");
    $item = $stmt->fetch(PDO::FETCH_ASSOC);
}elseif (empty($_GET['postid'])) {
    # code...

     //declare variables for offset, total number of columns/parks, and total number of pages
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
}
