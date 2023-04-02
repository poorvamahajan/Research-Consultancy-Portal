<?php      
    // include('config.php');  
    // $name = $_POST['name'];  
    // $password = $_POST['password'];  
      
    //     //to prevent from mysqli injection  
    //     $name = stripcslashes($name);  
    //     $password = stripcslashes($password);  
    //     $name = mysqli_real_escape_string($db, $name);  
    //     $password = mysqli_real_escape_string($db, $password);  
    //     $sql = "select *from adminlogin where name = '$name' and password = '$password'";  
    //     $result = mysqli_query($db, $sql);  
    //     $row = mysqli_fetch_array($result, MYSQLI_ASSOC);  
    //     $count = mysqli_num_rows($result);  
          
    //     if($count == 1){  
    //         echo "<h1><center> Login successful </center></h1>";  
    //     }  
    //     else{  
    //         echo "<h1> Login failed. Invalid name or password.</h1>";  
    //     }     


    include_once('config.php');
   
    function test_input($data) {
          
        $data = trim($data);
        $data = stripslashes($data);
        $data = htmlspecialchars($data);
        return $data;
    }
       
    if ($_SERVER["REQUEST_METHOD"]== "POST") {
          
        $name = $_POST["name"];
        $password = $_POST["password"];
        $query = "select * from user where name=:name and password=:password";
      $stmt = $conn->prepare($query);
      $stmt->bindParam(':name', $name, PDO::PARAM_STR);
      $stmt->bindValue(':password', $password, PDO::PARAM_STR);

      $stmt->execute();
      $count = $stmt->rowCount();
      $row   = $stmt->fetch(PDO::FETCH_ASSOC);
      if($count == 1 && !empty($row)) {
        /******************** Your code ***********************/
       echo "Successfull";       
      }
      else
        echo "unsucceessffuull";








        // $stmt = $conn->prepare("SELECT * FROM user");


        // $stmt->execute();
        // $users = $stmt->fetchAll();
        
        // // foreach($users as $user) {
            
        //     if(($user['name'] == $name) &&
        //         ($user['password'] == $password)) {
        //             // log4j commands
        //             // $log = "Admin accessed successfully";
        //             // logger($log);
    
        //             // header("Location: adminpage.php");
        //             echo "Successful";
        //     }
        //     else {	
        //         echo "Unsuccessful";		
        //             // $log = "Admin access denied";
        //             // logger($log);
    
        //             // echo "<script>
        //             // alert('Invalid Password!');
        //             // window.location.href='finaladminLogin.php';
        //             // </script>";
        //             // die(); 
        //     }
        





        // if($stmt->rowCount()==1)
        // {
        //     echo "Successful!!";
        // }
        // else
        // echo "Unsuccessful!!";

        //echo $result;
            // if(($user['name'] == $name) && 
            //     ($user['password'] == $password)) 
            // if($users){
                
            //         header("Location: poorva.php");

            // }
            // else {
            //     echo "<script language='javascript'>";
            //     echo "alert('WRONG INFORMATION')";
            //     echo "</script>";
            //     echo $result;
            //     // header("Location: poorvam1.php");
            //     die();
            // }
        
    }
    

?>  