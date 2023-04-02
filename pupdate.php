<?php
include "config.php";
if(isset($_REQUEST['check'])){

    // $id=$_POST['id'];
  

    try {
        // set the PDO error mode to exception
        $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

        $sql = "UPDATE pdfupload SET check='Yes' WHERE id=14";
      
        // Prepare statement
        $stmt = $conn->prepare($sql);
      
        // execute the query
        $stmt->execute();
      
        // echo a message to say the UPDATE succeeded
        echo $stmt->rowCount() . " records UPDATED successfully";
      } catch(PDOException $e) {
        echo $sql . "<br>" . $e->getMessage();
      }







    // $id=$_POST["id"];
    // $check="Yes";
    // // $sql="UPDATE pdfupload SET check='Yes' WHERE id=:id";
    // $result=$conn->prepare("UPDATE pdfupload SET check=:check WHERE id=:id");
    // $result->bindParam(':id', $id, PDO::PARAM_INT);
    // $result->bindParam(':check', $check, PDO::PARAM_STR);
    // $result->execute();
    





}








// if(isset($_REQUEST['update'])){
//     // header("location:update2.php");
//     // exit();



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

        <form   action="professorupdate.php" method="post" enctype='multipart/form-data' class="login-form">


        <table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" id="example">
			<thead>
				<tr>
                <th align="center">Student Name</th>
					<th align="center">File Name</th>	
					<th align="center">Checked</th>
					<th align="center">Action</th>	
				</tr>
			</thead>
			<?php
            session_start();  
            include "config.php";
            
            $sql="SELECT c.* , p.* FROM user c,pdfupload p WHERE c.id=p.id";
            $result=$conn->query($sql);
            if($result->rowCount()>0){
                echo '<table class="tbl1">';
                
                echo "<tbody>";
                while($row=$result->fetch(PDO::FETCH_ASSOC)){ 
                    echo "<tr>";
                    echo "<tr><td>";
                    echo "<td>" .$row["id"]. "</td>";
                    echo "<td>" .$row["name"]. "</td>";
                    echo "<td>" .$row["email"]. "</td>";
                    echo "<td>" .$row["filename"]. "</td>";
                    echo '<td><form action="" method="post" >
                    <input type="hidden" name="id" value=' .$row["id"].'>
                    <input type="submit" name="check" value=' .$row["check"].'>
                 </form></td></tr></td>';
                 echo "</tr>";
                 echo "</tbody>";
                }
            }



            ?>



			
		</table>
        </form>
</body>
  
</html>