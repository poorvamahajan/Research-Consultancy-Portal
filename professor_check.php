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
            include "config.php";
    //    session_start(); 
         if(isset($_SESSION["pid"]))
           {      
               
            $msg=$_SESSION["pid"];
            // echo "ADMIN::"; 
                // echo '<u><h4> ADMIN:: '.$_SESSION["name"].'    </h4></u>'; 
                // echo "<script type='text/javascript'>alert('Hello');</script>";
                $myMessage= addslashes($_SESSION["pid"]);

                $pid=$_SESSION["pid"];
                $query=$conn->query("select * from professor where pid=$pid");
// $row=$query->fetch();

                while($row=$query->fetch()){
                if($row['workingat'] == NULL)
                   { echo "<script type='text/javascript'>alert(' empty');</script>";
                    header("location:professor_additionalinfo.php");
                }
                
           }  }
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
    <li><a href="professor_query.php">Solve Query <i class="icon-chevron-down"></i></a>

    </li>

    <li><a href="professordetails.php">Professor List</a></li>
    <li><a href="professor_upload.php">Upload Files</a></li>
    <li><a href="adminlogin.php">Admin</a></li>
    <li><a href="logout.php" style="float:right; margin-left:470px;">logout</a></li>


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
        </div> -->
        <?php   
            include "config.php";
            if(isset($_SESSION["pid"]))
            {    
                 $pid=$_SESSION["pid"];
                 $_SESSION["pid"]=$pid;
                $stmt = $conn->prepare("select * from professor WHERE pid = $pid ");
                $stmt->execute();
                $imagelist = $stmt->fetchAll();
                foreach($imagelist as $image) {
            ?></br>
            </br></br>
            </br></br></br>
            <table style="float:right;" >
        <tr colspan="2">
    
 <td>   <img src="<?=$image['image']?>" 
        title="<?=$image['name'] ?>" 
        width='150' height='150' style=" border-radius: 50%; margin-top:-70px;margin-right:-10px;float:right; " ></td></tr>
       <tr style=" margin-top: 40px;margin-right:40px;" >
        <a href="professorupdate.php?pid=<?php echo $image['pid']?>" style=" float:right; margin-top: 50px;margin-right:40px;"   >
          <span class="glyphicon glyphicon-edit"></span>
        </a></tr>
    </table>
    <?php
    $_SESSION['pid']=$pid;
    
        }}
   ?>
        <form   action="#" method="post" enctype='multipart/form-data' class="login-form">

        <table cellpadding="15" cellspacing="10" border="5" class="table table-striped table-bordered" style="border-color:transparent;" id="example">
			<thead>
				<tr style="baclground-color:transparent;">
                <th style="padding:10px" align="center">User Name</th>
                <th style="padding:10px" align="center">Topic</th>
					<th style="padding:10px"  align="center">Files</th>
					<th style="padding:10px" align="center">Action</th>
                    <th style="padding:10px" align="center">Status</th>
                    <th style="padding:10px" align="center">Remark</th>
                    <th style="padding:10px" align="center">Action</th>	
				</tr>
			</thead>
			<?php
            include "config.php";
            $query=$conn->query("select * from professor where pid=$pid");
            // $row=$query->fetch();
            
                            while($row=$query->fetch()){
                                if($row['approve'] == "Rejected")
                   { 
                    //    echo "<script type='text/javascript'>alert('Rejected');</script>";
                    ?>
                  <center>  <label style="color:red;font-size:50px">You Are Rejected</label></center>
                    <?php }
                   else if($row['approve'] == "Not Approved Yet")
                    { 
                        // echo "<script type='text/javascript'>alert('Rejected');</script>";
                    ?>
                    <center>  <label style="color:red;font-size:50px">Not Approved Yet</label></center>
                    <?php
                }
// $row=$query->fetch();

          else{
            $query=$conn->query("SELECT c.* , p.* FROM user c,pdfupload p WHERE p.id=c.id ");

			// $query=$conn->query("select * from pdfupload order by id desc");
			while($row=$query->fetch()){
				$filename=$row['filename'];
                $_SESSION["fileid"] = $row['fileid'];
                
                // if()
			?>
			<tr rowspan="5" style="background-color:transparent;">
                <td style="padding:10px"> <label><?=$row['name']?></label>    
            </td>
            <td style="padding:10px;background-color:transparent;">
            <label><?=$row['topic']?></label>
			</td>
			<td style="padding:10px">
            <label><?=$row['filename']?></label>
			</td>
			<td style="padding:10px">
				<a href="downloadpdf.php?filename=<?php echo $filename;?>&f=<?php echo $row['filename'] ?>">
                <span style="font-size:40px; color:black;" class="material-icons">
file_download
</span>
            </a>
			</td>
             <td style="padding:10px"> <label><?=$row['check']?></label>    
            </td>
            <td style="padding:10px"><b> <label style="color:red;"><b><?=$row['remark']?></b></label> </b>   
            </td>
            <td style="padding:10px">
            <button name="update" > <a style="color:black;" href="professor_checkupdate.php?fileid=<?php echo $row['fileid']?>"><span class="glyphicon glyphicon-edit"></span> Change Status</a></button>
            </td>
			</tr>
			<?php }}}?>
		</table>
        </form>
</body>
  
</html>











