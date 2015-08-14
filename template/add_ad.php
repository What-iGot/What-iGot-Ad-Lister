<?php 
require_once 'Input.php';
require_once 'Ad.php';

$errors = [];
// date_time_set('America/Chicago');
if(!empty($_POST)){
        //prepare database to run query
    try {
    // Create a person
        $item = Input::getString('item');
    } catch (LengthException $e) {
            // Report any errors
        $errors[] = "Item - " . $e->getMessage();
    } catch (InvalidArgumentException $e){
        $errors[] = "Item - " . $e->getMessage();
    }

    try {
    // Create a person
        $price = Input::getNumber('price');
    } catch (OutOfRangeException $e) {
            // Report any errors
        $errors[] = "Price - " . $e->getMessage();
    } catch (InvalidArgumentException $e){
        $errors[] = "Price - " . $e->getMessage();
    }
    try {
    // Create a person
        $description = Input::getString('description');
    } catch (LengthException $e) {
            // Report any errors
        $errors[] = "Description - " . $e->getMessage();
    } catch (InvalidArgumentException $e){
        $errors[] = "Description - " . $e->getMessage();
    }
    if($_FILES) {
        $uploads_directory = 'img/uploads/';
        $filename = $uploads_directory . basename($_FILES['somefile']['name']);
        if (move_uploaded_file($_FILES['somefile']['tmp_name'], $filename)) {
            echo '<p>The file '. basename( $_FILES['somefile']['name']). ' has been uploaded.</p>';

        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    }
    if(empty($errors)){

        // $user_id = (int)$_SESSION['user_id'];
        $new_ad = new Ad();
        $new_ad->name         = $item;
        $new_ad->price        = $price;
        $new_ad->image_url      = $filename;
        $new_ad->description  = $description;
        $new_ad->postdate     = date('Y-m-d h:i');
        // $new_ad->user_id      = $user_id;
        $new_ad->save();

        
        $cntstmt = $dbc->prepare("SELECT count(*) FROM items");
        $cntstmt->execute(); 
        $totalPages = ceil(($cntstmt->fetchColumn())/$limit);
        header("Location: /?page=1");
        exit();
    }
}

?>