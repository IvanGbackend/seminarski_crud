<?php
include '../connect.php';
if(isset($_GET['id'])){
    $id=$_GET['id'];

    $sql="delete from Pages where id=$id";
    $result=mysqli_query($con,$sql);
    if($result){
        //echo "Deleted successfully";
        header('location: ../pages.php');
    }else{
        die(mysqli_errno($con));
    }
}
?>