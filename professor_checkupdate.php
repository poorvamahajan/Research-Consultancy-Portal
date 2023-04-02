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
        <link rel="stylesheet" type="text/css" href="style.css">
        <meta charset="UTF-8" name="viewport" content="width=device-width, initial-scale=1"/>
    </head>
<body style="background-image: url('upload/userlogin.gif');
  background-repeat: no-repeat;
  background-size: 850px 600px;
  background-position: -40px 70px;">
  <div style="margin-top:250px;">
  <nav style="margin-top:-250px">

<ul>
    <! – MAIN MENU -->

    <li><a href="main2.php">Home</a></li>

    <li><a href="#">Investor <i class="icon-chevron-down"></i></a>
        <! – SUB MENU -->

        <ul>

            <li><a href="InvestorRegister.php">Investor Form</a></li>

            <li><a href="#">Investor List</a></li>
            <li><a href="#">Investor Guidance</a></li>
        </ul>

    </li>
    <li><a href="professor_query.php">Solve Query <i class="icon-chevron-down"></i></a>

    </li>

    <li><a href="professordetails.php">Professor List</a></li>
    <li><a href="professor_upload.php">Upload Files</a></li>
    <li><a href="adminlogin.php">Admin</a></li>
    <li><a href="logout.php" style="float:right; margin-left:330px;">logout</a></li>


</ul>

</nav>
</div>
<!-- <div class="navbar">
            
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
                <!-- </div>
            </ul>
        </div> -->
        </br></br>  </br></br>  </br></br>
    <div class="login-page" style="margin-top:-20px; float:right; margin-right:110px">
      <div class="form">
        <div class="login">
        <div class="login-header">
            <h3>Update</h3>
            <?php

            
                if(ISSET($_GET['fileid']) || isset($_SESSION["pid"])){
                    require_once 'config.php';
                    // $id = $_GET['id'];
                    $fileid = $_GET['fileid'];
                    // $_SESSION['pid']=$pid;
                   // $fileid = $_SESSION["fileid"];
                    $sql = $conn->prepare("SELECT * FROM `pdfupload` WHERE `fileid`='$fileid'");
                    $sql->execute();
                    $row = $sql->fetch();
                }
            ?>
            <form method="POST" action="professor_checkupdate2.php?fileid=<?php echo $fileid?>">
            </br>
            <!-- <input type="text" value="<?php echo $row['name']?>" name="name" placeholder="name"/> -->
            <select style="width: 360px !important; height: 50px; margin-bottom:16px; " name="maintenance_mode">
        <b>    <option value="<?php echo $row['check']?> "selected><b><?php echo $row['check']?></b></option>    </b>
            <option value="Not Checked">Not Checked</option>
           
            <option value="Checked">Checked</option>
                </select>
            <textarea style="width: 355px !important; margin-right:26px;  " name="remark" value="<?php echo $row['remark']?>"  placeholder="Remark" cols="45" rows="4"></textarea>
        <!-- <input type="submit" name="login" class="btn btn-info" value="Login" />   -->
        <button name="update">Save Changes</button>

                
            </form>
            <?php
                $conn = null;
            ?>
        </div>
    </div>
 
</body>
 
</html>