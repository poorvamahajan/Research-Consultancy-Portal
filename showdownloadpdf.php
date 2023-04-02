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


        <table cellpadding="0" cellspacing="0" border="0" class="table table-striped table-bordered" id="example">
			<thead>
				<tr>
					<th width="90%" align="center">Files</th>
					<th align="center">Action</th>	
				</tr>
			</thead>
			<?php
            include "config.php";
			$query=$conn->query("select * from pdfupload order by id desc");
			while($row=$query->fetch()){
				$filename=$row['filename'];
			?>
			<tr>
				<td>
					&nbsp;<?php echo $filename ;?>
				</td>
				<td>
					<button class="alert-success"><a href="downloadpdf.php?filename=<?php echo $filename;?>&f=<?php echo $row['filename'] ?>">Download</a></button>
				</td>
			</tr>
			<?php }?>
		</table>
        </form>
</body>
  
</html>