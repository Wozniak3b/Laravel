<?php
    $database=mysqli_connect("localhost","root","","chat_db");
    if($database->connect_error){
        die("Unfortunately connection with db failed:".$database->connect_error);
    };

    $result=array();
    $message=isset($_POST['message']) ? $_POST['message'] : null;
    $name=isset($_POST['name']) ? $_POST['name'] : null;

    //Adding items to database
    if(!empty($message) && !empty($name)){
        $query="INSERT INTO `chat` (`message`,`user_name`) VALUES ('".$message."','".$name."')";
        $result=mysqli_query($database,$query);
    }

    //Printing from db
    $start=isset($_GET['start']) ? intval($_GET['start']) : 0;
    //To print all messages
    $receive=mysqli_query($database,"SELECT * FROM `chat` WHERE `id` > ".$start);
    while($row=$receive->fetch_assoc()){
        $result['receive'][]=$row;
    }
    
    mysqli_close($database);
    
    header('Access-Control-Allow-Origin: *');
    header("Access-Control-Allow-Methods: PUT, GET, POST");
    header('Content-Type: application/json; charset=utf-8');

    echo json_encode($result);
?>


