<?php  
session_start();
            include "config.php";
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
    <li><a href="professor_check.php">Review Research Papers <i class="icon-chevron-down"></i></a>

    </li>

    <li><a href="professordetails.php">Professor List</a></li>
    <li><a href="professor_upload.php">Upload Files</a></li>
    <li><a href="adminlogin.php">Admin</a></li>
    <li><a href="logout.php" style="float:right; margin-left:190px;">logout</a></li>


</ul>

</nav>
</div>


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
            ?>
            </br></br></br></br></br></br>
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
        <form method="POST" enctype='multipart/form-data' action="professor_queryreply.php?qid=<?php echo $qid?>">
        <!-- <form   action="#" method="post" enctype='multipart/form-data' class="login-form"> -->

        <table cellpadding="15" cellspacing="10"  class="table table-striped table-bordered" style="border-color:transparent;" id="example">
			
			<?php
            include "config.php";
            
                   
// $row=$query->fetch();

        
            $query=$conn->query("SELECT c.* , p.*, r.* FROM user c,query p, queryreply r WHERE p.id=c.id AND r.qid=p.qid 
            order by r.rid desc ");

			// $query=$conn->query("select * from pdfupload order by id desc");
			while($row=$query->fetch()){
                $qid=$row['qid'];
			?>
            <div style="margin-top:-20px">
            <table>
                <tr><td>
            <b><label style="color:green; margin-left:400px;margin-top:40px; font-size:25px;"><?=$row['name']?></label></b></td></tr>
            <tr><td>
            <label style="color:black; margin-left:400px; font-size:20px;" ><?=$row['query']?></label></td></tr>
            <tr><td>
            <a style="color:blue; margin-left:430px;"  href="professor_queryreply.php?qid=<?php echo $row['qid']?>">Reply</a></td></tr>
            <tr><td>
<?php
            $query3=$conn->query("select * from professor where pid=$pid");
            // $row=$query->fetch();
            
                            while($row3=$query3->fetch()){
                              

?>
<u><label style="color:black; margin-left:450px;">Prof. <?=$row3['name']?></label></u> </td>  </tr>
<tr><td>
<label style="color:black; margin-left:450px;"><?=$row['reply']?></label>
        </td>  </tr>
            </table>  
            <?php }}?> 
            </br>
            </br> 
            </div>
		</table>
        </form>
</body>
</html>