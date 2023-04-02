<!--  -->
<!DOCTYPE html>
<html lang="en">
  
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content=
    "width=device-width, initial-scale=1.0"> 
    <!-- <link rel="stylesheet" href="viewUser.css">    -->
    <link rel="stylesheet" href="new.css">   
    <link rel="stylesheet" href="style.css">  
    <title> Professor List </title> 
</head>
  
<body>
<div style="margin-top:250px;">
  <nav style="margin-top:-250px">

<ul>
    <! – MAIN MENU -->

    <li><a href="main2.php">Home</a></li>

    <li><a href="#">Investor <i class="icon-chevron-down"></i></a>
        <! – SUB MENU -->

        <ul>

            <li><a href="InvestorRegister.php">Investor Form</a></li>

            <li><a href="#">Investor List</a></li>
            <li><a href="#">Investor Guidance</a></li>
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

        <form   action="professordetails.php" method="post" enctype='multipart/form-data' class="login-form">




</br>
</br></br>
</br></br>
</br></br>
</br>
    <?php
       include "config.php";
    $stmt = $conn->prepare("select * from professor ");
    $stmt->execute();
    $imagelist = $stmt->fetchAll();
  

//$conn = null;
echo "</table>";
    foreach($imagelist as $image) {
    ?>
         <img src="<?=$image['image']?>" 
        title="<?=$image['name'] ?>" 
       style="width:200px; height: 200px; margin-left:40px;" >
       <div  style=" margin-top :-170px;margin-left :300px;">
         
        <label style="font-size:30px; ">Prof. <?=$image['name']?></label> </br>
        <label style="font-size:20px; ">Degree: <?=$image['degree']?> , <?=$image['university']?> </label> </br>
        <label style="font-size:20px; ">Currently working at <?=$image['workingat']?>, working as <?=$image['workingas']?> </label> </br>
        <label style="font-size:20px; ">Contact Details</label>
        <label style="font-size:15px; ">Email: <?=$image['email']?></label>
        <label style="font-size:15px; ">Contact Number: <?=$image['phoneno']?></label></br>
        <label style="font-size:20px; "> LinkedIn: </label>
    </br>
        <?php if($image['approve'] == "Accepted"){?>
        <b><label style="font-size:20px; color:blue;">Verified </label><b>
        <?php }
        else if($image['approve'] == "Rejected"){?>
        <b><label style="font-size:20px; color:red;">Blocked</label><b>
        <?php  }
        else{
            ?><b><label style="font-size:20px; color:yellow;">Not Approved yet </label><b>
            <?php
        } ?>
    </div>
    </br> </br> </br> </br> </br> </br> 
    <?php
    }

    ?> 
    </form>
    
</div>
</body>
  
</html>