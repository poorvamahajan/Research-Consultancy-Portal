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
                    <li><a href="admin_investorEditDelete.php">Investor</a></li>
                <li><a href="admin_investorApproval.php">Investor Approval</a></li>
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
                    $sql = $conn->prepare("SELECT * FROM `professor` ORDER BY `name` ASC");
                    $sql->execute();
                    while($row = $sql->fetch()){
                ?>

<!-- 
                <table>
        <tr>
        <td rowspan="4">  -->
             <img src="<?=$row['image']?>" 
        title="<?=$image['name'] ?>" 
        width='450' height='450' style="width:200px; height:200px; border-radius:50%; margin-left:25px;">


        <div  style=" margin-top :-200px;margin-left :300px;">
                </br>
        <label style="font-size:30px; ">Prof. <?=$row['name']?></label> </br>
        <div style="float:right;margin-right:20px; margin-top:-40px;">
                  
        <a style="margin-top:-250px; margin-left:900px;color:black; font-size:20px;" href="admin_professordelete.php?pid=<?php echo $row['pid']?>">
        <span style="font-size:40px; color:black;" class="material-icons">
        delete
        </span>
    </a>
         <a style="font-size:20px;margin-left:20px; color:black; " href="admin_professoredit1.php?pid=<?php echo $row['pid']?>">
         <span style="font-size:40px; color:black;" class="material-icons">
        edit
        </span></a>
            
    </div>
        <label style="font-size:20px; ">Degree: <?=$row['degree']?> , <?=$row['university']?> </label> </br>
        <label style="font-size:20px; ">Currently working at <?=$row['workingat']?>, working as <?=$row['workingas']?> </label> </br>
        <label style="font-size:20px; ">Contact Details</label>
        <label style="font-size:15px; ">Email: <?=$row['email']?></label>
        <label style="font-size:15px; ">Contact Number: <?=$row['phoneno']?></label></br>
        <label style="font-size:20px; "> LinkedIn: </label></br>
        <?php if($row['approve'] == "Accepted"){?>
        <b><label style="font-size:20px; color:blue;">Verified </label><b>
        <?php }
        else if($row['approve'] == "Rejected"){?>
        <b><label style="font-size:20px; color:red;">Blocked</label><b>
        <?php  }
        else{
            ?><b><label style="font-size:20px; color:yellow;">Not Approved yet </label><b>
            <?php
        } ?> 
    </div>
    </br> </br> </br> </br> </br> </br> 

        
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