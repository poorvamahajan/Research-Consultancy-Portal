<?php  
 session_start();

 if (!isset($_SESSION['id'])) {
     echo "<script type='text/javascript'>alert('Please! Login Again');</script>";
     header("location:userlogin.php"); 
 }
 else {
     $now = time(); // Checking the time now when home page starts.

     if ($now > $_SESSION['expire']) {
         session_destroy();
         echo "<script type='text/javascript'>alert('Please! Login Again');</script>";
         header("location:userlogin.php"); 
     }}
            include "config.php";
    //    session_start(); 
         if(isset($_SESSION["id"]))
           {      
            // echo "ADMIN::"; 
                // echo '<u><h4> ADMIN:: '.$_SESSION["name"].'    </h4></u>'; 
                // echo "<script type='text/javascript'>alert('Hello');</script>";
                $myMessage= addslashes($_SESSION["id"]);

                $id=$_SESSION["id"];
                $query=$conn->query("select * from user where id=$id");
// $row=$query->fetch();

                while($row=$query->fetch()){
                if($row['stream'] == NULL)
                   { $_SESSION["id"] = $id;
                    header("location:user_additionalinfo.php");
                } 
           }
        //    $query=$conn->query("select * from pdfupload where id=$id");
        //    $count = $query->rowCount();  
        //         if($count <= 0)  
        //         { 
        //                 header("location:uploadpdf.php");
        //                 echo "<script type='text/javascript'>alert(' empty');</script>";
        //         }
        }
              ?>








<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <!-- <link rel="stylesheet" href="register.css"> -->
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <!-- <link rel="stylesheet" href="register.css"> -->
        <link rel="stylesheet" href="new1.css">  <link rel="stylesheet" href="style.css">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
        <title>User Registration Form</title>
    </head>
  <body >


  <div style="margin-top:250px;">
  <nav style="margin-top:-250px">

<ul>
    <! – MAIN MENU -->

    <li><a href="main2.php">Home</a></li>

   
    <li><a href="user_query.php">Ask Query <i class="icon-chevron-down"></i></a>

    </li>

    <li><a href="professordetails.php">Professor List</a></li>
    <li><a href="uploadpdf.php">Upload Files</a></li>
    <li><a href="#">Guidance <i class="icon-chevron-down"></i></a>
        <! – SUB MENU -->

        <ul>

        <li><a href="user_viewdoc.php">Guidance By Professor</a></li>
        <li><a href="howtowriteresearchpaper.html">How to write Research Paper</a></li>
        </ul>

    </li>

    
    <!-- <li><a href="adminlogin.php">Admin</a></li> -->
    <li><a href="logout.php" style="float:right; margin-left:610px;">logout</a></li>


</ul>

</nav>
</div>




  <!-- style="background-image: url('upload/fallingpaper.gif');
  background-repeat: no-repeat;
  background-size: 750px 500px;
  background-position: 900px 170px;" -->
<!-- <div class="navbar" style="margin-top:12px">
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
                <li><a href="uploadpdf.php">Upload PDF</a></li>
                <li><a href="professordetails.php">Professor List</a></li>
                <li><a href="#">Contact Us</a></li>
                
                <!-- <li> <input type="text" name="search" style = "position:absolute; top:12px;" id="search"  placeholder="Search this website"></li> -->
                <!-- <li>   </li>
            <li>   <div style="margin-top: -15px; margin-right:40px; float:right;">
        
        </div></li>
        <li style=" margin-top: -2px;   margin-right:5px; float:right;"><a style="margin-right:25 px;" href="logout.php">Log Out</a>  </li>
    
            </div>
            </ul>
        </div> -->
        <?php   
            // session_start(); 
            include "config.php";
            if(isset($_SESSION["id"]))
            {    
                 $id=$_SESSION["id"];
                $stmt = $conn->prepare("select * from user WHERE id = $id ");
                $stmt->execute();
                $imagelist = $stmt->fetchAll();
                foreach($imagelist as $image) {
            ?>
            </br></br> </br></br> </br></br> </br></br></br>
            <table style="float:right;" >
        <tr colspan="2">
    
 <td>   <img src="<?=$image['image']?>" 
        title="<?=$image['name'] ?>" 
        width='150' height='150' style=" border-radius: 50%; margin-top:-130px;margin-right:10px;float:right; " ></td></tr>
       <tr style=" margin-top: 40px;margin-right:10px;" >
        <a href="userupdate.php?id=<?php echo $image['id']?>" style=" float:right; margin-top: -10px;margin-right:50px;"   >
          <span class="glyphicon glyphicon-edit"></span>
        </a></tr>
    </table>
    <?php
        }}
   ?>
   </br>
    </br></br>
    </br></br>
    </br></br>
    </br>
    

            <?php  
            if(isset($_SESSION["id"]))
            {      
             include "config.php";
            $id=$_SESSION["id"];
          
            $myMessage= addslashes($_SESSION["id"]);
            $query=$conn->query("select * from pdfupload where id=$id order by dateuploaded");
            // $row=$query->fetch();
            
            while($row=$query->fetch()){
                if (!$row) {
                    ?>
                    <b> <label style="margin-left: 15px; font-size:20px;">You haven't uploaded Any Files yet<label></b>
             <?php   }
                else{
               $pid=$row['pid'];
               $filename=$row['filename'];
           ?>

            
            <div class="login-page" style="margin-top:-150px;  ">
                <div class="form"  style="height:auto; width: 1300px; border-radius:2%; margin-left:80px; margin-top:-70px;  float:left " >
                <div class="login">
                <div class="login-header">
                
                
                   
                   <b> <label style="margin-left: 15px; font-size:20px;">You Uploaded <?php echo $row['filename'] ?> on <label style=" color:green;"><?php echo $row['topic'] ?></label> is <label style=" color:red;"><?php echo $row['check'] ?></label>  </label></b>
            </br><b> <label style="margin-left: 15px;font-size:20px;">Remark: <?php echo $row['remark'] ?></label</b> </br>
                    <?php
                         $query1=$conn->query("select * from professor WHERE `pid` = '$pid'" );
                         while($row=$query1->fetch())
                        {  
                    ?> 
               <b><label>  <a style="margin-left: 0px;" href="user_professordetails.php?pid=<?php echo $pid?>"> <label> Checked by Prof.<?=$row['name']?></label> </a></label></b> </td>
                   
               
      
            <?php
            }
    ?> </div></div></div></div><?php
           }}
        }  
        ?>
        	<?php
					include "config.php";
					// session_start(); 
					  if(isset($_SESSION["id"]))
						{      
			 
							 $id=$_SESSION["id"];
				$query=$conn->query("select * from pdfupload where id=$id");
           $count = $query->rowCount();  
                if($count <= 0)  
                { ?>
                 <center>   <b> <label style="font-size:40px; color:red;">You Haven't Uploaded Anything Yet</label></b> </center>
						<?php
                }}
				?>
         
</body>
</html>