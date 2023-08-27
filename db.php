<?php
define("HOSTNAME","localhost:3306");
define("USERNAME","root");
define("PASSWORD","");
define("DBNAME","ajax_crud");

$conn=mysqli_connect(HOSTNAME,USERNAME,PASSWORD,DBNAME);
if($conn){
    // echo "Connection is Successfull";
}else{
    echo "Connection is not successfull";
}


?>