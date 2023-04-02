<?php
    require_once 'config.php';
 
    if(ISSET($_POST['update'])){
      
            $pid = $_GET['pid'];
            $name = $_POST['name'];
            $email = $_POST['email'];
            $phoneno = $_POST['phoneno'];
            $degree = $_POST['degree'];
            $university = $_POST['university'];
            $city = $_POST['city'];
            $workingat = $_POST['workingat'];
            $workingas = $_POST['workingas'];
          //  $image = $_POST['image'];
          //  $imagename=$_POST['image'];


            
                 
move_uploaded_file($_FILES["image"]["tmp_name"],"upload/" . $_FILES["image"]["name"]);			
// $location1=$_FILES["image"]["name"];
$target_file = 'upload/'.$_FILES["image"]["name"];
$filename=$_FILES["image"]["name"];
 
$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
$sql = "UPDATE professor SET name = '$name', email = '$email', phoneno=' $phoneno', degree='$degree', university='$university', city='$city' , workingat='$workingat' , workingas='$workingas' , image ='$target_file',imagename='$filename' WHERE pid = '$pid' ";
// $sql = "UPDATE `user`SET `name` = '$name', `email` = '$email' WHERE `id` = '$id'";
$conn->exec($sql);

echo "<script>alert('Succesfully updated Your account!')</script>";
echo "<script>window.location='professor_check.php'</script>";

        

    }

?>






   
    



















           
