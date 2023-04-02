<?php  
            include "config.php";
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

         if(isset($_SESSION["id"]))
           {      
            // $msg=$_SESSION["pid"];
            
            // echo "ADMIN::"; 
                // echo '<u><h4> ADMIN:: '.$_SESSION["name"].'    </h4></u>'; 
                // echo "<script type='text/javascript'>alert('Hello');</script>";
                $myMessage= addslashes($_SESSION["id"]);

                $pid=$_SESSION["id"];
           }
           
?>

<!DOCTYPE html>
<html lang="en">
  
<head>
<title>Professor</title>
    <meta charset="UTF-8">
    <meta name="viewport" content=
    "width=device-width, initial-scale=1.0"> 
    
    <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons" />
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/js/bootstrap.min.js"></script>
        <!-- <link rel="stylesheet" href="register.css"> -->
        <link rel="stylesheet" href="new.css">
        <link rel="stylesheet" href="style.css">
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">  
</head>
  
<body style="height:auto;">

<div style="margin-top:250px;">
  <nav style="margin-top:-250px">

<ul>
    <! – MAIN MENU -->

    <li><a href="main2.php">Home</a></li>

    <li><a href="professor_check.php">Review Research Papers <i class="icon-chevron-down"></i></a>

    </li>

    <li><a href="professordetails.php">Professor List</a></li>
    <li><a href="uploadpdf.php">Upload Files</a></li>
    <li><a href="user_viewdoc.php">Guidance By Professor</a></li>
    <li><a href="logout.php" style="float:right; margin-left:140px;">logout</a></li>


</ul>

</nav>
</div>



<!-- style="background-image: url('upload/paper.gif');
  background-repeat: no-repeat;
  background-size: 750px 500px;
  background-position: center;" -->
<!-- <div class="navbar" style="margin-top:20px;">
            
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
        <!-- </div>
        
                <div class="topnav">
                    <li><a href="main2.php">Home</a></li>
                <li><a href="#">About</a></li>
                <li><a href="professor_upload.php">Upload Videos</a></li>
                <li><a href="#">Services</a></li>
                <li><a href="#">Contact us</a></li>
                <li></li> <li></li><li></li><li></li><li></li><li></li><li></li><li></li><li></li><li></li><li></li><li></li><li></li><li></li><li></li><li></li><li></li><li></li><li></li><li></li><li></li><li></li><li></li><li></li><li></li><li></li><li></li><li></li><li></li><li></li><li></li><li></li><li></li>
                <li style=" margin-top: -2px; border:white; border: width 0.25em;  margin-right:10px; float:right;"><a  href="logout.php">Log Out</a>  </li>
                </div>"
            </ul>
        </div>  -->
        </br></br></br></br>        </br></br></br></br>        </br></br></br></br>         </br></br></br></br>        </br></br></br></br>
        <form method="POST" enctype='multipart/form-data' action="professor_queryreply.php?qid=<?php echo $qid?>">
        <!-- <form   action="#" method="post" enctype='multipart/form-data' class="login-form"> -->
<h1 style="margin-top:-300px; margin-left:50px"> Your Queries </h1>
        <table cellpadding="15"  cellspacing="10" border="5" class="table table-striped table-bordered" style="border-color:transparent; margin-top:-50px;" id="example">
			
			<?php
            include "config.php";
            
                   
// $row=$query->fetch();
$id=$_SESSION['id'];
            $query=$conn->query("SELECT * from query where id='$id'");

			// $query=$conn->query("select * from pdfupload order by id desc");
			while($row=$query->fetch()){
                $qid=$row['qid'];
                // $pid=$row['pid'];
                ?>
            <div style="margin-top:-20px">
            <table>
            
            <tr><td>
            <label style="color:black; margin-top:40px; margin-left:50px; font-size:20px;" ><?=$row['query']?></label></td></tr>
          <?php
          $query1=$conn->query("SELECT * from queryreply where qid='$qid'");

          // $query=$conn->query("select * from pdfupload order by id desc");
          while($row1=$query1->fetch()){
          ?>
<tr><td><label style="color:green; margin-left:50px;">Reply From Professor: <?=$row1['reply']?></label>
        </td>  </tr>
            </table>  
            <?php }}?> 
            </div>
		</table>
        </form>





        <div class="login-page" style="margin-top:-100px; position:fixed; margin-left:850px; margin-right:100px; float:right;">
      <div class="form" style="width:360000px;">
        <div class="login">
        <div class="login-header">
            <h3>Ask query to the professor</h3>
           
            <form method="POST" >

            <?php

            
if( isset($_POST['update'])){
    require_once 'config.php';
    
    // $fileid = $_GET['fileid'];
    // $_SESSION['pid']=$pid;
   // $fileid = $_SESSION["fileid"];
   $query = "INSERT INTO query (query,id) VALUES(?,?)";

   $statement = $conn->prepare($query);
               $query = $_POST['query'];
               $id = $_SESSION['id'];
               // !empty($_POST['name']) ? trim($_POST['name']) : null;
              
               $statement->execute(
                   array($query,$id));
                //    echo "<script>alert('Succesfully!')</scri Uploaded pt>";
                   echo "<script>window.location='user_query.php'</script>";
}
?>
            <textarea style="width: 270px !important; margin-right:26px; 
  height: 150px;
  padding: 12px 20px;
  box-sizing: border-box;
  border: 2px solid #ccc;
  border-radius: 4px;
  background-color: #f8f8f8;
  font-size: 16px;
  resize: none; " name="query"  cols="45" rows="4">Ask Your Query</textarea>
        <!-- <input type="submit" name="login" class="btn btn-info" value="Login" />   -->
      
        <button name="update">Submit</button>

                
            </form>
            <?php
                $conn = null;
            ?>
        </div>
    </div>










</body>
</html>
















