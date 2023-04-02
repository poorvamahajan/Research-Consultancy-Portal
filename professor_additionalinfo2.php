<?php
    require_once 'config.php';
 
    if(ISSET($_POST['update'])){
      
            $pid = $_GET['pid'];
            $university = $_POST['university'];
            $city = $_POST['city'];
            $workingat = $_POST['workingat'];
            $workingas = $_POST['workingas'];
          //  $image = $_POST['image'];
          //  $imagename=$_POST['image'];


            
;
 
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$sql = "UPDATE professor SET  university='$university', city='$city' , workingat='$workingat' , workingas='$workingas'  WHERE pid = '$pid' ";
// $sql = "UPDATE `user`SET `name` = '$name', `email` = '$email' WHERE `id` = '$id'";
$conn->exec($sql);

echo "<script>alert('Succesfully updated Your account!')</script>";
echo "<script>window.location='professor_check.php'</script>";

        

    }

?>
