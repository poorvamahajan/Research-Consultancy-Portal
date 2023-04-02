<?php  
            include "config.php";
       session_start(); 
       
if (!isset($_SESSION['pid'])) {
    echo "<script type='text/javascript'>alert('Please! Login Again');</script>";
    header("location:professorlogin.php"); 
}
else {
    $now = time(); // Checking the time now when home page starts.

    if ($now > $_SESSION['expire']) {
        session_destroy();
        echo "<script type='text/javascript'>alert('Please! Login Again');</script>";
        header("location:professorlogin.php"); 
    }}
         if(isset($_SESSION["pid"]))
           {      
            // $msg=$_SESSION["pid"];
            
            // echo "ADMIN::"; 
                // echo '<u><h4> ADMIN:: '.$_SESSION["name"].'    </h4></u>'; 
                // echo "<script type='text/javascript'>alert('Hello');</script>";
                $myMessage= addslashes($_SESSION["pid"]);

                $pid=$_SESSION["pid"];
           }
           
?>




<!DOCTYPE html>
<html lang="en">
    <head>
        <!-- <link rel="stylesheet" type="text/css" href="adminlogin.css"> -->
        <link rel="stylesheet" type="text/css" href="new.css">
        <meta charset="UTF-8" name="viewport" content="width=device-width, initial-scale=1"/>
    </head>
<body style="background-image: url('upload/userlogin.gif');
  background-repeat: no-repeat;
  background-size: 850px 600px;
  background-position: -40px 70px;">
<div class="navbar">
            
            <ul>
                <div class="dropdown">
                    <a class="dropbtn">
                <div class="wrap">
                    <div class="menu"></div>
                    <div class="menu"></div>
                    <div class="menu"></div>
                </a>
            
                <div class="dropdown-content">
                    <a href="#">Home</a>
                    <a href="#">contact us</a>
                </div>
            </div>
        </div>
        
                <div class="topnav">
                    <li><a href="#">Home</a></li>
                <li><a href="howToWriteResearchPaper.html">How To Write Research Paper</a></li>
                <li><a href="investorregister.php">Investor Form</a></li>
                <li><a href="user_professordetails.php">Profile</a></li>
                <li></li> <li></li><li></li><li></li><li></li><li></li><li></li><li></li><li></li><li></li><li></li><li></li><li></li><li></li><li></li><li></li><li></li><li></li><li></li><li></li><li></li><li></li><li></li><li></li><li></li><li></li><li></li><li></li><li></li><li></li><li></li>
                <li style=" margin-top: -2px; border:white; border: width 0.25em;  margin-right:10px; float:right;"><a  href="logout.php">Log Out</a>  </li>
                   <!-- <li> <input type="text" name="search" style = "position:absolute; top:12px;" id="search"  placeholder="Search this website"></li> -->
                </div>
            </ul>
        </div>
      
    <div class="login-page" style="margin-top:-20px; float:right; margin-right:110px">
      <div class="form">
        <div class="login">
        <div class="login-header">
            <h3>Update</h3>
            <?php

            
                if(ISSET($_GET['qid']) || isset($_SESSION["pid"])){
                    require_once 'config.php';
                    // $id = $_GET['id'];
                    $qid = $_GET['qid'];
                    // $_SESSION['pid']=$pid;
                   // $fileid = $_SESSION["fileid"];
                    $sql = $conn->prepare("SELECT * FROM `query` WHERE `qid`='$qid'");
                    $sql->execute();
                    $row = $sql->fetch();
                }
            ?>
            <form method="POST" action="professor_queryreply1.php?qid=<?php echo $qid?>">





            <!-- <input type="text" value="<?php echo $row['name']?>" name="name" placeholder="name"/> -->
            <select style="width: 360px !important; height: 50px; margin-bottom:16px; " name="maintenance_mode">
        <b>    <option value="<?php echo $row['check']?> "selected><b><?php echo $row['check']?></b></option>    </b>
            <option value="Not Checked">Not Checked</option>
           
            <option value="Checked">Checked</option>
            <option value="Incomplete">Incomplete</option>
            <option value="Reupload">Reupload</option>
                </select>
            <textarea style="width: 355px !important; margin-right:26px;" name="reply" value="<?php echo $row['reply']?>"  cols="45" rows="4"></textarea>
        <!-- <input type="submit" name="login" class="btn btn-info" value="Login" />   -->
        
        
        
        <?php
            require_once 'config.php';
                    
                    $qid = $_GET['qid'];
                    // $_SESSION['pid']=$pid;
                   // $fileid = $_SESSION["fileid"];
                   
                   $query = "INSERT INTO queryreply (qid, pid) VALUES(?,?)";
   
                   $statement = $conn->prepare($query);
                  
                   // Loop all files
                   
                               $pid = $_SESSION['pid'];
                               // !empty($_POST['name']) ? trim($_POST['name']) : null;
                              
                               $statement->execute(
                                   array($qid,$pid));
                                   echo "<script>alert('Succesfully added!')</script>";
                                   $query1=$conn->query("SELECT max(rid) as rid FROM queryreply ");
                                //    $query = "SELECT max(rid) FROM queryreply";
                                $test = $query1->fetch(PDO::FETCH_ASSOC);
$_SESSION["rid"]=$test['rid'];
                                  

?>
        
        
        
        
        
        <button name="update">Save Changes</button>

                
            </form>
            <?php
                $conn = null;
            ?>
        </div>
    </div>
 
</body>
 
</html>