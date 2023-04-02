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
<html lang="en">
	<head>
		<meta charset="UTF-8" name="viewport" content="width=device-width, initial-scale=1"/>
        <link rel="stylesheet" href="style.css">
	</head>
<body style="height:auto;" ng-app="myModule" ng-controller="myController">
	
<div style="margin-top:250px;">
  <nav style="margin-top:-250px">

<ul>
    <! – MAIN MENU -->

    <li><a href="main2.php">Home</a></li>
    <li><a href="userloginsuccess1.php">View Review <i class="icon-chevron-down"></i></a>

</li>
    
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
    <li><a href="logout.php" style="float:right; margin-left:480px;">logout</a></li>


</ul>

</nav>
</div>





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
            </br></br>
            </br>
				<table align="center" style="margin-left:400px;" class="table table-bordered">
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
                        <video width="700" height="300" controls>
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