<?php 
if(isset($_GET['delete_category'])){
    $delete_category=$_GET['delete_category'];
    
    $delete_category="delete from `categories` where category_id=$delete_category";
    $result_category=mysqli_query($con,$delete_category);
    if($result_category){
        echo "<script>alert('Category deleted sucessfully')</script>";
        echo "<script>window.open('./index.php?view_categories','_self')</script>";
    }
}
?>