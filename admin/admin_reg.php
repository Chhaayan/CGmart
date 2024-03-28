<?php
include('../functions/common_function.php');
include('../includes/connect.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Registration</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
  <div class="container-fluid m-3">
    <h2 class="text-center mb-5">Admin Registration</h2>
    <div class="row d-flex justify-content-center">
      <div class="col-lg-6 col-xl-5">
        <img src="./product_images/Adminreg.png" class="img-fluid" alt="Admin Registration">
      </div>
      <div class="col-lg-6 col-xl-4">
        <form action="" method="POST">
          <div class="form-outline mb-4">
            <label for="username" class="form-label">Username</label>
            <input type="text" id="username" name="username" placeholder="Enter your Username" class="form-control" required>
          </div>
          <div class="form-outline mb-4">
            <label for="email" class="form-label">Email</label>
            <input type="email" id="email" name="email" placeholder="Enter your Email" class="form-control" required>
          </div>
          <div class="form-outline mb-4">
            <label for="password" class="form-label">Password</label>
            <input type="password" id="password" name="password" placeholder="Enter your Password" class="form-control" required>
          </div>
          <div>
            <input type="submit" class="btn btn-submit bg-info px-3 py-2" name="Admin Registration" value="Register">
            <p class="small">Already have an account?<a href="admin_login.php" class="link-danger"> Login</a></p>
          </div>
        </form>
      </div>
    </div>
  </div>
</body>
</html>
<?php
if(isset($_POST['user_register'])){
  $user_username=$_POST['user_username'];
  $user_email=$_POST['user_email'];
  $user_password=$_POST['user_password'];
  $hash_password=password_hash($user_password,$PASSWORD_DEFAULT);
  

  $select_query="select * from `user_table` where username='$user_username' or user_email='$user_email'";
  $result=mysqli_query($con,$select_query);
  $rows_count=mysqli_num_rows($result);
  if($rows_count>0){
    echo "<script>alert('Username and Email already exists!')</script>";
  }else{
    
    $insert_query="insert into`user_table` (username,user_email,user_password) values ('$user_username', 
    '$user_email','$hash_password')";
    $sql_execute=mysqli_query($con,$insert_query);
  }

  if($sql_execute){
    echo "<script>alert('Data inserted successfully')</script>";
  }else{
    die(mysqli_error($con));
  }
}
?>