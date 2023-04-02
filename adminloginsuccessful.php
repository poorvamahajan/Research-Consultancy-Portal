

<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="register.css">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
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
             <li>   </li>
                   <!-- <li> <input type="text" name="search" style = "position:absolute; top:12px;" id="search"  placeholder="Search this website"></li> -->
               
               <!-- <li > <a href="logout.php">Log Out</a>        </li> -->
            <li>   <div style="margin-top: -15px; margin-right:40px; float:right;">
        <?php  
        session_start(); 
         if(isset($_SESSION["adminname"]))
           {      
            // echo "ADMIN::"; 
                // echo '<u><h4> ADMIN:: '.$_SESSION["adminname"].'    </h4></u>'; 
                // echo "<script type='text/javascript'>alert('Hello');</script>";
                $myMessage= addslashes($_SESSION["adminname"]);
  echo "<script type='text/javascript'>alert(' Welcome $myMessage');</script>";
  unset($_SESSION["myMessage"]);

                
           }  
              ?>  
        </div></li>
        <li style=" margin-top: -2px; border:white; border: width 0.25em; border-style:double;  margin-right:40px; float:right;"><a href="logout.php">Log Out</a>  </li>
        <!-- style="border:white; border-width:1px; border-style:inset; margin: 10px;padding: 10px;" -->
                  
                </div>
                
            </ul>
            
        </div>
      <!-- <div class="form" style="float:left;margin-top: 40px;margin-left:40px; width: 170px; height: 8px;">
         <h3  style="float:left;margin-top: -10px;">  User </h3> <a href="#"><i class="far fa-edit"  style="color:black;float:right;margin-top: -9px;"></i> </a>
    </div>

    <div class="form" style="float:right;margin-right:850px;margin-top: 40px; width: 170px; height: 8px;">
         <h3  style="float:left;margin-top: -10px;">  User </h3> <a href="#"><i class="far fa-edit"  style="color:black;float:right;margin-top: -9px;"></i> </a>
    </div>

    <div class="form" style="float:right;margin-right:445px;margin-top: -200px; width: 170px; height: 8px;">
         <h3  style="float:left;margin-top: -10px;">  User </h3> <a href="#"><i class="far fa-edit"  style="color:black;float:right;margin-top: -9px;"></i> </a>
    </div>

    <div class="form" style="float:right;margin-right:40px;margin-top: -200px; width: 170px; height: 8px;">
         <h3  style="float:left;margin-top: -10px;">  User </h3> <a href="#"><i class="far fa-edit"  style="color:black;float:right;margin-top: -9px;"></i> </a>
    </div> -->
</body>
</html>


