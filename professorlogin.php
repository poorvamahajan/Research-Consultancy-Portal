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
                $query = "SELECT pid, name, password FROM professor WHERE name = :name AND password = :password";  
                $statement = $conn->prepare($query);  
                $statement->execute(  
                     array(  
                         //  'pid'=>$_POST["pid"];
                          'name'     =>     $_POST["name"],  
                          'password'     =>     $_POST["password"]  
                     )  
                );  
               
                $count = $statement->rowCount();  
                if($count > 0)  {
                    $_SESSION["adminname"] = $_POST["adminname"];  
                     $_SESSION['start'] = time(); // Taking now logged in time.
                     // Ending a session in 30 minutes from the starting time.
                     $_SESSION['expire'] = $_SESSION['start'] + (30 * 60);
                         
                $users = $statement->fetchAll();
                
                foreach($users as $user) 
             {  $_SESSION["pid"] = $user['pid'];
               
            //    $_SESSION['start'] = time(); // Taking now logged in time.
            //    // Ending a session in 30 minutes from the starting time.
            //    $_SESSION['expire'] = $_SESSION['start'] + (30 * 60);
               header("location:professor_check.php");
             } 
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
        <!-- <link rel="stylesheet" href="register.css"> -->
        <link rel="stylesheet" href="new.css">
        <title>Admin Login</title>
    </head>
  <body style="background-image: url('upload/plogin1.gif');
  background-repeat: no-repeat;
  background-size: 750px 700px;
  background-position: 710px 80px;">
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
                   <!-- <li> <input type="text" name="search" style = "position:absolute; top:12px;" id="search"  placeholder="Search this website"></li> -->
                </div>
            </ul>
        </div>
      
    <div class="login-page"  style="margin-top:50px; float:left; margin-left:100px">
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
                <form   action="professorlogin.php" method="post" enctype='multipart/form-data' class="login-form">
        
        <input type="text" name="name" placeholder="Name"/>
        <input type="password" name="password" placeholder="Password"/>
        <button name="login">Login</button>
        <a class="link" href="professorRegister.php">Not Registered Yet?</a>
           </div>  
       
       
    </div>
</body>
</html>