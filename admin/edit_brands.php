<?php
if(isset($_GET['edit_brands'])){
    $edit_brands=$_GET['edit_brands'];
    $get_brands="select * from `brands` where brand_id=$edit_brands";
    $result=mysqli_query($con, $get_brands);
    $row=mysqli_fetch_assoc($result);
    $brand_title=$row['brand_title'];
}
if(isset($_POST['edit_cat'])){
    $bran_title=$_POST['brand_title'];
    $update_query="update `brands` set brand_title='$bran_title' where brand_id=$edit_brand";
    $result_bran=mysqli_query($con, $update_query);
    if($result_bran){
        echo "<script>alert('brand has been updated successfully')</script>";
        echo "<script>window.alert('./index.php?view_brands','_self')</script>";
    }
}
?>

<div class="container mt-3">
    <h1 class="text-center">Edit Brands</h1>
    <form action='' method="post" >
       <div class="form-outline mb-4 w-50 m-auto">
        <label for="brand_title" class="form-label">Brand Title</label>
        <input type="text" class="form-control" name="brand_title" id="brand_title" required>
        <input type="submit" class="btn btn-info mt-3 px-3" value="Update Brand">
    </div>
    
    </form>
</div>