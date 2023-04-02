

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="register.css">
        <title>Register</title>
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
                    <li><a href="#">Home</a></li>
                    <li><a href="howToWriteResearchPaper.html">How To Write Research Paper</a></li>
                <li><a href="investorregister.php">Investor Form</a></li>
                <li><a href="professorRegister.pp">Professor</a></li>
                <li><a href="image.php">User</a></li>
             <li>   <?php  session_start();  if(isset($_SESSION["name"]))  {       echo '<h4> '.$_SESSION["name"].'</h4>';  echo '<br /><br /><a href="logout.php">Logout</a>';  }  else  {   header("location:login.php");  }  ?>  </li>
                   <!-- <li> <input type="text" name="search" style = "position:absolute; top:12px;" id="search"  placeholder="Search this website"></li> -->
                </div>
            </ul>
        </div>
       
    <div class="login-page">
      <div class="form">
        <div class="login">
        
       
    </div>
</body>
</html>


