<?php

session_start();

include_once "config.php";


if(isset($_POST['register'])) {
   
    // Count total files
    // Prepared statement

    $query = "SELECT * FROM investor WHERE investoremail = :investoremail";  
    $statement = $conn->prepare($query);  
    $statement->execute(  
         array(  
              'investoremail'     =>     $_POST["email"] 
         )  
    );  
    $count = $statement->rowCount();  
    if($count > 0)  
    {  
        echo "<script>alert('Already added your data!')</script>";
        echo "<script>window.location='main2.php'</script>";
    }
    else{
    $query = "INSERT INTO investor (investorname, investoremail,investorphoneno,details) VALUES(?,?,?,?)";
   
    $statement = $conn->prepare($query);
   
    // Loop all files
    
  
                $investorname = $_POST['name'];
                // !empty($_POST['name']) ? trim($_POST['name']) : null;
                $investoremail = $_POST['email'];
                //  !empty($_POST['investoremail']) ? trim($_POST['investoremail']) : null;
                $investorphoneno = $_POST['phoneno'];
                // !empty($_POST['investorphoneno']) ? trim($_POST['investorphoneno']) : null;
                $details = $_POST['details'];
                // !empty($_POST['details']) ? trim($_POST['details']) : null;
                // Execute query
                $statement->execute(
                    array($investorname,$investoremail,$investorphoneno,$details));
                    echo "<script>alert('Succesfully added!')</script>";
                    echo "<script>window.location='main2.php'</script>";
                    
                }
}
   
    
    ?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="new.css">
        <!-- <link rel="stylesheet" href="register.css"> -->
        <title>Investor Form</title>
    </head>
  <body style="background-image: url('upload/investor2.gif');
  background-repeat: no-repeat;
  background-size: 750px 500px;
  background-position: 30px 160px;">
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
                    <li><a href="investorList.php">Investor List</a></li>
                    <li><a href="adminlogin.php">Admin</a></li>
                    <li><a href="userregister.php">User</a></li>
                </div>
            </ul>
        </div>
       
    <div class="login-page" style="float:right; margin-top:-40px; margin-right:100px;">
      <div class="form">
        <div class="login">
          <div class="login-header">
            <h3>Investor Form</h3>
            
          </div>
        </div>
        
        <form name="myform" onsubmit="return(validate());"   action="investorregister.php" method="post" class="login-form">
        
          <input type="text" name="name" placeholder="Username"/>
          <input type="text" name="email" placeholder="Email"/>
          <input type="text" name="phoneno" placeholder="Contact No."/>
          <!-- <input type="text" name="details" placeholder="Details"/> -->
          <textarea name="details"0  placeholder="Add Public Comment" cols="45" rows="4"></textarea><br>
          <button name="register">register</button>
          <!-- <input type="submit" name="register" value="Register"/></button> -->
          </form>
          <script src="validate.js">
              
          </script>
      </div>
       
    </div>
</body>
</html>