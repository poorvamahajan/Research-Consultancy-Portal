
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
    <meta charset="UTF-8">
    <meta name="viewport" content=
    "width=device-width, initial-scale=1.0"> 
    <!-- <link rel="stylesheet" href="viewUser.css">  -->
    <link rel="stylesheet" href="new.css">   
</head>
  
<body>

<!-- style="background-image: url('upload/t2.gif');
  background-repeat: no-repeat;
  background-size: 750px 500px;
  background-position: 820px 170px;" -->

<div class="navbar" style="margin-top:12px">
            
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
            <div class="hdr">
            <!-- <h1>Hello</h1> -->
        </div>
        <div class="topnav">
                    <li><a href="#">Home</a></li>
                    <li><a href="howToWriteResearchPaper.html">How To Write Research Paper</a></li>
                <li><a href="uploadpdf.php">Upload PDF</a></li>
                <li><a href="user_professordetails.php">Professor List</a></li>
                <li><a href="#">Contact Us</a></li>
                <li>   </li> <li>   </li><li>   </li><li>   </li><li>   </li><li>   </li><li>   </li><li>   </li>
            <li>   <div style="margin-top: -15px; margin-right:40px; float:right;">
        
        </div></li>
        <li style=" margin-top: -2px;   margin-right:5px; float:right;"><a style="margin-right:25 px;" href="logout.php">Log Out</a>  </li>
    
            </div>
            </ul>
        </div>

        <form   action="viewimage.php" method="post" enctype='multipart/form-data' class="login-form">





    <?php
      if(ISSET($_GET['pid'])){
        include "config.php";
        $pid = $_GET['pid'];
    $stmt = $conn->prepare("select * from professor where pid=$pid");
    $stmt->execute();
    $imagelist = $stmt->fetchAll();
  

//$conn = null;
echo "</table>";
    foreach($imagelist as $image) {
    ?>
         <img src="<?=$image['image']?>" 
        title="<?=$image['name'] ?>" 
       style="width:400px; height: 400px;border-radius: 50%; margin-left:100px; margin-top:70px;" >
       <div  style=" margin-top :-250px;margin-left :600px; ">
         
        <label style="font-size:40px; ">Prof. <?=$image['name']?></label> </br>
        <label style="font-size:20px; ">Degree: <?=$image['degree']?> from <?=$image['university']?> </label> </br>
        <label style="font-size:20px; ">Currently working at <?=$image['workingat']?>,</br> working as <?=$image['workingas']?> </label> </br>
        <label style="font-size:20px; ">Contact Details</label>
        <label style="font-size:15px; ">Email: <?=$image['email']?></label>
        <label style="font-size:15px; ">Contact Number<?=$image['phoneno']?></label></br>
        <label style="font-size:20px; "> LinkedIn: </label></br>
        <?php if($image['approve'] == "Accepted"){?>
        <b><label style="font-size:20px; color:blue;">Verified </label><b>
        <?php }
        else if($image['approve'] == "Rejected"){?>
        <b><label style="font-size:20px; color:red;">Blocked</label><b>
        <?php  } ?>
       
    </div>
    <?php
    }}
    ?> 
    </form>
    
</div>
</body>
  
</html>