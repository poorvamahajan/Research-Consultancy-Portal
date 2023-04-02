<?php
include "config.php";
if(isset($_POST['edit'])){
    header("location:update2.php");
    exit();
}

?>
  
<!DOCTYPE html>
<html lang="en">
  
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content=
    "width=device-width, initial-scale=1.0"> 
    <link rel="stylesheet" href="viewimage.css">   
</head>
  
<body>
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
            <div class="hdr">
            <!-- <h1>Hello</h1> -->
        </div>
        
                <div class="topnav">
                    <li><a href="#">Home</a></li>
                <li><a href="#">About</a></li>
                <li><a href="#">Services</a></li>
                <li><a href="#">Contact us</a></li>
                    <input type="text" name="search" id="search" placeholder="Search this website">
                </div>
            </ul>
        </div>

        <form   action="viewimage.php" method="post" enctype='multipart/form-data' class="login-form">





    <?php
      
    $stmt = $conn->prepare("SELECT c.* , p.* FROM user c,pdfupload p WHERE c.id=p.id");
//    $stmt = $dbh->prepare($sql); 
    $stmt->execute();
    $imagelist = $stmt->fetchAll();
  

//$conn = null;
echo "</table>";
    foreach($imagelist as $image) {
    ?>
   <div class="tbl"> 
    <table>
        <tr>
        <td rowspan="4">  <img src="<?=$image['image']?>" 
        title="<?=$image['name'] ?>" 
        width='200' height='200'></td>
         <td>
       <tr> <td> 
       <label><?=$image['id']?></label> 
        <label><?=$image['name']?></label> 
        <tr>  <td> <label><?=$image['email']?></label></td></tr>
        <tr>  <td> <label><?=$image['filename']?></label></td></tr>
        <tr>  <td> <label><?=$image['dateuploaded']?></label></td></tr>
        
        
    </td>
    </tr>
    </table>
    </div>
    <?php
    }
    ?> 
    </form>
</body>
  
</html>