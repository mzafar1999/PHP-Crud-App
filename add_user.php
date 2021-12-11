<!DOCTYPE html>
<html lang="en">
<head>
  <title>Sign Up</title>
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
    <h2>Add User</h2>
    <form action="" method="post" class='w-50' enctype='multipart/form-data'>
    <div class="form-group">
      <label for="name">Name:</label>
      <input type="text" class="form-control"  placeholder="Enter name" name="user_name">
    </div>
    <div class="form-group">
      <label for="email">Email:</label>
      <input type="email" class="form-control"  placeholder="Enter email" name="user_email">
    </div>
    <div class="form-group">
      <label for="pwd">Password:</label>
      <input type="password" class="form-control"  placeholder="Enter password" name="user_password">
    </div>
    <div class="form-group">
      <label for="name">Image:</label>
      <input type="file" class="form-control" name="user_image">
    </div>
    <div class="form-group">
      <label for="user_detail">Short bio:</label>
      <textarea type="text" class="form-control" name="user_detail"> </textarea>
    </div>
    <input type="submit" class="btn btn-primary" name="insert-btn" />
    <a class="btn btn-primary" name="insert-btn" href="view_user.php" > View Users </a>

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
        $image = $_FILES['user_image']['name'];
        $tmp_name = $_FILES['user_image']['tmp_name'];
        $user_password = $_POST['user_password'];
        $user_detail = $_POST['user_detail'];
     

        $insertOne = "INSERT INTO `user` (`uesr_name`, `user_email`, `user_password`, `user_image`, `user_detail`) VALUES ( '$user_name', '$user_email', '$user_password', '$image', '$user_detail')";


        $run_insert = mysqli_query($conn,$insertOne);

        if($run_insert===true){
            echo " <h2 class='text-center text-success'> User added successfully </h2>";
            move_uploaded_file($tmp_name,"upload/$image");
        }else {
            echo " Something went wrong!";
        }

    };



  ?>
</div>

</body>

</html>
