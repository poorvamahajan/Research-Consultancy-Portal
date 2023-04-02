<?php

session_start();

include_once "config.php";
if(isset($_POST['register'])) {
   
    // Count total files
    $countfiles = count($_FILES['files']['name']);
    
    // Prepared statement
    $query = "INSERT INTO professor (name, password, email,phoneno,degree,imagename,image) VALUES(?,?,?,?,?,?,?)";
   
    $statement = $conn->prepare($query);
   
    // Loop all files
    for($i = 0; $i < $countfiles; $i++) {
   
        // File name
        $filename = $_FILES['files']['name'][$i];
       
        // Location
        $target_file = 'upload/'.$filename;
       
        // file extension
        $file_extension = pathinfo(
            $target_file, PATHINFO_EXTENSION);
              
        $file_extension = strtolower($file_extension);
       
        // Valid image extension
        $valid_extension = array("png","jpeg","jpg");
       
        if(in_array($file_extension, $valid_extension)) {
   
            // Upload file
            if(move_uploaded_file(
                $_FILES['files']['tmp_name'][$i],
                $target_file)
            ) {
  
                $name = !empty($_POST['name']) ? trim($_POST['name']) : null;
                $password = !empty($_POST['password']) ? trim($_POST['password']) : null;
                $email = !empty($_POST['email']) ? trim($_POST['email']) : null;
                $phoneno = !empty($_POST['phoneno']) ? trim($_POST['phoneno']) : null;
                $degree = !empty($_POST['degree']) ? trim($_POST['degree']) : null;
                // Execute query
                $statement->execute(
                    array($name,$password,$email,$phoneno,$degree,$filename,$target_file));
                    

            }
        }
    }
}
   
    
    ?>

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <!-- <link rel="stylesheet" href="register.css"> -->
        <link rel="stylesheet" href="new.css">
        <title>Register</title>
    </head>
  <body style="background-image: url('upload/pregister1.gif');
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
                <li><a href="#">About</a></li>
                <li><a href="#">Services</a></li>
                <li><a href="#">Contact us</a></li>
                   <li> <input type="text" name="search" style = "position:absolute; top:12px;" id="search"  placeholder="Search this website"></li>
                </div>
            </ul>
        </div>
       
    <div class="login-page" style="margin-top:-100px; float:right; margin-right:100px">
      <div class="form">
        <div class="login">
          <div class="login-header">
            <h3>Registration</h3>
            
          </div>
        </div>
        <form   action="professorregister.php" <form name="myform" onsubmit="return(validate());"   action="investorregister.php" method="post" class="login-form" enctype='multipart/form-data'> 
        
          <input type="text" name="name" placeholder="Username"/>
          <input type="password" name="password" placeholder="Password"/>
          <input type="password" name="confirmpassword" placeholder="Confirm Password"/>
          <input type="text" name="email" placeholder="Email"/>
          <input type="text" name="phoneno" placeholder="Contact No."/>
          <input type="text" name="degree" placeholder="Highest Degree"/>
          <input type='file'  name='files[]' multiple  />
        
          <button name="register">register</button>
          <!-- <input type="submit" name="register" value="Register"/></button> -->
          <a class="link" href="professorlogin.php"> Already Registered?</a>
          </form>
          <script src="validate.js">
              
          </script>
      </div>
       
    </div>
</body>
</html>