<?php	
session_start(); 
if (!isset($_SESSION['pid'])) {
    echo "<script type='text/javascript'>alert('Please! Login Again');</script>";
    header("location:professorlogin.php"); 
}
else {
    $now = time(); // Checking the time now when home page starts.

    if ($now > $_SESSION['expire']) {
        session_destroy();
        echo "<script type='text/javascript'>alert('Please! Login Again');</script>";
        header("location:professorlogin.php"); 
    }}
	date_default_timezone_set("Etc/GMT-8");
	require_once 'config.php';
 
	if(ISSET($_POST['upload'])){
		$filename = $_FILES['file']['name'];
		$file_temp = $_FILES['file']['tmp_name'];
		$file_size = $_FILES['file']['size'];
		$filetype = $_FILES['file']['type'];
		$dateuploaded=date("Y-m-d");
		// $topic=$_POST['topic'];
		$location="uploadpdf/".$filename;
        // $id = $_POST['id'];
		// session_start(); 

		$pid = $_SESSION["pid"];
		if($file_size < 9242880){
			if(move_uploaded_file($file_temp, $location)){
				try{
					$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
					$sql = "INSERT INTO `professorupload`(filename, filetype, dateuploaded,  location, pid)  VALUES ('$filename', '$filetype', '$dateuploaded', '$location', '$pid'  )";
					$conn->exec($sql);
					header("location:professor_upload.php");
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
        <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons" />
        <link rel="stylesheet"  href="uploadpdf.css" />
<script>
        function getFile() {
  document.getElementById("upfile").click();
}

function sub(obj) {
  var file = obj.value;
  var fileName = file.split("\\");
  document.getElementById("yourBtn").innerHTML = fileName[fileName.length - 1];
  document.myForm.submit();
  event.preventDefault();
}

</script>

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

    <li><a href="professor_check.php">Review Research Paper </a></li>

    <li><a href="adminlogin.php">Admin</a></li>

    <li><a href="professordetails.php">Professor List</a></li>
    <li><a href="logout.php" style="float:right; margin-left:520px;">logout</a></li>
</ul>

</nav>
</div>
  <!-- style="background-image: url('upload/uploadpdf.gif');
  background-repeat: no-repeat;
  background-size: 750px 500px;
  background-position: 750px 160px;" -->
        <!-- <div class="navbar" style="margin-top:10px;">
            
            <ul>
                <div class="dropdown">
                    <a class="dropbtn">
                <div class="wrap">
                    <div class="menu"></div>
                    <div class="menu"></div>
                    <div class="menu"></div>
    
         <h1>Research Consultancy</h1> -->
</br></br>
    <div class="login-page" style=" float:left; margin-left:140px; margin-top:120px; position:fixed;">
      <div class="form">
        <div class="login">
          <div class="login-header">
            <!-- <p >Upload only PDF File</p> -->
          </div>
        </div>
        <form method="POST" enctype="multipart/form-data" action="professor_upload.php">
				<div class="form-group">
					<?php
					include "config.php";
					// session_start(); 
					  if(isset($_SESSION["id"]))
						{      
			 
							 $id=$_SESSION["id"];
				$query=$conn->query("select * from professorupload");
           $count = $query->rowCount();  
                if($count <= 0)  
                { ?>
                    <b> <label style="margin-top:-10px; color:red;">No Videos Yet</label></b>
						<?php
                }}
				?>
 <center><div id="yourBtn" style="height: 50px; width: 200px;border: 1px dashed #BBB; cursor:pointer;" onclick="getFile()">
<h3 style="margin-top:8px;">Click here to Upload File</h3>
</div></center>
  <!-- this is your file input tag, so i hide it!-->
  <div style='height: 0px;width:0px; overflow:hidden;'><input id="upfile" name="file" type="file" value="upload"/></div>
  <!-- here you can have file submit button or you can write a simple script to upload the file automatically-->
  <!-- <input type="submit" value='upload' > -->


            </br>

                <!-- <label for="fileUpload"><span style="font-size:40px; color:black;" class="material-icons">
check
</span></label>
                <input type="file" id="fileUpload" name="file"> -->
					<!-- <label>Upload here</label> -->
                    <!-- <input type="text" name="id" placeholder="User Id"/> -->
					<!-- <input name="file" type="file"  required="required" class="form-control"> -->
				</div>
				<center><button style="width:200px;" class="btn btn-primary" name="upload">Upload</button></center>
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


<!DOCTYPE html>
<html lang="en">
	<head>
		<meta charset="UTF-8" name="viewport" content="width=device-width, initial-scale=1"/>
	
	</head>
<body style="height:auto;" ng-app="myModule" ng-controller="myController">
	
	<div class="col-md-3"></div>
	<div class="col-md-6 well">
		
		<div class="col-md-3">
			<form method="POST" enctype="multipart/form-data" action="uploadpdf.php">
			
			</form>
		</div>
		<div class="col-md-9">
			<div class="table-responsive">	
            </br>
            </br></br>
            </br>
				<table align="center" style="margin-left:800px;" class="table table-bordered">
					<tbody>
						<?php
							require_once 'config.php';
 
							$sql = "SELECT c.* , p.* FROM professor c,professorupload p WHERE p.pid=c.pid ";
							$query = $conn->prepare($sql);
							$query->execute();
                            
                            
							while($fetch = $query->fetch()){
                                
						?>
 
						<tr>
                        <center>
                        <td>
                            <?php 
                            $mime = $fetch['filetype'];
                            if(strstr($mime, "video/")){
                                ?>
                                <b>  <label style="color:green;font-size:20px;"> Uploaded By Prof.
                                <?php echo $fetch['name']?></label></b>
                            </br>
                        <video width="500" height="300" controls>
                        <source src="<?php echo $fetch['location']?>" type="video/mp4">
                        <source src="mov_bbb.ogg" type="video/ogg">
                         Your browser does not support HTML video.
                         </video>
                         <?php
                           
                            }else if(strstr($mime, "image/")){?>
                                <b>  <label style="color:green;font-size:20px;"> Uploaded By Prof.
                                <?php echo $fetch['name']?></label></b>
                            </br>
                                <img src="<?php echo $fetch['location']?>" style="width: 500px; height: 600px;" alt="Italian Trulli">
                          <?php  }
                          else{?>
                          <b>  <label style="color:green;font-size:20px;"> Uploaded By Prof.
                                <?php echo $fetch['name']?></label></b>
                          <embed
    src="<?php echo $fetch['location']?>"
    type="application/pdf"
    frameBorder="0"
    scrolling="auto"
    height="600px"
    width="100%"
></embed>
<?php
}

                            ?>
                      
                      
                       </td>
                            </center>
						</tr>
 
						<?php
							}
						?>
					</tbody>
				</table>
			</div>	
		</div>
	</div>
</body>	
</html>