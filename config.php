<?php      
  

$conn = "";

try {
	$servername = "localhost:3306";
	$dbname = "rs";
	$username = "root";
	$password = "Poorvam14@";

	$conn = new PDO(
		"mysql:host=$servername; dbname=rs",
		$username, $password
	);
    
	
$conn->setAttribute(PDO::ATTR_ERRMODE,
					PDO::ERRMODE_EXCEPTION);
					// echo "CONNECTED";

}
catch(PDOException $e) {
	echo "Connection failed: " . $e->getMessage();
}




?>  