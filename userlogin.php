<?php  
 session_start();  
 include "config.php";
 
 try{
      if(isset($_POST["login"]))  
      {  
           if(empty($_POST["email"]) || empty($_POST["password"]))  
           {  
                $message = '<label>All fields are required</label>';  
           }  
           else  
           {  
                $query = "SELECT * FROM user WHERE email = :email AND password = :password";  
                $statement = $conn->prepare($query);  
                $statement->execute(  
                     array(  
                          'email'     =>     $_POST["email"],  
                          'password'     =>     $_POST["password"]  
                     )  
                );  
                $count = $statement->rowCount();  
                if($count > 0)  
                {  
                    $users = $statement->fetchAll();
                foreach($users as $user) 
             {  $_SESSION["id"] = $user['id'];
                     $_SESSION['start'] = time(); // Taking now logged in time.
                     // Ending a session in 30 minutes from the starting time.
                     $_SESSION['expire'] = $_SESSION['start'] + (30 * 60);
               header("location:userloginsuccess1.php");
             } 
                    //  $_SESSION["name"] = $_POST["name"];  
                    //  header("location:userloginsuccess.php");  
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
        <link rel="stylesheet" href="new.css">  <link rel="stylesheet" href="style.css">
        <title>User Login</title>
        <script src="validate.js">
</script>
    </head>
  <body style="background-image: url('upload/proj.jpg');
  background-repeat: no-repeat;
  background-size: 750px 500px;
  background-position: 700px 160px;">
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

    

            <li><a href="userregister.php">User Registration</a></li>

        
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
                <li><a href="professorRegister.php">Professor</a></li>
                <li><a href="#">Contact Us</a></li>
                   <!-- <li> <input type="text" name="search" style = "position:absolute; top:12px;" id="search"  placeholder="Search this website"></li> -->
                <!-- </div>
            </ul>
        </div> --> 
</br></br></br></br></br></br></br>
    <div class="login-page" style="position:fixed; float:left; margin-left:100px">
      <div class="form">
        <div class="login">
        <div class="login-header">
            <h3>User Login</h3>
            
   
           <div class="container" style="width:500px;">  
                <?php  
                if(isset($message))  
                {  
                     echo '<label style="color:red;">'.$message.'</label>';  
                }  
                ?>  
                <form   action="userlogin.php" method="post" enctype='multipart/form-data' class="login-form">
        
        <input type="text" name="email" placeholder="Email"/>
        <input type="password" name="password" placeholder="Password"/>
        <!-- <input type="submit" name="login" class="btn btn-info" value="Login" />   -->
        <button name="login">Login</button>
        <!-- <input type="submit" name="login" value="Login"/></button> -->
        <a class="link" href="userRegister.php"> Not Registered yet?</a>
        <!-- </form>
                <form method="post" onsubmit="return(validate());">  
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