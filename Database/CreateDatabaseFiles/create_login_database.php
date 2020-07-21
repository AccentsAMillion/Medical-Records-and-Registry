<!DOCTYPE html>
    <html>

        <?php
        
        $mysqli = new mysqli('localhost', 'MedicalSystem', 'password');
        if (mysqli_connect_error()) {
        die('Connect Error (' . mysqli_connect_errno() . ') '
                . mysqli_connect_error());
        }
        
        echo 'Success... ' . $mysqli->host_info . "\n";
        
        $sqlDB = "CREATE DATABASE login";
        
        mysqli_select_db($mysqli, "medicalsystem");
       
       $sqlTable = "CREATE TABLE users (
       id INT(11) NOT NULL AUTO_INCREMENT PRIMARY KEY,
       username VARCHAR(20),
       password VARCHAR(20),
      ;
       
       if($mysqli->query($sqlTable) == TRUE){
        echo '<br />';
        echo 'users Table created...';
       } else {
        echo '<br />';
        echo "Error creating table... " . $mysqli->error;
       }

        $mysqli->close();
        
        ?>        
        </html>