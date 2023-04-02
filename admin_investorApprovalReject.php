<?php
    require_once 'config.php';
 
    if(ISSET($_GET['investorid'])){
        try{
            $investorid = $_GET['investorid'];
            $reject="Rejected";
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = "UPDATE `investor` SET `approve` = '$reject' WHERE `investorid` = '$investorid'";
            $conn->exec($sql);
        }catch(PDOException $e){
            echo $e->getMessage();
        }
 
        $conn = null;
 
        echo "<script>alert('Succesfully updated!')</script>";
        echo "<script>window.location='admin_investorApproval.php'</script>";
    }
?>