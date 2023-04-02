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
        <link rel="stylesheet" type="text/css" href="style.css">
             <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons" />
        <meta charset="UTF-8" name="viewport" content="width=device-width, initial-scale=1"/>
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

            <li><a href="admin_investorEditDelete.php">Edit</a></li>

            <li><a href="admin_investorApproval.php">Approve</a></li>
        </ul>

    </li>
    <li><a href="#">user <i class="icon-chevron-down"></i></a>
        <! – SUB MENU -->

        <ul>

            <li><a href="admin_userEdit.php">Edit</a></li>

            <li><a href="admin_userApproval.php">Approve</a></li>
        </ul>

    </li>

    <li><a href="admin_professor_editDelete.php">Professor Edit <i class="icon-chevron-down"></i></a>
    
    <li><a href="logout.php" style="float:right; margin-left:850px;">logout</a></li>

    

    </li>

</ul>

</nav>
</div>
</br>
                    </br>
                    </br>
                    </br>
                
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


        <div  style=" margin-top :-200px;margin-left :250px;">
               </br>
        <label style="font-size:30px; ">Prof. <?=$row['name']?></label> </br>

        <div style="float:right;margin-right:20px; margin-top:-40px;">

        <a style="margin-top:-250px; margin-left:900px;color:black; font-size:20px;" href="admin_professorApprovalAccept.php?pid=<?php echo $row['pid']?>">
       <span style="font-size:40px; color:black;" class="material-icons">
check
</span></a>
    
         <a style="font-size:20px;margin-left:20px; color:black; " href="admin_professorApprovalReject.php?pid=<?php echo $row['pid']?>">
         <span style="font-size:40px; color:black;" class="material-icons">
close
</span>
        </a>
             







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