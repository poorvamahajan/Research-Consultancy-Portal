<?php
    require_once 'config.php';
 
    if(ISSET($_GET['id'])){
        try{
            $id = $_GET['id'];
            $reject="Rejected";
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = "UPDATE `user` SET `approve` = '$reject' WHERE `id` = '$id'";
            $conn->exec($sql);
        }catch(PDOException $e){
            echo $e->getMessage();
        }
 
        $conn = null;
 
        echo "<script>alert('Succesfully updated!')</script>";
        echo "<script>window.location='admin_userApproval.php'</script>";
    }
?>