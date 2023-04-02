<?php
    require_once 'config.php';
 
    if(ISSET($_POST['update'])){
        try{
            $investorid = $_GET['investorid'];
            $investorname = $_POST['investorname'];
            $investoremail = $_POST['investoremail'];
            $details = $_POST['details'];
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = "UPDATE `investor` SET `investorname` = '$investorname', 
            `investoremail` = '$investoremail' WHERE `investorid` = '$investorid'";
             $sql1 = "UPDATE `investor` SET `details` = '$details' WHERE `investorid` = '$investorid'";
            $conn->exec($sql);
            $conn->exec($sql1);
        }catch(PDOException $e){
            echo $e->getMessage();
        }
 
        $conn = null;
 
        echo "<script>alert('Succesfully updated an account!')</script>";
        echo "<script>window.location='admin_investorEditDelete.php'</script>";
    }
?>