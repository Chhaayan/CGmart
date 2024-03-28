<?php
include('../functions/common_function.php');
include('../includes/connect.php');
@session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Login</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
  <div class="container-fluid m-3">
    <h2 class="text-center mb-5">Admin Login</h2>
    <div class="row d-flex justify-content-center">
      <div class="col-lg-6 col-xl-5">
        <img src="./product_images/adminlog.jpg" class="img-fluid" alt="Admin Login">
      </div>
      <div class="col-lg-6 col-xl-4">
        <form action="" method="POST">
          <div class="form-outline mb-4">
            <label for="username" class="form-label">Username</label>
            <input type="text" id="username" name="username" placeholder="Enter your Username" class="form-control" required>
          </div>
          
          <div class="form-outline mb-4">
            <label for="password" class="form-label">Password</label>
            <input type="password" id="password" name="password" placeholder="Enter your Password" class="form-control" required>
          </div>
          <div>
            <input type="submit" class="btn btn-submit bg-info px-3 py-2" name="Admin Login" value="Login">
            <p class="small">Dont have an account?<a href="admin_reg.php" class="link-danger"> Register</a></p>
          </div>
        </form>
      </div>
    </div>
  </div>
</body>
</html>
<?php
if(isset($_POST['user_login'])){
  $user_username=$_POST['user_username'];
  $user_password=$_POST['user_password'];

  $select_query="select * from `user_table` where username='$user_username'";
  $result=mysqli_query($con,$select_query);
  $row_count=mysqli_num_rows($result);
  $row_data=mysqli_fetch_assoc($result);
  


 

  if($row_count>0){
    $_SESSION['username']=$user_username;
    if(password_verify($user_password, $row_data['user_password'])){
      //echo "<script>alert('Login Successful')</script>";
      if($row_count==1 and $row_count_cart==0){
        $_SESSION['username']=$user_username;
        echo "<script>alert('Login Successful')</script>";
        echo "<script>window.open('./admin/index.php','_self')</script>";
      

    }else{
      echo "<script>alert('Invalid Credentials')</script>";
    }

}
}
}
?>