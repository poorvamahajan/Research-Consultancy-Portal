<?php  
    include_once('config.php');
    
  $id=$_POST["id"];
  $name=  $_POST["name"];
  $email=$_POST["email"];
  $sql = "UPDATE user SET name=?, email=? WHERE id=?";
  $stmt= $conn->prepare($sql);
  $stmt->execute([$name, $email,  $id]);
?>



   <html>
   <head>
   <link rel="stylesheet" href="adminlogin.css">
   <title> CSS Login Screen Tutorial </title>
   </head>
   <body>
       
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
               <div class="hdr">
               <!-- <h1>Hello</h1> -->
           </div>
           
                   <div class="topnav">
                       <li><a href="#">Home</a></li>
                   <li><a href="#">About</a></li>
                   <li><a href="#">Services</a></li>
                   <li><a href="#">Contact us</a></li>
                       <input type="text" name="search" id="search" placeholder="Search this website">
                   </div>
               </ul>
           </div>
           <!-- <h1>Research Consultancy</h1> -->
       <div class="login-page">
         <div class="form">
           <div class="login">
             <div class="login-header">
               <h3>UPDATE</h3>
               <p>Please enter your credentials to login.</p>
             </div>
           </div>
           <form action="update2.php" method="post" class="login-form">
           <input type="text" name="id" type="hidden"  /> 
             <input type="text" name="name" placeholder="username"/>
             <input type="text" name="email" placeholder="email"/>
             <button>update</button>
   
            <a class="link" href="image.php"> Havent Registered Yet?</a>
           </form>
         </div>
       </div>
   </body>
   </body>
   </html>



