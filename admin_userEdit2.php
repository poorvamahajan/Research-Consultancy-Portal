<?php
    require_once 'config.php';
 
    if(ISSET($_POST['update'])){
        try{
            $id = $_GET['id'];
            $name = $_POST['name'];
            $email = $_POST['email'];
            $degree = $_POST['degree'];
            $university = $_POST['university'];
            $college = $_POST['college'];
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = "UPDATE `user`SET `name` = '$name', `email` = '$email' WHERE `id` = '$id'";
            $sql1 = "UPDATE `user`SET `degree` = '$degree', `university` = '$university',`college` = '$college'  WHERE `id` = '$id'";
            $conn->exec($sql); $conn->exec($sql1);
        }catch(PDOException $e){
            echo $e->getMessage();
        }
 
        $conn = null;
 
        echo "<script>alert('Succesfully updated an account!')</script>";
        echo "<script>window.location='admin_userEdit.php'</script>";
    }
?>