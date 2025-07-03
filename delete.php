<?php
include 'db.php';
if(isset($_GET['id'])){
    $id=$_GET['id'];

    $sql="DELETE FROM `user` WHERE id=$id";
    $result=mysqli_query($conn, $sql);
    if($result){
        //echo "Deleted successfully";
       header('location:admin_delete_user_account.php');
    }else{
        die(mysqli_error($conn));
    }
}

?>