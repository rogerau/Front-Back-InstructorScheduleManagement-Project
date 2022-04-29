
<!DOCTYPE html>
<html lang="en">
<head>
     <!--
         Step 6 Project: Implement the frontend and
         backend of your web application
         
         Instructor Schedule DB Group 9
         Author: Roger Diaz
         Date:  2021-11-25
   
         Filename: insertValues.php
   
      -->

    <title> Insert values to the Course_Section table </title>
    <link href="/css/phpstyle.css" rel="stylesheet" />  
</head>

<body>


<?php

/* Create variables to hold the server name, username and password (of the default administrator account of the MySQL), and also the database name*/	

$servername ="localhost";
$dbname = "InstructorScheduleDB";
$username = "root";
$password = "";

/* Connect to the MySQL server, which is local, and if the connection was succesfull, display a html paragraph with the text: "Connection was succesfull"
if not, display a html paragraph with the text: "Connection Failed:*/

try {
	$connection = new PDO("mysql:host=$servername;dbname=$dbname",$username, $password );
	$connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	echo "<p style='color:green'>Connection Was Successful</p>";
}
catch (PDOException $err) {
	echo "<p style='color:red'>Connection Failed: " . $err->getMessage() . "</p>\r\n";
}



/* Insert the data entered by the user by preparing and executing the sql syntax, and if the execution was succesfull, 
display a html paragraph with the text: "Data Inserted Into Table Succesfully"
if not, display a html paragraph with the text: "Data Insertion Failed"*/
try {
    // Set the sql code for insert values into the table
    $sql="INSERT INTO Course_Section (CourseId, SectionId, Semester, DeliveryMode, InstructorId)
    VALUES (:courseId, :sectionId, :semester, :deliverymode, :instructorId);";  
	$stmnt = $connection->prepare($sql);   
	$stmnt->bindParam(':courseId', $_POST['courseId']);    
	$stmnt->bindParam(':sectionId', $_POST['sectionId']);   
	$stmnt->bindParam(':semester', $_POST['semester']);
	$stmnt->bindParam(':deliverymode', $_POST['deliverymode']);
	$stmnt->bindParam(':instructorId', $_POST['instructorId']);

	$stmnt->execute();
    $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	echo "<p style='color:green'>Data Inserted Into Table Successfully</p>";
}
catch (PDOException $err ) {
	echo "<p style='color:red'>Data Insertion Failed: " . $err->getMessage() . "</p>\r\n";
}
//End the connection once its done
unset($connection);

 //Display the html div with the text "Insert more Values"

 echo "<div> <a href='/db_insertdata.html'>Insert more values</a></div>";

  //Display the html div with the text "Return to the home page"

 echo "<div> <a href='/db_index.html'>Return to the home page</a></div>";

?>

</body>
</html>