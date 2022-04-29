<!DOCTYPE html>
<html lang="en">
<head>
     <!--
         Step 6 Project: Implement the frontend and
         backend of your web application
         
         Instructor Schedule DB Group 9
         Author: Roger Diaz
         Date:  2021-11-25
   
         Filename: connect_server.php
   
      -->

    <title> Connect to the MySQL server </title>
    <link href="/css/phpstyle.css" rel="stylesheet" />  
</head>

<body>

<?php

/* Create variables to hold the server name, username and password (of the default administrator account of the MySQL)*/
$servername = "localhost";
$username = "root";
$password = "";

/* Connect to the MySQL server, which is local, and if the connection was succesfull, display a html paragraph with the text: "Connection was succesfull"
if not, display a html paragraph with the text: "Connection Failed:*/
try {
    $connection = new PDO("mysql:host=$servername", $username, $password);
    $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    echo "<p style='color:green'>Connection was Successful</p>"; 
} catch (PDOException $err) {
    echo "<p style='color:red'>Connection Failed: " . $err->getMessage() . "</p>\r\n"; 
}

//End the connection once its done
unset($connection);

//Display the html div with the text "Return to the home page"
echo "<div><a href='/db_index.html'>Return to the home page</a></div>";

?>

</body>
</html>