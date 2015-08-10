<?php 
require_once '../template/Input.php';
$errors = [];
if(!empty($_POST)){
    $insertQuery = "INSERT INTO  (item, location, list_date, price, description) 
            VALUES (:item, :location, :list_date, :price, :description)";
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
        $location = Input::get('location');
        $stmt->bindValue(':location', $location, PDO::PARAM_STR);
    } catch (Exception $e) {
            // Report any errors
        $errors[] = "Location - " . $e->getMessage();
    } 
    try {
    // Create a person
        $price = Input::getNumber('price');
        $stmt->bindValue(':price', $price, PDO::PARAM_STR);
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
    
    if(empty($errors)){
        $stmt->execute();
    }
}

?>