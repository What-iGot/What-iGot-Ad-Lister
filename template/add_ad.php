<?php 
require_once 'Input.php';
$errors = [];
if(!empty($_POST)){
    $insertQuery = "INSERT INTO items (name, description, price, image_url) 
            VALUES (:item, :description, :price, :image_url)";
    $stmt = $dbc->prepare($insertQuery);
        //prepare database to run query
    try {
    // Create a person
        $item = Input::getString('item');
        $stmt->bindValue(':item', $item, PDO::PARAM_STR);
    } catch (LengthException $e) {
            // Report any errors
        $errors[] = "Item - " . $e->getMessage();
    } catch (InvalidArgumentException $e){
        $errors[] = "Item - " . $e->getMessage();
    }

    try {
    // Create a person
        $price = Input::getNumber('price');
        $stmt->bindValue(':price', $price, PDO::PARAM_INT);
    } catch (OutOfRangeException $e) {
            // Report any errors
        $errors[] = "Price - " . $e->getMessage();
    } catch (InvalidArgumentException $e){
        $errors[] = "Price - " . $e->getMessage();
    }
    try {
    // Create a person
        $description = Input::getString('description');
        $stmt->bindValue(':description', $description, PDO::PARAM_STR);
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
            $stmt->bindValue(':image_url', $filename, PDO::PARAM_STR);
        } else {
            echo "Sorry, there was an error uploading your file.";
        }
    }
    if(empty($errors)){
        $stmt->execute();
    }
}

?>