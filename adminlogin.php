<?php  
 session_start();  
 include "config.php";
 $login_session_duration = 10; 
	$current_time = time(); 
 try{
      if(isset($_POST["login"]))  
      {  
           if(empty($_POST["adminname"]) || empty($_POST["password"]))  
           {  
                $message = '<b><label style="color:red">All fields are required</label></b>';  
           }  
           else  
           {  
                $query = "SELECT * FROM admin WHERE adminname = :adminname AND password = :password";  
                $statement = $conn->prepare($query);  
                $statement->execute(  
                     array(  
                          'adminname'     =>     $_POST["adminname"],  
                          'password'     =>     $_POST["password"]  
                     )  
                );  
                $count = $statement->rowCount();  
                if($count > 0)  
                {  
                     $_SESSION["adminname"] = $_POST["adminname"];  
                     $_SESSION['start'] = time(); // Taking now logged in time.
                     // Ending a session in 30 minutes from the starting time.
                     $_SESSION['expire'] = $_SESSION['start'] + (30 * 60);
                     header("location:admin_userEdit.php");  
                }  
                else  
                {  
                    echo "<script type='text/javascript'>alert('You've Entered Wrong Information');</script>"; 
                }  
           }
      }  
    }
 catch(PDOException $error)  
 {  
      $message = $error->getMessage();  
 }  
 ?>  



 <!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <!-- <link rel="stylesheet" href="register.css"> -->
        <link rel="stylesheet" href="new.css">
        <title>Admin Login</title>
    </head>
  <body style="background-image: url('upload/admin.gif');
  background-repeat: no-repeat;
  background-size: 750px 500px;
  background-position: 700px 160px;">
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
                <li><a href="professorRegister.pp">Professor</a></li>
                <li><a href="userregister.php">User</a></li>
                   <!-- <li> <input type="text" name="search" style = "position:absolute; top:12px;" id="search"  placeholder="Search this website"></li> -->
                </div>
            </ul>
        </div>
      
    <div class="login-page" style=" float:left; margin-left:100px; margin-top:30px;">
      <div class="form">
        <div class="login">
        <div class="login-header">
            <h3>Login</h3>
            
   
           <div class="container" style="width:500px;">  
                <?php  
                if(isset($message))  
                {  
                     echo '<label color="red">'.$message.'</label>';  
                }  
                ?>  
                <form  onsubmit="return(validate());"  action="adminlogin.php" method="post" enctype='multipart/form-data' class="login-form">
        
        <input type="text" name="adminname" placeholder="Name"/>
        <input type="password" name="password" placeholder="Password"/>
        <!-- <input type="submit" name="login" class="btn btn-info" value="Login" />   -->
        <button name="login">Login</button>
        <!-- <input type="submit" name="login" value="Login"/></button> -->
        <!-- </form>
                <form method="post">  
                     <label>Username</label>  
                     <input type="text" name="name" class="form-control" />  
                     <br />  
                     <label>Password</label>  
                     <input type="password" name="password" class="form-control" />  
                     <br />  
                    
                </form>   -->
           </div>  
       
       
    </div></form>
    <script src="validate.js">
              
          </script>
</body>
</html>