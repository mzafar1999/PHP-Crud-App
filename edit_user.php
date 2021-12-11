<!DOCTYPE html>
<html lang="en">
<head>
  <title>Edit User</title>
  <meta charset="utf-8">
  <link rel="stylesheet" href="style.css">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/css/bootstrap.min.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
  <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.4.1/js/bootstrap.min.js"></script>
</head>
<body>

<div class="container">

 
    <div class="small">
    <h2>Edit User</h2>

    <?php 
        $conn = mysqli_connect('localhost','root','','loginapp');
        if(isset($_GET['edit'])){
        $edit_id = $_GET['edit'];

        $select = "SELECT * FROM user WHERE user_id='$edit_id'";
        $run_query = mysqli_query($conn,$select);
        $row_user = mysqli_fetch_array($run_query);
        $user_name = $row_user['uesr_name'];
        $user_email = $row_user['user_email'];
        $user_password = $row_user['user_password'];
       
        $user_detail = $row_user['user_detail'];
    }
  ?>

    <form action="" method="post" class='w-50' enctype='multipart/form-data'>
    <div class="form-group">
      <label for="name">Name:</label>
      <input type="text" class="form-control" value="<?php echo $user_name;?>" placeholder="Enter name" name="user_name">
    </div>
    <div class="form-group">
      <label for="email">Email:</label>
      <input type="email" class="form-control"  value="<?php echo $user_email;?>" placeholder="Enter email" name="user_email">
    </div>
    <div class="form-group">
      <label for="pwd">Password:</label>
      <input type="text" class="form-control" value="<?php echo $user_password;?>" placeholder="Enter password" name="user_password">
    </div>
   
    <div class="form-group">
      <label for="user_detail">Short bio:</label>
      <textarea type="text" class="form-control" name="user_detail"> 
      <?php echo $user_detail;?>
      </textarea>
    </div>
    <input type="submit" class="btn btn-primary" name="insert-btn" />
    <a class="btn btn-primary" href='view_user.php'>
    Go Back
  </a>
  </form>
    </div>
    <?php 
    $conn = mysqli_connect('localhost','root','','loginapp');
    if(mysqli_connect_errno()) {
        echo "Connection failed";
    } 

    if(isset($_POST['insert-btn'])){ //if insert button clicked, then pick values
        $user_name = $_POST['user_name'];
        $user_email = $_POST['user_email'];
     
        $user_password = $_POST['user_password'];
        $user_detail = $_POST['user_detail'];
     

        $edit = "UPDATE `user` SET `uesr_name`='$user_name', `user_email`='$user_email', `user_password` = '$user_password', `user_detail`='$user_detail' WHERE `user_id`='$edit_id' ";

        $run_edit = mysqli_query($conn,$edit);
        if($run_edit===true){
          echo " <h2 class='text-center text-success'> User Info Edited successfully </h2>";
      }else {
          echo " Something went wrong!";
      }

      };

  ?>
 
</div>

</body>

</html>
