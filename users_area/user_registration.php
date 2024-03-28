<?php
include('../functions/common_function.php');
include('../includes/connect.php');
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>User Registration</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.1/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-4bw+/aepP/YC94hEpVNVgiZdgIC5+VKNBQNGCHeKRQN+PtmoHDEXuppvnDJzQIu9" crossorigin="anonymous">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.2/css/all.min.css" integrity="sha512-z3gLpd7yknf1YoNbCzqRKc4qyor8gaKU1qmn+CShxbuBusANI9QpRohGBreCFkKxLhei6S9CQXFEbbKuqLg0DA==" crossorigin="anonymous" referrerpolicy="no-referrer" />
</head>
<body>
  <div class="container-fluid my-3">
    <h2 class="text-center">New User Registration</h2>
    <div class="row d-flex align-items-center justify-content-center">
      <div class="col-lg-12 col-xl-6">
        <form action="" method="POST" enctype="multipart/form-data">
          <div class="form-outline mb-4">
            <label for="user_username" class="form-label">Username</label>
            <input type="text" id="user_username" class="form-control" placeholder="Enter your username"
            autocomplete="off" name="user_username" required>
          </div>
          <div class="form-outline mb-4">
            <label for="user_email" class="form-label">User email</label>
            <input type="email" id="user_email" class="form-control" placeholder="Enter your email"
             name="user_email" required>
          </div>
          <div class="form-outline mb-4">
            <label for="user_image" class="form-label">User image</label>
            <input type="file" id="user_image" class="form-control" name="user_image">
          </div>
          <div class="form-outline mb-4">
            <label for="user_password" class="form-label">User password</label>
            <input type="password" id="user_password" class="form-control" placeholder="Enter your password"
            autocomplete="off" name="user_password" required>
          </div>
          <div class="form-outline mb-4">
            <label for="conf_user_password" class="form-label">Confirm password</label>
            <input type="password" id="conf_user_password" class="form-control" placeholder="Confirm your password"
            autocomplete="off" name="conf_user_password" required>
          </div>
          <div class="form-outline mb-4">
            <label for="user_address" class="form-label">Address</label>
            <input type="text" id="user_address" class="form-control" placeholder="Enter your address"
            autocomplete="off" name="user_address" required>
          </div>
          <div class="form-outline mb-4">
            <label for="user_contact" class="form-label">Contact</label>
            <input type="text" id="user_contact" class="form-control" placeholder="Enter your contact"
            autocomplete="off" name="user_contact" required>
          </div>
          <div class="mt-4 pt-2">
            <input type="submit" value="Register" class="bg-info py-2 px-3 border-0" name="user_register">
            <p class="small fw-bold mt-2 pt-1">Already have an account?<a href="user_login.php"> Login</a></p>
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
  $conf_user_password=$_POST['conf_user_password'];
  $user_address=$_POST['user_address'];
  $user_contact=$_POST['user_contact'];
  $user_image=$_FILES['user_image']['name'];
  $user_image_tmp=$_FILES['user_image']['tmp_name'];
  $user_ip=getIPAddress();

  $select_query="select * from `user_table` where username='$user_username' or user_email='$user_email'";
  $result=mysqli_query($con,$select_query);
  $rows_count=mysqli_num_rows($result);
  if($rows_count>0){
    echo "<script>alert('Username and Email already exists!')</script>";
  }else if($user_password!=$conf_user_password){
    echo "<script>alert('passwords dont match')</script>";
  }else{
    move_uploaded_file($user_image_tmp,"./user_image/$user_image");
    $insert_query="insert into`user_table` (username,user_email,user_password,user_image,user_ip,user_address,user_mobile) values ('$user_username', 
    '$user_email','$hash_password','$user_image','user_ip','$user_address','$user_contact')";
    $sql_execute=mysqli_query($con,$insert_query);
  }

  if($sql_execute){
    echo "<script>alert('Data inserted successfully')</script>";
  }else{
    die(mysqli_error($con));
  }

$select_cart_items="select * from `cart_details` where ip_address='$user_ip'";
$result_cart=mysqli_query($con,$select_cart_items);
$rows_count=mysqli_num_rows($result_cart);
if($rows_count>0){
  $_SESSION['username']=$user_username;
  echo "<script>alert('You have items in your cart')</script>";
  echo "<script>window.open('checkout.php','_self')</script>";
}else{
  echo "<script>window.open('../index.php','_self')</script>";
}
}
?>