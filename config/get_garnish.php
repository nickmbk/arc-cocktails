<?php

    include('config/db_connect.php');

    $sql = "SELECT * FROM garnish";

    if(mysqli_query($conn, $sql)){
        //success
        header('Location: add.php');
    } else {
        // error
        echo 'query error: ' . mysqli_error($conn);
    }

    


?>