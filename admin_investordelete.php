<?php
include "config.php";

    if(ISSET($_GET['investorid'])){
        require_once 'config.php';
        $investorid = $_GET['investorid'];
    $sql="Delete from investor WHERE investorid=:investorid";
    $result=$conn->prepare($sql);
    $result->bindParam(':investorid', $investorid, PDO::PARAM_INT);
    $investorid=$_REQUEST['investorid'];
    $result->execute();
  echo "<script type='text/javascript'>alert('Row Deleted Successfully with $investorid');</script>";
  

    // echo $result->rowCount()."Row Deleted Successfully";
    unset($result);
    header("location:admin_investorEditDelete.php");  
}

// if(isset($_REQUEST['update'])){
//     // header("location:update2.php");
//     // exit();



?>
  













