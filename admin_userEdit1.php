<?php
    session_start();

    if (!isset($_SESSION['adminname'])) {
        header("location:adminlogin.php"); 
    }
    else {
        $now = time(); // Checking the time now when home page starts.

        if ($now > $_SESSION['expire']) {
            session_destroy();
            header("location:adminlogin.php"); 
        }}
       
?>
<!DOCTYPE html>
<html lang="en">
    <head>
        <!-- <link rel="stylesheet" type="text/css" href="adminlogin.css"> -->
        <link rel="stylesheet" type="text/css" href="new.css">
        <meta charset="UTF-8" name="viewport" content="width=device-width, initial-scale=1"/>
    </head>
<body>
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
                    <li><a href="main2.php">Home</a></li>
                <li><a href="howToWriteResearchPaper.html">How To Write Research Paper</a></li>
                <li><a href="investorregister.php">Investor Form</a></li>
                <li><a href="admin_professorEditDelete.php"> Supervisor</a></li>
                   <!-- <li> <input type="text" name="search" style = "position:absolute; top:12px;" id="search"  placeholder="Search this website"></li> -->
                </div>
                </li>
        <li style=" margin-top: -2px; border:white; border: width 0.25em; border-style:double;margin-top:-40px;  margin-right:35px; float:right;"><a style="margin-right:25px; " href="logout.php">Log Out</a>  </li>
    
                   <!-- <li> <input type="text" name="search" style = "position:absolute; top:12px;" id="search"  placeholder="Search this website"></li> -->
                </div>
            </ul>
        </div>
      
    <div class="login-page">
      <div class="form">
        <div class="login">
        <div class="login-header">
            <h3>Update</h3>
            <?php
                if(ISSET($_GET['id'])){
                    require_once 'config.php';
                    $id = $_GET['id'];
                    $sql = $conn->prepare("SELECT * FROM `user` WHERE `id`='$id'");
                    $sql->execute();
                    $row = $sql->fetch();
                }
            ?>
            <form method="POST" action="admin_userEdit2.php?id=<?php echo $id?>">

            <input type="text" value="<?php echo $row['name']?>" name="name" placeholder="Name"/>
        <input type="text" value="<?php echo $row['email']?>" name="email" placeholder="Email"/>
        <input type="text" value="<?php echo $row['degree']?>" name="degree" placeholder="degree"/>
        <input type="text" value="<?php echo $row['university']?>" name="university" placeholder="university"/>
        <input type="text" value="<?php echo $row['college']?>" name="college" placeholder="college"/>
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