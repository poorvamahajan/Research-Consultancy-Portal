<?php
include "config.php";

    if(ISSET($_GET['pid'])){
        require_once 'config.php';
        $pid = $_GET['pid'];
    $sql="Delete from professor WHERE pid=:pid";
    $result=$conn->prepare($sql);
    $result->bindParam(':pid', $pid, PDO::PARAM_INT);
    $pid=$_REQUEST['pid'];
    $result->execute();
  echo "<script type='text/javascript'>alert('Row Deleted Successfully with $pid');</script>";
  

    // echo $result->rowCount()."Row Deleted Successfully";
    unset($result);
    header("location:admin_professorEditDelete.php");  
}

// if(isset($_REQUEST['update'])){
//     // header("location:update2.php");
//     // exit();



?>
  













