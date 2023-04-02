

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
// $id=$_SESSION['id'];
            $query=$conn->query("SELECT * from query");

			// $query=$conn->query("select * from pdfupload order by id desc");
			while($row=$query->fetch()){
                $qid=$row['qid'];
                $id=$row['id'];
                // $pid=$row['pid'];
                ?>
            <div style="margin-top:-20px">
            <table>
           
            <tr><td>
           
            <label style="color:black; margin-top:40px; margin-left:50px; font-size:20px;" >USER: <?=$row['query']?></label></td></tr>
            <tr><td>
            <a style="color:blue; margin-left:110px;"  href="professor_queryreply.php?qid=<?php echo $row['qid']?>">Reply</a></td></tr>
            <tr><td>
          <?php
          $query1=$conn->query("SELECT * from queryreply where qid='$qid'");

          // $query=$conn->query("select * from pdfupload order by id desc");
          while($row1=$query1->fetch()){
          ?>
<tr><td><label style="color:black; margin-left:110px;">Reply From Professor: <?=$row1['reply']?></label>
        </td>  </tr>
            </table>  
            <?php }}?> 
            </div>
		</table>
        </form>
        





</body>
</html>
















