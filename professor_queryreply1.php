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
        $qid = $_GET['qid'];
                    // $_SESSION['pid']=$pid;
                   // $fileid = $_SESSION["fileid"];
                   echo "<script>alert('$rid')</script>";

        try{
            $myMessage= addslashes($_SESSION["pid"]);

             
            //  echo "<script type='text/javascript'>alert('$pid ');</script>";
            $rid=$_SESSION['rid'];

            // $pid = $_SESSION['pid'];
            $reply = $_POST['reply'];
            $pid=$_SESSION['pid'];
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
            $sql = "UPDATE `queryreply` SET `reply` = '$reply'  WHERE `rid` = '$rid'";
            $conn->exec($sql);
            $sql = "UPDATE `query` SET `pid` = '$pid'  WHERE `qid` = '$qid'";
            $conn->exec($sql);

        }catch(PDOException $e){
            echo $e->getMessage();
        }
 
        $conn = null;
 
        echo "<script>alert('Succesfully updated an account!')</script>";
        echo "<script>window.location='professor_query.php'</script>";
    }
?>