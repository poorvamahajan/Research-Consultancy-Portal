<?php
    session_start();

    if (!isset($_SESSION['adminname'])) {
        header("location:adminlogin.php"); 
    }
    else {
        $now = time(); // Checking the time now when home page starts.

        if ($now > $_SESSION['expire']) {
            session_destroy();
            header("location:adminlogin.php"); 
        }}
       
?>

<?php
include "config.php";
if(isset($_REQUEST['delete'])){
    $sql="Delete from professor WHERE pid=:pid";
    $result=$conn->prepare($sql);
    $result->bindParam(':pid', $pid, PDO::PARAM_INT);
    $pid=$_REQUEST['pid'];
    $result->execute();
  echo "<script type='text/javascript'>alert('Row Deleted Successfully with $pid');</script>";
  

    // echo $result->rowCount()."Row Deleted Successfully";
    unset($result);
}

// if(isset($_REQUEST['update'])){
//     // header("location:update2.php");
//     // exit();



?>
    



<html lang="en">
    <head>
        <!-- <link rel="stylesheet" type="text/css" href="adminlogin.css"> -->
        <link rel="stylesheet" type="text/css" href="new.css">
        <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons" />
        <meta charset="UTF-8" name="viewport" content="width=device-width, initial-scale=1"/>
    </head>
<body>
<div class="navbar" style="margin-top:20px;">
            
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
                    <li><a href="main2.php">Home</a></li>
                <li><a href="admin_investorApproval.php">Investor Approval</a></li>
                <li><a href="admin_professorEditDelete.php"> Supervisor</a></li>
                <li><a href="admin_professorApproval.php"> Supervisor Approval</a></li>
                <li><a href="admin_userEdit.php">User</a></li>
                <li>   </li>
            <li>   <div style="margin-top: -15px; margin-right:40px; float:right;">
        
        </div></li>
        <li style=" margin-top: -2px; border:white; border: width 0.25em; border-style:double;  margin-right:35px; float:right;"><a style="margin-right:25 px;" href="logout.php">Log Out</a>  </li>
    
                   <!-- <li> <input type="text" name="search" style = "position:absolute; top:12px;" id="search"  placeholder="Search this website"></li> -->
                </div>
            </ul>
        </div>
                
            </thead>
</br>
</br>
                <?php
                    require 'config.php';
                    $sql = $conn->prepare("SELECT * FROM `investor` ORDER BY `investorname` ASC");
                    $sql->execute();
                    while($row = $sql->fetch()){
                ?>

<!-- 
                <table>
        <tr>
        <td rowspan="4">  -->
        <div  style=" margin-top :20px;margin-left :150px;">
        
        <label style="font-size:40px; "> <?=$row['investorname']?></label> </br>

        <div style="float:right;margin-right:20px; margin-top:-40px;">



        <a style="margin-top:-250px; margin-left:1200px;color:black; font-size:20px;" href="admin_investordelete.php?investorid=<?php echo $row['investorid']?>">
        <span style="font-size:40px; color:black;" class="material-icons">
        delete
        </span></a>
        <a style="font-size:20px;margin-left:20px; color:black; " href="admin_investorEdit1.php?investorid=<?php echo $row['investorid']?>">
        <span style="font-size:40px; color:black;" class="material-icons">
        edit
        </span></a>




                    </div>
        <label style="font-size:20px; ">Contact Details</label></br>
        <label style="font-size:15px; ">Email: <?=$row['investoremail']?></label></br>
        <label style="font-size:15px; ">Contact Number: <?=$row['investorphoneno']?></label></br>
        <label style="font-size:20px; ">Details: <?=$row['details']?></label> </br>
        <b><label style="font-size:20px; color:red; "><?=$row['approve']?></label></b> </br>
        
    </div>
    </br> 

        
        <!-- </td></tr>
        
    </td>
    </tr>
    </table> -->






                <?php
                    }
                ?>
            </tbody>
        </table>
    </div>
</body>
</html>