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
    <li><a href="#">Professor <i class="icon-chevron-down"></i></a>
        <! – SUB MENU -->

        <ul>

            <li><a href="admin_professorEditDelete.php">Edit</a></li>

            <li><a href="admin_professorApproval.php">Approve</a></li>
        </ul>

    </li>

    <li><a href="#">User Approval <i class="icon-chevron-down"></i></a>
    
    <li><a href="logout.php" style="float:right; margin-left:790px;">logout</a></li>

    

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
                    $sql = $conn->prepare("SELECT * FROM `user` ORDER BY `name` ASC");
                    $sql->execute();
                    while($row = $sql->fetch()){
                ?>

<!-- 
                <table>
        <tr>
        <td rowspan="4">  -->
             <img src="<?=$row['image']?>" 
        title="<?=$image['name'] ?>" 
        width='450' height='250' style="width:200px; height:200px; border-radius:50%; margin-left:25px;">
        <div style=" margin-top :-180px;margin-left :300px;">
        <label style="font-size:25px; "><?=$row['name']?></label> </br>
        <div style="float:right;margin-right:20px; margin-top:-40px;">

        <a style="margin-top:-220px; margin-left:900px;color:black; font-size:20px;" href="admin_userdelete.php?id=<?php echo $row['id']?>">
        <span style="font-size:40px; color:black;" class="material-icons">
        delete
        </span></a>
         <a style="font-size:20px;margin-left:20px; color:black; " href="admin_userEdit1.php?id=<?php echo $row['id']?>">
         <span style="font-size:40px; color:black;" class="material-icons">
        edit
        </span></a>
                 
        
                    </div>
        
        <label style="font-size:20px; "><?=$row['email']?></label></br>
        <label style="font-size:20px; "><b>University: </b><?=$row['university']?></label></br>
        <label style="font-size:20px; "><b>College: </b><?=$row['college']?></label></br>
        <label style="font-size:20px; "><b>Highest Degree: </b><?=$row['degree']?></label></br>
        <label style="font-size:20px; "><b>Stream: </b><?=$row['stream']?></label></br>
       
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