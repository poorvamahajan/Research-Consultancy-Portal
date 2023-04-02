<?php	
	date_default_timezone_set("Etc/GMT-8");
	require_once 'config.php';
 
	if(ISSET($_POST['upload'])){
		$filename = $_FILES['file']['name'];
		$file_temp = $_FILES['file']['tmp_name'];
		$file_size = $_FILES['file']['size'];
		$filetype = $_FILES['file']['type'];
		$dateuploaded=date("Y-m-d");
		$topic=$_POST['topic'];
		$location="uploadpdf/".$filename;
        // $id = $_POST['id'];
		session_start(); 

		$id = $_SESSION["id"];
		if($file_size < 9242880){
			if(move_uploaded_file($file_temp, $location)){
				try{
					$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
					$sql = "INSERT INTO `pdfupload`(filename, filetype, dateuploaded, topic, location, id)  VALUES ('$filename', '$filetype', '$dateuploaded','$topic', '$location', '$id')";
					$conn->exec($sql);
					header("location:userloginsuccess1.php");
					echo "<script type='text/javascript'>alert('Pdf Uploaded Successfully');</script>";
				}catch(PDOException $e){
					echo $e->getMessage();
				}
 
				$conn = null;
				// header('location: index.php');
			}
		}else{
			echo "<center><h3 class='text-danger'>File too large to upload!</h3></center>";
		}
	}
?>


<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8" name="viewport" content="width=device-width, initial-scale=1"/>
		<!-- <link rel="stylesheet"  href="adminlogin.css" /> -->
		<link rel="stylesheet"  href="new.css" />
		<link rel="stylesheet"  href="style.css" />
	</head>



  
    
  <body style="background-image: url('upload/uploadpdf.gif');
  background-repeat: no-repeat;
  background-size: 750px 500px;
  background-position: 750px 160px;">
  <div style="margin-top:250px;">
  <nav style="margin-top:-250px">

<ul>
    <! – MAIN MENU -->

    <li><a href="main2.php">Home</a></li>

    <li><a href="useloginsuccess1.php">View Review<i class="icon-chevron-down"></i></a>

    </li>

    <li><a href="professordetails.php">Professor List</a></li>
	<li><a href="user_query.php">Ask Query</a></li>
    <li><a href="uploadpdf.php">Upload Files</a></li>
    <li><a href="#">Guidance <i class="icon-chevron-down"></i></a>
        <! – SUB MENU -->

        <ul>

        <li><a href="user_viewdoc.php">Guidance By Professor</a></li>
        <li><a href="howtowriteresearchpaper.html">How to write Research Paper</a></li>
        </ul>

    </li>
    <li><a href="logout.php" style="float:right; margin-left:420px;">logout</a></li>


</ul>

</nav>
</div>
        <!-- <div class="navbar" style="margin-top:10px;">
            
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
        <!-- </div> -->
        
        <!-- <h1>Research Consultancy</h1> -->
</br>
</br>
</br>

    <div class="login-page" style="position:fixed; float:left; margin-left:140px; margin-top:70px;">
      <div class="form">
        <div class="login">
          <div class="login-header">
            <h3>UPLOAD PDF FILE</h3>
            <!-- <p >Upload only PDF File</p> -->
          </div>
        </div>
        <form method="POST" enctype="multipart/form-data" action="uploadpdf.php">
				<div class="form-group">
					<?php
					include "config.php";
					session_start(); 
					  if(isset($_SESSION["id"]))
						{      
			 
							 $id=$_SESSION["id"];
				$query=$conn->query("select * from pdfupload where id=$id");
           $count = $query->rowCount();  
                if($count <= 0)  
                { ?>
                    <!-- <b> <label style="margin-top:-10px; color:red;">You Haven't Uploaded Anything Yet</label></b> -->
						<?php
                }}
				?>
				<input type="text" name="topic" placeholder="Topic of your Research Paper" required="required"/>
					<!-- <label>Upload here</label> -->
                    <!-- <input type="text" name="id" placeholder="User Id"/> -->
					<input name="file" type="file"  required="required" class="form-control"/>
				</div>
				<center><button class="btn btn-primary" name="upload">Upload</button></center>
			</form>

        </form>
      </div>
    </div>
</body>

</html>






<!-- <body ng-app="myModule" ng-controller="myController">
	
	<div class="col-md-3"></div>
	<div class="col-md-6 well">
		<h3 class="text-primary">PHP - File Upload Usng PDO</h3>
		<hr style="border-top:1px dotted #ccc;">
		<div class="col-md-3">
			<form method="POST" enctype="multipart/form-data" action="uploadpdf.php">
				<div class="form-group">
					<label>Upload here</label>
					<input name="file" type="file"  required="required" class="form-control"/>
				</div>
				<center><button class="btn btn-primary" name="upload">Upload</button></center>
			</form>
		</div>
		<div class="col-md-9">
				
		</div>
	</div>
</body>	 -->
