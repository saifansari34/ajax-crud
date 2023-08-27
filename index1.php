<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
    <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/css/bootstrap.min.css">
  

</head>
<body>
   <div class="container">
    <h1 class="text-primary text-center">Ajax Crud Operation</h1>

     <div class="d-flex justify-content-end">
     <button type="button" class="btn btn-warning" data-toggle="modal" data-target="#myModal">
        Open modal
     </button>
     </div>
     <h2 class="text-danger">All Records</h2>
     <!-- Show Record -->
     <div id="records_contant">
    </div>

    <!-- The Modal -->
<div class="modal" id="myModal">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Ajax Crud Operation</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
       <div class="form-group">
        <label for="">Name</label>
        <input type="text" name="name" id="name" class="form-control">
       </div>
       <div class="form-group">
        <label for="">Email</label>
        <input type="email" name="email" id="email" class="form-control">
       </div>
       <div class="form-group">
        <label for="">Password</label>
        <input type="password" name="password" id="password" class="form-control">
       </div>
      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal" onclick="addRecord()">Save</button>
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
      </div>

    </div>
  </div>
</div>

<!-- Update Modal -->

  <!-- The Modal -->
  <div class="modal" id="update_user_modal">
  <div class="modal-dialog">
    <div class="modal-content">

      <!-- Modal Header -->
      <div class="modal-header">
        <h4 class="modal-title">Ajax Crud Operation</h4>
        <button type="button" class="close" data-dismiss="modal">&times;</button>
      </div>

      <!-- Modal body -->
      <div class="modal-body">
       <div class="form-group">
        <label for="">Name</label>
        <input type="text" name="name" id="update_name" class="form-control">
       </div>
       <div class="form-group">
        <label for="">Email</label>
        <input type="email" name="email" id="update_email" class="form-control">
       </div>
       <div class="form-group">
        <label for="">Password</label>
        <input type="password" name="password" id="update_password" class="form-control">
       </div>
      </div>

      <!-- Modal footer -->
      <div class="modal-footer">
        <button type="button" class="btn btn-danger" data-dismiss="modal" onclick="updateUserDetail()">Save</button>
        <button type="button" class="btn btn-danger" data-dismiss="modal">Close</button>
        <input type="hidden" name="" id="hidden_user_id">
      </div>

    </div>
  </div>
</div>

   </div>

<script src="https://cdn.jsdelivr.net/npm/jquery@3.6.4/dist/jquery.slim.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
  
  <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.1.1/jquery.min.js"></script>
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.2/dist/js/bootstrap.bundle.min.js"></script>


</body>

</html>

<script type="text/javascript">
  $(document).ready(function(){
    readRecords();
  })
    function readRecords(){
        var readrecord="readrecord";
        $.ajax({
            url:'show.php',
            type:'post',
            data:{readrecord:readrecord},
            success:function(data,status){
                $('#records_contant').html(data);
            }
        });
    };
function addRecord(){
    var name=$('#name').val();
    var email=$('#email').val();
    var password=$('#password').val();
    // console.log(email);
    $.ajax({
        url:"registerHandler.php",
        type:"post",
        data:{
            name:name,
            email:email,
            password:password,
        },
        success:function(data,status){
             readRecords();
        },

    });
}
// delete Record
function DeleteUser(deleteid){
  var conf=confirm("Are you sure want to deleyte");
  if(conf==true){
    $.ajax({
     url:"delete.php",
     type:"post",
     data:{deleteid:deleteid},
     success:function(data,status){
      readRecords();
     }

    });
  }
}
function GetUserDetail(id){
    $('#hidden_user_id').val(id);
    $.post("edit.php", {id:id},
    function(data,status){
      var user = JSON.parse(data);
      $('#update_name').val(user.name);
      $('#update_email').val(user.email);
      $('#update_password').val(user.password );

    });
    $('#update_user_modal').modal("show");

}
function updateUserDetail(){
  var name1 = $('#update_name').val();
  var email1 = $('#update_email').val();
  var password1 = $('#update_password').val();
  var hidden_user_id = $('#hidden_user_id').val();
  console.log(name1);

  $.post("update.php",{
    name1:name1,
    email1:email1,
    password1:password1,
    hidden_user_id:hidden_user_id},
    function(data,status){
      $('#update_user_modal').modal("hide");
      readRecords();
    


  });




}

</script>
</body>
</html>