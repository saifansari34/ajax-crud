<?php
include_once __DIR__.'/db.php';
$id=$_POST['hidden_user_id'];
$name=$_POST['name1'];
$email=$_POST['email1'];
$password=$_POST['password1'];



$sql="update ajax_task set name='$name', email='$email', password='$password' where id='$id'";
mysqli_query($conn,$sql);

?>