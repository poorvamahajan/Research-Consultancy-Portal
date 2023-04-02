<?php
    require_once 'config.php';
 
    if(ISSET($_GET['pid'])){
        try{
            $pid = $_GET['pid'];
            $reject="Rejected";
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = "UPDATE `professor` SET `approve` = '$reject' WHERE `pid` = '$pid'";
            $conn->exec($sql);
        }catch(PDOException $e){
            echo $e->getMessage();
        }
 
        $conn = null;
 
        echo "<script>alert('Succesfully updated!')</script>";
        echo "<script>window.location='admin_professorApproval.php'</script>";
    }
?>