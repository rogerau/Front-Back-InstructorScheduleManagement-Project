<!DOCTYPE html>
<html lang="en">
<head>
     <!--
         Step 6 Project: Implement the frontend and
         backend of your web application
         
         Instructor Schedule DB Group 9
         Author: Roger Diaz
         Date:  2021-11-25
   
         Filename: create_db.php
   
      -->

    <title> Create the Instructor Schedule DB</title>
    <link href="/css/phpstyle.css" rel="stylesheet" />  
</head>

<body>
<?php

    /* Create variables to hold the server name, username and password (of the default administrator account of the MySQL), and also the database name*/	
    $servername = "localhost";
	$databasename = "InstructorScheduleDB";
	$username = "root";
	$password = "";

/* Connect to the MySQL server, which is local, and if the connection was succesfull, display a html paragraph with the text: "Connection was succesfull"
if not, display a html paragraph with the text: "Connection Failed:*/

	try {
		$connection = new PDO("mysql:host=$servername", $username, $password);
		$connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		echo "<p style='color:green'>Connection Was Successful</p>";
	} catch (PDOException $err) {
		echo "<p style='color:red'>Connection Failed: " . $err->getMessage() . "</p>";
	}


/* Create the instructor schedule DB by executing the sql syntax, and if the creation was succesfull, display a html paragraph with the text: "Database Created Successfully"
if not, display a html paragraph with the text: "Creation Failed"*/
	try {
		
		// Set the sql code for create the database InstructorScheduleDB
		$sql = "CREATE DATABASE InstructorScheduleDB;";  
		$connection->exec($sql);
        $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		echo "<p style='color:green'>Database Created Successfully</p>";
	} catch (PDOException $err) {
		echo $sql . "<p style='color:red'> Creation Failed: " . $err->getMessage() . "</p>";
	}

//End the connection once its done
	unset($connection);

 //Display the html div with the text "Return to the home page"
    echo "<div> <a href='/db_index.html'>Return to the home page</a></div>";

?>

</body>

</html>