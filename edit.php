<?php
include_once __DIR__.'/db.php';
$id=$_POST['id'];
// echo $id;
$sql="select * from ajax_task where id='$id'";
$query=mysqli_query($conn,$sql);
$res=mysqli_fetch_array($query);
$response= array();
if($res){
   $response=$res;
}else{
    $response['status']= 200;
    $response['message']= 'Data not found';
}
echo json_encode($response);
?>