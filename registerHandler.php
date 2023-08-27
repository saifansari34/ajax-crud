<?php

include_once __DIR__.'/db.php';
$name=$_POST['name'];
$email=$_POST['email'];
$password=$_POST['password'];



$sql="insert into ajax_task(name,email,password) values('$name','$email','$password')";
mysqli_query($conn,$sql);

?>