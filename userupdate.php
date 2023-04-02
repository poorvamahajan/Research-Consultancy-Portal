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
        <link rel="stylesheet" type="text/css" href="style.css">
        <meta charset="UTF-8" name="viewport" content="width=device-width, initial-scale=1"/>
    </head>
<body>
<div style="margin-top:250px;">
  <nav style="margin-top:-250px">

<ul>
    <! – MAIN MENU -->

    <li><a href="main2.php">Home</a></li>

    <li><a href="userloginsuccess1.php">View Review</a></li>
    <li><a href="user_query.php">Ask Query <i class="icon-chevron-down"></i></a>

    </li>

    <li><a href="professordetails.php">Professor List</a></li>
    <li><a href="uploadpdf.php">Upload Files</a></li>
    <li><a href="#">Guidance <i class="icon-chevron-down"></i></a>
        <! – SUB MENU -->

        <ul>

        <li><a href="user_viewdoc.php">Guidance By Professor</a></li>
        <li><a href="howtowriteresearchpaper.html">How to write Research Paper</a></li>
        </ul>

    </li>

    
    <!-- <li><a href="adminlogin.php">Admin</a></li> -->
    <li><a href="logout.php" style="float:right; margin-left:400px;">logout</a></li>


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
                <li><a href="professorRegister.pp">Professor</a></li>
                <li><a href="image.php">User</a></li>
                   <!-- <li> <input type="text" name="search" style = "position:absolute; top:12px;" id="search"  placeholder="Search this website"></li> -->
                <!-- </div>
            </ul>
        </div> --> 
      
    <div class="login-page">
      <div class="form">
        <div class="login">
        <div class="login-header">
            <h3>Update Your Data</h3>
            <?php
                if(ISSET($_GET['id'])){
                    require_once 'config.php';
                    $id = $_GET['id'];
                    $sql = $conn->prepare("SELECT * FROM `user` WHERE `id`='$id'");
                    $sql->execute();
                    $row = $sql->fetch();
                }
            ?>
            <form method="POST" action="userupdate2.php?id=<?php echo $id?>"enctype="multipart/form-data">>
            <img src="<?=$row['image']?>" 
        title="<?=$image['imagename'] ?>" 
        width='150' height='150' style=" border-radius: 50%;  " >

            <input type="text" value="<?php echo $row['id']?>" name="id" placeholder="id"/>
            <input type="text" value="<?php echo $row['name']?>" name="name" placeholder="Name"/>
        <input type="text" value="<?php echo $row['email']?>" name="email" placeholder="Email"/>
        
        <input type="file" name="image" ">
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