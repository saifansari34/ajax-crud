<?php
include_once __DIR__.'/db.php';

if(isset($_POST['readrecord'])){
$data = '<table class="table table-bordered table-strped"
          <tr>
          <th>Sr No.</th>
          <th>Name</th>
          <th>Email</th>
          <th>Edit</th>
          <th>delete</th>
          </tr>';

   $sql="select * from ajax_task";    
   $query=mysqli_query($conn,$sql);  
   if(mysqli_num_rows($query) > 0){
    $number=1;
    while($res=mysqli_fetch_assoc($query))
    {
        $data.='<tr>
         <td>'.$number.'</td>
         <td>'.$res['name'].'</td>
         <td>'.$res['email'].'</td>
         <td>
         <button onclick="GetUserDetail('.$res['id'].')" class="btn btn-warning">Edit</button>
         </td>
         <td>
         <button onclick="DeleteUser('.$res['id'].')" class="btn btn-danger">Delete</button>
         </td>
        </tr>';
        $number++;
    }
   }
   $data.='</table>';
   echo $data; 
}
?>