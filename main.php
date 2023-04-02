<?php
include "config.php";
if(isset($_POST['Ask'])){
    header("location:index.php");
    exit();
}

?>





<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="register.css">
        <link rel="stylesheet" href="askme.css">
        <title>How To Write Research Paper</title>
    </head>
  <body style="height: 700px;background-image: url('upload/rc2.jpg');background-repeat: no-repeat;  ">
  <!-- background-size: 400px 500px; background-position: 1040px 160px;  -->
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
                    <a href="login.php">User</a>
                    <a href="professorlogin.php">Professor</a>
                    <a href="#">Admin</a>
                </div>
            </div>
        </div>
        
                <div  class="topnav">
                    <li><a href="main.html">Home</a></li>
                    <li><a href="howToWriteResearchPaper.html">How To Write Research Paper</a></li>
                    <li><a href="investorregister.php">Investor Form</a></li>
                    <li><a href="professorRegister.php">Professor</a></li>
                    <li><a href="image.php">User</a></li>
                    <li>   </li>
            <li>   <div style="margin-top: -15px; margin-right:40px; float:right;">
        
        </div></li>
        <li style=" margin-top: -2px; border:white; border: width 0.25em; border-style:double;  margin-right:35px; float:right;"><a style="margin-right:25 px;" href="logout.php">Log Out</a>  </li>

                  
                </div>
                </div>
            </ul>
        </div>
    </div>
    <form   action="#" method="post" enctype='multipart/form-data' class="login-form">

    <!-- <button class="btn btn--basic">Basic</button> -->

    <!-- style=" position: fixed; border-radius: 50%; margin-left: 0px; background-image: linear-gradient(45deg,#328f8a,#08ac4b); border: 0px; width: 50px; height: 50px;" -->
    <div style="margin-top: 550px; margin-right: 200px; margin-left: 1400px; position: sticky;" id="mybutton">
        <button style="position: fixed;border-radius:50%;" id="Ask" name="Ask" class="btn btn--basic"  class="feedback">Ask</button>
        </div>


        


</form>
</body>
</html>