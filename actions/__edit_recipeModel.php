<?php

    require_once '../bootstrap.php';
    //only POST request is accepted
    if($_SERVER['REQUEST_METHOD'] == 'POST')
    {
        // Sanitize POST array
         $_POST = filter_input_array(INPUT_POST, FILTER_SANITIZE_STRING);
        //print_r($_POST);

        //trim the values
        $id = $_POST['id'];
        $a = trim($_POST['name']);
        $b = trim($_POST['item1']);
        $c = trim($_POST['q1']);
        $d = trim($_POST['item2']);
        $e = trim($_POST['q2']);
        $f = trim($_POST['item3']);
        $g = trim($_POST['q3']);


        //connect to db
        require_once '../db.php';
        $sql = " UPDATE `recipe` SET `name` = '" .$a. "',`item1` = '" .$b."', `q1` = '" .$c. "', `item2` = '" .$d. "', `q2` = '" .$e. "', `item3` = '" .$f. "', `q3` = '" .$g. "' WHERE `recipe`.`id` = '" .$id. "'";
        $query = $conn->query($sql);


        if($query == true)
        {
            $_SESSION['success'] = 'item updated successfully';

        }

        else
        {
            $_SESSION['error'] = 'Something went wrong while updating item';
        }

        //redirect to recipe home
        header('location: ../recipe.php');




   }
   else
   {
       $_SESSION['error'] = 'Something went wrong while updating item';
       header('location: ../items.php');
   }





