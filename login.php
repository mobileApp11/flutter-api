<?php

include "connect.php";

if($_SERVER['REQUEST_METHOD'] == "POST"){


 $email =  $_POST['email'];
 $password = $_POST['password'];

 $stmt = $con->prepare("SELECT * FROM users WHERE email = ? AND password = ?");
 $stmt -> execute([$email , $password]);



 $row = $stmt->rowcount() ;

 if($row > 0){


 	echo json_encode([ 'status' => "success" ]);


 }else{
 	echo json_encode(['status' => "error"]);
 }


}