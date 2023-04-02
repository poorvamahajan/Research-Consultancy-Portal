<?php
    require_once 'config.php';
    include "config.php";
    session_start(); 
    //   if(isset($_SESSION["pid"]))
    //     {      
    //      // $msg=$_SESSION["pid"];
         
    //      // echo "ADMIN::"; 
    //          // echo '<u><h4> ADMIN:: '.$_SESSION["name"].'    </h4></u>'; 
    //          // echo "<script type='text/javascript'>alert('Hello');</script>";
    //          $myMessage= addslashes($_SESSION["pid"]);

    //          $pid=$_SESSION["pid"];
    //          echo "<script type='text/javascript'>alert('$pid ');</script>";
    //     }
    if(ISSET($_POST['update']) || isset($_SESSION["pid"])){
        try{
            $myMessage= addslashes($_SESSION["pid"]);

             
            //  echo "<script type='text/javascript'>alert('$pid ');</script>";
            $fileid = $_GET['fileid'];
            // $pid = $_SESSION['pid'];
            $value = $_POST['maintenance_mode'];
            $remark = $_POST['remark'];
            $pid=$_SESSION["pid"];
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = "UPDATE `pdfupload` SET `check` = '$value', `remark` = '$remark'  WHERE `fileid` = '$fileid'";
            $conn->exec($sql);
            $sql = "UPDATE `pdfupload` SET `pid` = '$pid' WHERE `fileid` = '$fileid'";
            $conn->exec($sql);

        }catch(PDOException $e){
            echo $e->getMessage();
        }
 
        $conn = null;
 
        echo "<script>alert('Succesfully updated an account!')</script>";
        echo "<script>window.location='professor_check.php'</script>";
    }
?>