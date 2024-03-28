<?php 
if(isset($_GET['delete_brand'])){
    $delete_brand=$_GET['delete_brand'];
    
    $delete_brand="delete from `brands` where brand_id=$delete_brand";
    $result_brand=mysqli_query($con,$delete_brand);
    if($result_brand){
        echo "<script>alert('Brand deleted sucessfully')</script>";
        echo "<script>window.open('./index.php?view_brands','_self')</script>";
    }
}
?>
