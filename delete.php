<?php
include_once __DIR__.'/db.php';
$userid=$_POST['deleteid'];
$sql="delete from ajax_task where id='$userid'";
mysqli_query($conn,$sql);
?>