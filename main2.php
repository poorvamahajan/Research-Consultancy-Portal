<?php
include "config.php";
if(isset($_POST['Ask'])){
    header("location:index.php");
    exit();
}
if(isset($_POST['btn'])){
    header("location:userRegister.php");
    exit();
}
?>





<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <!-- <link rel="stylesheet" href="register.css"> -->
        <link rel="stylesheet" href="new.css">
        <link rel="stylesheet" href="style.css">
        <!-- <link rel="stylesheet" href="askme.css"> -->
        <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons" />
        <link rel="stylesheet" type="text/css" href="./css/font-awesome.min.css">
        <title>
           index Page 
        </title>
        <script>
    function disableBackButton() {
window.history.forward();
};
</script>
       
    </head>
  <body style="background-image: url('upload/rc2.jpg');
  background-repeat: no-repeat;
  background-size: 750px 500px;
  background-position: 700px 160px;">  
  <!-- -->
  <!-- background-size: 400px 500px; background-position: 1040px 160px;  -->
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

    <li><a href="#">User <i class="icon-chevron-down"></i></a>
        <! – SUB MENU -->

        <ul>

            <li><a href="userlogin.php">User Login</a></li>

            <li><a href="Userregister.php">User Register</a></li>

            </li>

        </ul>

    </li>
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
<!-- 














  <div style="color:white;" class="navbar">
            
            <ul>
                <div class="dropdown">
                    <a class="dropbtn">
                <div class="wrap">
                    <div class="menu"></div>
                    <div class="menu"></div>
                    <div class="menu"></div>
                </a>
            
                <div class="dropdown-content">
                    <a href="userlogin.php">User</a>
                    <a href="professorlogin.php">Professor</a>
                    <a href="adminlogin.php">Admin</a>
                </div>
            </div>
        </div>
        
                <div  class="topnav">
                    <li><a href="main2.php">Home</a></li>
                    <li><a href="howToWriteResearchPaper.html">How To Write Research Paper</a></li>
                    <li><a href="investorregister.php">Investor Form</a></li>
                    <li><a href="investorList.php">Investor List</a></li>
                    <li><a href="adminlogin.php">Admin</a></li>
            <li>        <div class="dropdown">
                    <a class="dropbtn">
                <div class="wrap">
                    User
                </a>
            
                <div class="dropdown-content">
                    <a href="userlogin.php">User</a>
                    <a href="professorlogin.php">Professor</a>
                    <a href="adminlogin.php">Admin</a>
                </div>
            </div>
        </div></li>
                    <li>   </li>
            <li>  
                </div>
            </ul>
        </div>
    </div> -->
<div style="width:25px; height:25px;">
</div>




    
    <form   action="#" method="post" enctype='multipart/form-data' class="login-form">
   <div style="margin-top:250px; margin-left:50px;width: 50%;" >
   <b> <label style="font-size:35px; margin-top:500px;">Want to write a high quality </label></b></br>
      <b><label style="font-size:35px; float:top;">Research Paper?</label></b></br></br>

<input type="submit" style="
  text-transform: uppercase;
  outline: 0;
  background-image: linear-gradient(45deg,#328f8a,#08ac4b);
  width: 100%;
  border: 0;
  padding: 15px;
  color: linear-gradient(45deg,#328f8a,#08ac4b);
  font-size: 14px;
  -webkit-transition: all 0.3 ease;
  transition: all 0.3 ease;
  cursor: pointer;
  margin-top:-40px;
  margin-bottom: -15px; width:200px" value="Get Started?" name="btn">  </br></br>

 <b><a href="professorregister.php" style="font-size:14px; margin-top:50px; color:black;">Nope, I'm a Professor</a>     </b>
    </div>

   
        
        
        
         
         
      </div>
      
    </div>
  <a href="index1.php" style="black"> <span style="font-size:50px; color:black; float:right; margin-top:170px;margin-right:20px;" class="material-icons">
contact_support
</span></a>
    <!-- <button class="btn btn--basic">Basic</button> -->

    <!-- style=" position: fixed; border-radius: 50%; margin-left: 0px; background-image: linear-gradient(45deg,#328f8a,#08ac4b); border: 0px; width: 50px; height: 50px;" -->
   


        </div>      
</form>


</body>
</html>