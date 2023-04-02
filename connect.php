]

<?php
    mysqli_connect("localhost:3306", "root", "Poorvam14@", "rs");
 
    if(mysqli_connect_error())
        echo "Connection Error.";
    else
        echo "Database Connection Successfully.";
?>