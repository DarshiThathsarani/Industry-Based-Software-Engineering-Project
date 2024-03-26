<?php
require_once '../bootstrap.php';

LogInCheck();

if(isset($_GET['id'])){
    require_once '../db.php';
    $sql = "DELETE FROM `recipe` WHERE `id` = '".$_GET['id']."'";

    //use for MySQLi OOP
    if($conn->query($sql)){
        $_SESSION['success'] = 'Item deleted successfully';
    }
    else
    {
        $_SESSION['error'] = 'Something went wrong in deleting member query';
    }
}
else{
    $_SESSION['error'] = 'Select member to delete first';
}

header('location: ../recipe.php');