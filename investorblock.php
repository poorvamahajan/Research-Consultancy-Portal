
<html lang="en">
    <head>
        <!-- <link rel="stylesheet" type="text/css" href="adminlogin.css"> -->
        <link rel="stylesheet" type="text/css" href="investorblock.css">
        <meta charset="UTF-8" name="viewport" content="width=device-width, initial-scale=1"/>
    </head>
<body>
<div class="widget">
  
  <ol class="widget-list" id="notyet">
    <li>
      <a class="widget-list-link">
        
      <?php
                    require 'config.php';
                    $approve="Not Approved Yet";
                    $stmt = $conn->prepare("SELECT * FROM investor WHERE approve=?");
$stmt->execute([$approve]);
                    while($row = $stmt->fetch()){
                ?>
       
     <label style="font-size:20px; "> <?=$row['investorname']?></label>
        
                     <!-- <label style="font-size:20px; ">Contact Details</label> -->
                    </br>
        <label style="font-size:15px; ">Email: <?=$row['investoremail']?></label></br>
        <label style="font-size:15px; ">Contact Number: <?=$row['investorphoneno']?></label></br>
        <label style="font-size:20px; ">Details: <?=$row['details']?></label> </br>
        
    
    </br> 
                <?php
                    }
                ?>
      </a>
    </li>
    
  </ol>

  <ol class="widget-list" id="verified">
    <li>
      <a class="widget-list-link">
       
      <?php
                    require 'config.php';
                    $approve="Accepted";
                    $sql = $conn->prepare("SELECT * FROM `investor` ORDER BY `investorname` ASC");
                    $sql->execute();
                    while($row = $sql->fetch()){
                ?>
     <label style="font-size:20px; "> <?=$row['investorname']?></label>
        
                     <!-- <label style="font-size:20px; ">Contact Details</label> -->
                    </br>
        <label style="font-size:15px; ">Email: <?=$row['investoremail']?></label></br>
        <label style="font-size:15px; ">Contact Number: <?=$row['investorphoneno']?></label></br>
        <label style="font-size:20px; ">Details: <?=$row['details']?></label> </br>
        
    
    </br> 
                <?php
                    }
                ?>
      </a>
    </li>
    
  </ol>
  <ol class="widget-list" id="blocked"><li>
      <a class="widget-list-link">

      <?php
                    require 'config.php';
                    $approve="Rejected";
                    $stmt = $conn->prepare("SELECT * FROM investor WHERE approve=?");
$stmt->execute([$approve]); 

                    while($row = $stmt->fetch()){
                ?>

       
     <label style="font-size:20px; "> <?=$row['investorname']?></label>
        
                     <!-- <label style="font-size:20px; ">Contact Details</label> -->
                    </br>
        <label style="font-size:15px; ">Email: <?=$row['investoremail']?></label></br>
        <label style="font-size:15px; ">Contact Number: <?=$row['investorphoneno']?></label></br>
        <label style="font-size:20px; ">Details: <?=$row['details']?></label> </br>
        
    
    </br> 
                <?php
                    }
                ?>
      </a>
                </li>
    
  </ol>
  <ul class="widget-tabs">
    <li class="widget-tab">
      <a href="#blocked" class="widget-tab-link">Blocked Investors</a>
      <!-- Omitting the end tag is valid HTML and removes the space in-between inline blocks. -->
    <li class="widget-tab">
      <a href="#verified" class="widget-tab-link">Verified Investors</a>
    <li class="widget-tab">
      <a href="#notyet" class="widget-tab-link">Pending</a>
  </ul>
</div>
</body>
</html>