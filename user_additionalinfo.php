<?php
    session_start();

    if (!isset($_SESSION['id'])) {
        echo "<script type='text/javascript'>alert('Please! Login Again');</script>";
        header("location:userlogin.php"); 
    }
    else {
        $now = time(); // Checking the time now when home page starts.

        if ($now > $_SESSION['expire']) {
            session_destroy();
            echo "<script type='text/javascript'>alert('Please! Login Again');</script>";
            header("location:userlogin.php"); 
        }}
       
?>

<!DOCTYPE html>
<html lang="en">
    <head>
        <!-- <link rel="stylesheet" type="text/css" href="adminlogin.css"> -->
        <link rel="stylesheet" type="text/css" href="new.css">
        <meta charset="UTF-8" name="viewport" content="width=device-width, initial-scale=1"/>
    </head>
<body style="background-image: url('upload/typing.gif');
  background-repeat: no-repeat;
  background-size: 750px 500px;
  background-position: 800px 160px;">
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
                <li>   </li>
            <li>   <div style="margin-top: -15px; margin-right:40px; float:right;">
        
        </div></li>
        <li style=" margin-top: -2px; border:white; border: width 0.25em; border-style:double;  margin-right:35px; float:right;"><a style="margin-right:25 px;" href="logout.php">Log Out</a>  </li>
    
                   <!-- <li> <input type="text" name="search" style = "position:absolute; top:12px;" id="search"  placeholder="Search this website"></li> -->
                </div>
            </ul>
        </div>
      
    <div class="login-page" style="margin-top:-90px; float:left; margin-left:140px;">
      <div class="form">
        <div class="login">
        <div class="login-header">
            <h3>User Additional Data</h3>
            <?php
                 include "config.php";  
                //  session_start();  
                 if(isset($_SESSION["id"]))
                 {   
                    include "config.php";
                      $id=$_SESSION["id"];  
                   
                    $sql = $conn->prepare("SELECT * FROM `user` WHERE `id`='$id'");
                    $sql->execute();
                    $row = $sql->fetch();
                }
            ?>
            <form method="POST" action="user_additionalinfo2.php?id=<?php echo $id?>"enctype="multipart/form-data">
            <img src="<?=$row['image']?>" 
        title="<?=$image['imagename'] ?>" 
        width='150' height='150' style=" border-radius: 50%;  " >

            <!-- <input type="text" value="<?php echo $row['id']?>" name="id" placeholder="id"/> -->
            <input type="text" value="<?php echo $row['stream']?>" name="stream" placeholder="Stream"/>
            <input type="text" value="<?php echo $row['degree']?>" name="degree" placeholder="Highest Degree"/>
            <input type="text" value="<?php echo $row['university']?>" name="university" placeholder="University"/>
            <input type="text" value="<?php echo $row['college']?>" name="college" placeholder="College Name"/>
    
        <!-- <input type="submit" name="login" class="btn btn-info" value="Login" />   -->
        <button name="update">Add</button>

                
            </form>
            <?php
                $conn = null;
            ?>
        </div>
    </div>
 
</body>
 
</html>