<?php
    require_once 'config.php';
 
    if(ISSET($_POST['update'])){
      
            $id = $_GET['id'];
            $name = $_POST['name'];
            $email = $_POST['email'];
          //  $image = $_POST['image'];
          //  $imagename=$_POST['image'];


            
                 
move_uploaded_file($_FILES["image"]["tmp_name"],"upload/" . $_FILES["image"]["name"]);			
// $location1=$_FILES["image"]["name"];
$target_file = 'upload/'.$_FILES["image"]["name"];
$filename=$_FILES["image"]["name"];
 
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$sql = "UPDATE user SET name = '$name', email = '$email', image ='$target_file',imagename='$filename' WHERE id = '$id' ";
// $sql = "UPDATE `user`SET `name` = '$name', `email` = '$email' WHERE `id` = '$id'";
$conn->exec($sql);

echo "<script>alert('Succesfully updated Your account!')</script>";
echo "<script>window.location='userloginsuccess1.php'</script>";

        

    }

?>






   
    



















           
