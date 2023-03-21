<?php
    $firstName = $_Post['firstName'];
    $lastName = $_Post['lastName'];
    $email = $_Post['email'];
    $message = $_Post['message'];

    //database connection
    $conn = new mysqli('localhost', 'root','','anshu');
    if($conn->connect_error){
        die('Connection Failed : '.$conn->connect_error);
    }else{
        $stmt = $conn->prepare("insert into registration( firstName , lastName , email , message)
        values( ? , ? , ? , ?)");
        $stmt->blind_param("ssss" ,$firstName , $lastName, $email, $message);
        $stmt->execute();
        echo "Submit Successfully....";
        $stmt->close();
        $conn->close();


    }
?>