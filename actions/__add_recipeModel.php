<?php
require_once '../bootstrap.php';
LogInCheck();
//only POST request is accepted
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    // Sanitize POST array
    $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
    $a = trim($_POST['name']);
    $b = trim($_POST['item1']);
    $c = trim($_POST['q1']);
    $d = trim($_POST['item2']);
    $e = trim($_POST['q2']);
    $f = trim($_POST['item3']);
    $g = trim($_POST['q3']);


    //connect to db
    require_once '../db.php';
    $sql = "INSERT INTO `recipe` (`name`,`item1`, `q1`, `item2`, `q2`, `item3`, `q3`) VALUES ('" . $a . "',' " . $b . "','" . $c . "','" . $d . "','" . $e . "' ,'" . $f . "','" . $g . "')";

    //perform query
    $query = $conn->query($sql);
    if($query == true){
        var_dump($query);
        $_SESSION['success'] = 'item added successfully';
    }
    else
    {
        $_SESSION['error'] = 'something went wrong';
    }

}
else {
    $_SESSION['error'] = 'Something went wrong while adding items';
    }

header('location: ../recipe.php');



