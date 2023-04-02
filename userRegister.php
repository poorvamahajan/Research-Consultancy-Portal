<?php

session_start();

include_once "config.php";
if(isset($_POST['register'])) {
   
    // Count total files
    
    // Prepared statement
    $query = "INSERT INTO user (name, password, email) VALUES(?,?,?)";
   
    $statement = $conn->prepare($query);
   
    
                $name = !empty($_POST['name']) ? trim($_POST['name']) : null;
                $password = !empty($_POST['password']) ? trim($_POST['password']) : null;
                $email = !empty($_POST['email']) ? trim($_POST['email']) : null;
                // Execute query
                $statement->execute(
                    array($name,$password,$email));
                    echo "<script type='text/javascript'>alert('Successfully Registered');</script>";
                    echo "<script>window.location='userlogin.php'</script>";

            }
    
    ?>


<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <!-- <link rel="stylesheet" href="register.css"> -->
        <link rel="stylesheet" href="new.css">  <link rel="stylesheet" href="style.css">
        <title>User Registration Form</title>
        
    </head>
  <body style="background-image: url('upload/girl_3.gif');
  background-repeat: no-repeat;
  background-size: 750px 500px;
  background-position: 30px 160px;">
    <div style="margin-top:250px;">
  <nav style="margin-top:-250px">

<ul>
    <! – MAIN MENU -->

    <li><a href="main2.php">Home</a></li>

    <li><a href="#">Investor <i class="icon-chevron-down"></i></a>
        <! – SUB MENU -->

        <ul>

            <li><a href="InvestorRegister.php">Investor Form</a></li>

            <li><a href="investorlist.php">Investor List</a></li>
            <li><a href="howtofund.html">Investor Guidance</a></li>
        </ul>

    </li>

    

            <li><a href="userlogin.php">User Login</a></li>

        
    <li><a href="#">Professor <i class="icon-chevron-down"></i></a>
        <! – SUB MENU -->

        <ul>

            <li><a href="professorlogin.php">Professor Login</a></li>

            <li><a href="professorregister.php">Professor Register</a></li>

            </li>

        </ul>

    </li>

    <li><a href="adminlogin.php">Admin</a></li>

    <li><a href="professordetails.php">Professor List</a></li>

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
                    <li><a href="main2.php">Home</a></li>
                    <li><a href="howToWriteResearchPaper.html">How To Write Research Paper</a></li>
                <li><a href="investorregister.php">Investor Form</a></li>
                <li><a href="userRegister.pp">Professor</a></li>
                <li><a href="#">Contact Us</a></li>
                   <!-- <li> <input type="text" name="search" style = "position:absolute; top:12px;" id="search"  placeholder="Search this website"></li> -->
                <!-- </div>
            </ul>
        </div> --> 
</br></br></br></br></br>
    <div class="login-page" style=" position:fixed; margin-left:850px;margin-top:-50px; float:right; margin-right:100px">
      <div class="form">
        <div class="login">
          <div class="login-header">
            <h3>User Registration Form</h3>
            
          </div>
        </div>
        <form name="myform"  onsubmit="return(validate());"   action="userRegister.php" method="post" enctype='multipart/form-data' class="login-form">
        
          <input type="text" name="name" placeholder="Username"/>
          <input type="password" name="password" id="t1" placeholder="Password"/>
          <input type="password" name="confirmpassword" placeholder="Confirm Password"/>
          <input type="text" name="email" placeholder="Email"/>
          
          <!-- <input type='file'  name='files' multiple  /> -->
          <!-- onclick="test_str()" -->
          <button name="register" >register</button>
          <!-- <input type="submit" name="register" value="Register"/></button> -->
          <a class="link" href="userlogin.php"> Already Registered?</a>
          </form>
          <script src="validate.js">
              
          </script>
      </div>
       
    </div>
</body>
</html>