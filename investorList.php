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
                    <li><a href="howToWriteResearchPaper.html">How To Write Research Paper</a></li>
                    <li><a href="investorregister.php">Investor Form</a></li>
                    <li><a href="adminlogin.php">Admin</a></li>
                <li>   </li>
            <li>   <div style="margin-top: -15px; margin-right:40px; float:right;">
        
        </div></li>
        
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