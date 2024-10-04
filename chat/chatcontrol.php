<?php
    $database=@mysqli_connect("localhost","root","","chat_db");
    if($database->connect_error){
        die("Unfortunately connection with db failed:".$database->connect_error);
    };

    $mess=$_POST['message'];
    

    mysqli_close($database);
?>