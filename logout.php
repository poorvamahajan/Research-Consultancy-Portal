<?php   
 //logout.php  
 session_start();  

 header("location:main2.php");  
 $loggedIn = false;
 session_destroy();  
 ?>  


