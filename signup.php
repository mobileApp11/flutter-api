<?php

include "connect.php";

if ($_SERVER['REQUEST_METHOD'] == "POST"){

$username 	= $_POST['username'] ; 
$email 		= $_POST['email'] ; 
$password 	= $_POST['password'] ; 

$stmtcheck = $con->prepare("SELECT * FROM users WHERE email = ?") ;

$stmtcheck->execute([$email]) ;

$row = $stmtcheck->rowcount() ;

if ($row > 0 ) {

	echo json_encode(["status" => "email already found"  ]);

}  else{

$stmt = $con->prepare("INSERT INTO users (`username` , `email` , `password`) VALUES (? , ? , ?)");

$stmt->execute([$username , $email , $password]) ; 

$row = $stmt->rowcount() ;

if($row > 0){
	echo json_encode([
     	'username'		=>$username ,
    	'email' 		=>$email ,
     	'password' 		=>$password,
      	'status' 		=>"success"
    	]);
    } 
 
 }

}

