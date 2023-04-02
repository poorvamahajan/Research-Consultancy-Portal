<?php
    require_once 'config.php';
 
    if(ISSET($_POST['update'])){
        try{
            $pid = $_GET['pid'];
            $name = $_POST['name'];
            $email = $_POST['email'];
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = "UPDATE `professor`SET `name` = '$name', `email` = '$email' WHERE `pid` = '$pid'";
            $conn->exec($sql);
        }catch(PDOException $e){
            echo $e->getMessage();
        }
 
        $conn = null;
 
        echo "<script>alert('Succesfully updated an account!')</script>";
        echo "<script>window.location='admin_professorEditDelete.php'</script>";
    }
?>