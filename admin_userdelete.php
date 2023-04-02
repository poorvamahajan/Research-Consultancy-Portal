<?php
include "config.php";

    if(ISSET($_GET['id'])){
        require_once 'config.php';
        $id = $_GET['id'];
    $sql="Delete from user WHERE id=:id";
    $result=$conn->prepare($sql);
    $result->bindParam(':id', $id, PDO::PARAM_INT);
    $id=$_REQUEST['id'];
    $result->execute();
  echo "<script type='text/javascript'>alert('Row Deleted Successfully with $id');</script>";
  

    // echo $result->rowCount()."Row Deleted Successfully";
    unset($result);
    header("location:admin_userEdit.php");  
}

// if(isset($_REQUEST['update'])){
//     // header("location:update2.php");
//     // exit();



?>
  













