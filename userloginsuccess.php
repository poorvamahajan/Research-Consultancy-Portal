
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
       
?>
<!DOCTYPE html>
<html>
    <head>
        <meta charset="UTF-8">
        <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <!-- <link rel="stylesheet" href="register.css"> -->
        <link rel="stylesheet" href="new.css">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">
        <title>Register</title>
    </head>
  <body >
  <!-- style="background-image: url('upload/loginsuccessful1.jpg');
  background-repeat: no-repeat;
  background-size: 1050px 750px;
  background-position: center;"> -->
  <script>
      prompt('Hey are you sure?')
  </script>
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
                <li><a href="uploadpdf.php">Upload PDF</a></li>
                <li><a href="professordetails.php">Professor List</a></li>
                <li><a href="#">Contact Us</a></li>
                
             <li>   </li>
            <li>   <div style="margin-top: -15px; margin-right:40px; float:right;">
        
        </div></li>
        <li style=" margin-top: -2px; border:white; border: width 0.25em; border-style:double;  margin-right:35px; float:right;"><a style="margin-right:25 px;" href="logout.php">Log Out</a>  </li>

                  
                </div>
                
            </ul>
            
        </div>
        <?php   
        session_start(); 
        include "config.php";
        // $id=$_SESSION["id"];
        if(isset($_SESSION["id"]))
        {     $id=$_SESSION["id"];
        $stmt = $conn->prepare("select * from user WHERE id = $id ");
        $stmt->execute();
        $imagelist = $stmt->fetchAll();
        foreach($imagelist as $image) {
    ?>
    <table style="float:right;" >
        <tr colspan="2">
     <!-- <td rowspan="2"style="margin-top:-15px; float:top;"> <label ><h4><?=$image['name']?></h4></label></td> -->
 <td>   <img src="<?=$image['image']?>" 
        title="<?=$image['name'] ?>" 
        width='150' height='150' style=" border-radius: 50%; float:right; " ></td></tr>
       <tr style=" margin-top: 40px;margin-right:40px;" >
        <a href="userupdate.php?id=<?php echo $image['id']?>" style=" float:right; margin-top: 110px;margin-right:40px;"   >
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
            
			while($row=$query->fetch()){
                $pid=$row['pid'];
				$filename=$row['filename'];
			?>
            <!-- <label ><?=$row['dateuploaded']?></label> -->
            <div style="margin-left: 15px;margin-right: 15px; border-left: 2px solid black;height: 100px;">
         
            
    
            <label style="margin-left: 15px; font-size:20px;">You Uploaded <?php echo $row['filename'] ?> is<label style="margin-left: 15px; color:red;"><?php echo $row['check'] ?></label>  </label>
            </br>
          <u>  <label style="margin-left: 15px;font-size:20px;">Remark: <?php echo $row['remark'] ?>   </label></u>
            <?php
            $query1=$conn->query("select * from professor WHERE `pid` = '$pid'" );
        while($row=$query1->fetch())
        {  
            ?> 

        </br><a style="margin-left: 15px;" href="user_professordetails.php?pid=<?php echo $pid?>"> <label> Checked by Prof.<?=$row['name']?></label> </a>  
        </div>
            
                
            <?php
            }
    
           }
        }  
        ?>
</body>
</html>


