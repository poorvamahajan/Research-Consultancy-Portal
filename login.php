<?php  
 session_start();  
 include "config.php";
 
 try{
      if(isset($_POST["login"]))  
      {  
           if(empty($_POST["name"]) || empty($_POST["password"]))  
           {  
                $message = '<label>All fields are required</label>';  
           }  
           else  
           {  
                $query = "SELECT * FROM user WHERE name = :name AND password = :password";  
                $statement = $conn->prepare($query);  
                $statement->execute(  
                     array(  
                          'name'     =>     $_POST["name"],  
                          'password'     =>     $_POST["password"]  
                     )  
                );  
                $count = $statement->rowCount();  
                if($count > 0)  
                {  
                     $_SESSION["name"] = $_POST["name"];  
                     header("location:loginsuccess.php");  
                }  
                else  
                {  
                     $message = '<label>Wrong Data</label>';  
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
                <li><a href="#">About</a></li>
                <li><a href="#">Services</a></li>
                <li><a href="#">Contact us</a></li>
                   <li> <input type="text" name="search" style = "position:absolute; top:12px;" id="search"  placeholder="Search this website"></li>
                </div>
            </ul>
        </div>
      
    <div class="login-page">
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
                <form   action="login.php" method="post" enctype='multipart/form-data' class="login-form">
        
        <input type="text" name="name" placeholder="Name"/>
        <input type="password" name="password" placeholder="Password"/>
        <!-- <input type="submit" name="login" class="btn btn-info" value="Login" />   -->
        <button name="login">Login</button>
        <!-- <input type="submit" name="login" value="Login"/></button> -->
        <a class="link" href="image.php"> Not Registered yet?</a>
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
       
       
    </div>
</body>
</html>