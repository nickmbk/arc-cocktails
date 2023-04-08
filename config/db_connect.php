<?php 
    // Connect to database
    $conn = mysqli_connect('localhost', 'nick', 'cocktails1!', 'arc_cocktails');
    

    // check connection
    if(!$conn){
        echo 'connection error: ' . mysqli_connect_error();
    }
?>