<!DOCTYPE html>
<html lang="en">
<head>
  <title>View User</title>
  <meta charset="utf-8">
  <link rel="stylesheet" href="style.css">
  <meta name="viewport" content="width=device-width, initial-scale=1">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/css/bootstrap.min.css" rel="stylesheet">
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.2/dist/js/bootstrap.bundle.min.js"></script>
</head>
<body>

<div class="container mt-3">
  <div class="d-flex justify-content-between">
  <h2>Users</h2>
  <a href="add_user.php" class="btn btn-primary">Go Back</a>
  </div>

  <?php 
            $conn = mysqli_connect('localhost','root','','loginapp');
    if(isset($_GET['del'])){
    $del_id = $_GET['del'];
    $delete_query = "DELETE FROM user WHERE user_id = '$del_id'";
    $run_delete = mysqli_query($conn,$delete_query);
    if($run_delete===true){
         "Record with id $del_id has been deleted";
    }
    }
  ?>

  <table class="table">
    <thead>
      <tr>
        <th>ID</th>
        <th>Name</th>
        <th>Email</th>
        <th>Image</th>
        <th>Title</th>
        <th>Delete</th>
        <th>Edit</th>
      </tr>
    </thead>
    <tbody>
        <?php 
            $conn = mysqli_connect('localhost','root','','loginapp');
            $select = "SELECT * FROM user";
            $run_query = mysqli_query($conn,$select);
            while($row_user = mysqli_fetch_array($run_query)) {
            $user_id = $row_user['user_id'];
            $user_name = $row_user['uesr_name'];
            $user_email = $row_user['user_email'];
            $user_image = $row_user['user_image'];
            $user_detail = $row_user['user_detail'];

        ?>
      <tr>
        <td> <?php echo $user_id ?> </td>
        <td><?php echo $user_name ?></td>
        <td><?php echo $user_email ?></td>
        <td> <img class='img' src="upload/<?php echo $user_image ?>" alt=""> </td>
        <td><?php echo $user_detail ?></td>
        <td><a class='btn btn-danger' href="view_user.php?del=<?php echo $user_id; ?>"> Delete</a></td>
        <td><a class='btn btn-success' href="edit_user.php?edit=<?php echo $user_id; ?>">Edit</a></td>

      </tr>
        <?php } ?>
    </tbody>
  </table>
</div>

</body>
</html>
