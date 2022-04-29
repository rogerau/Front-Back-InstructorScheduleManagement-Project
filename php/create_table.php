<!DOCTYPE html>
<html lang="en">
<head>
     <!--
         Step 6 Project: Implement the frontend and
         backend of your web application
         
         Instructor Schedule DB Group 9
         Author: Roger Diaz
         Date:  2021-11-25
   
         Filename: create_table.php
   
      -->

    <title> Create the Course_Section table </title>
    <link href="/css/phpstyle.css" rel="stylesheet" />  
</head>

<body>

<?php

    /* Create variables to hold the server name, username and password (of the default administrator account of the MySQL), and also the database name*/	

	$servername = "localhost";
	$dbname = "InstructorScheduleDB";
	$username = "root";
	$password = "";

/* Connect to the MySQL server, which is local, and if the connection was succesfull, display a html paragraph with the text: "Connection was succesfull"
if not, display a html paragraph with the text: "Connection Failed:*/

	try {
		$connection = new PDO("mysql:host=$servername;dbname=$dbname", $username, $password);
		$connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		echo "<p style='color:green'>Connection Was Successful</p>";
	} catch (PDOException $err) {
		echo "<p style='color:red'>Connection Failed: " . $err->getMessage() . "</p>\r\n";
	}

/*Create the Course_Section table by executing the SQL syntax, and if the creation was succesfull,
display a html paragraph with the text: "Table Created Successfully"
if not, display a html paragraph with a html paragraph with the text: "Creation Failed"*/

	try {
		// Set the SQL syntax for creating the table Course_Section 
		$sql = "CREATE TABLE Course_Section (
        CourseId INT, 
        SectionId INT, 
        Semester VARCHAR(10), 
        DeliveryMode VARCHAR(15), 
        InstructorId INT, 
        PRIMARY KEY(CourseId, SectionId),
        FOREIGN KEY(CourseId) REFERENCES Course(CourseId) ON DELETE CASCADE,
        FOREIGN KEY(InstructorId) REFERENCES Instructor(InstructorId) ON DELETE SET NULL ON UPDATE CASCADE
        )";
		$connection->exec($sql);
		$connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		echo "<p style='color:green'>Table Created Successfully</p>";
	} catch (PDOException $err) {
		echo "<p style='color:red'>Creation Failed: " . $err->getMessage() . "</p>\r\n";
	}

//End the connection once its done
	unset($connection);

//Display the html div with the text "Return to the home page"
	echo "<div> <a href='/db_index.html'>Return to the home page</a></div>";

	?>

</body>

</html>