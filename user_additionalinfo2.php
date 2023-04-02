<?php
    require_once 'config.php';
 
    if(ISSET($_POST['update'])){
      
            $id = $_GET['id'];
            $stream = $_POST['stream'];
            $degree = $_POST['degree'];
            $university = $_POST['university'];
            $college = $_POST['college'];
          //  $image = $_POST['image'];
          //  $imagename=$_POST['image'];


            
;
 
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$sql = "UPDATE user SET  stream='$stream',degree='$degree', university='$university', college='$college'   WHERE id = '$id' ";
// $sql = "UPDATE `user`SET `name` = '$name', `email` = '$email' WHERE `id` = '$id'";
$conn->exec($sql);

echo "<script>alert('Succesfully updated Your account!')</script>";
echo "<script>window.location='userloginsuccess1.php'</script>";

        

    }

?>
