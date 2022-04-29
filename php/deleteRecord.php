
<!DOCTYPE html>
<html lang="en">
<head>
     <!--
         Step 6 Project: Implement the frontend and
         backend of your web application
         
         Instructor Schedule DB Group 9
         Author: Roger Diaz
         Date:  2021-11-25
   
         Filename: deleteRecord.php
   
      -->

    <title> Delete records in the Course_Section table </title>
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
	$connection = new PDO("mysql:host=$servername;dbname=$dbname",$username, $password);
	$connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	echo "<p style='color:green'>Connection Was Successful</p>";
}
catch (PDOException $err) {
	echo "<p style='color:red'>Connection Failed: " . $err->getMessage() . "</p>\r\n";
}

/* Delete a record based on the courseid and sectionid of the record to delete 
by preparing and executing the sql syntax, and if the execution was succesfull, 
display a html paragraph with the text: "Record Deleted Succesfully"
if not, display a html paragraph with the text: "Record Deleted Failed"*/
try {
    // Set the sql code for delete records in the table
    $sql= "DELETE FROM " . $dbname .".Course_Section WHERE CourseId = :courseId AND SectionId = :sectionId;";  

	$stmnt = $connection->prepare($sql);   
	$stmnt->bindParam(':courseId', $_POST['courseId']);    
	$stmnt->bindParam(':sectionId', $_POST['sectionId']);   

	$stmnt->execute();
  $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
	echo "<p style='color:green'>Record Deleted Successfully</p>";
}
catch (PDOException $err ) {
	echo "<p style='color:red'>Record Deleted Failed: " . $err->getMessage() . "</p>\r\n";
}
//End the connection once its done
unset($connection);

  //Display the html div with the text "Delete another record"

  echo "<div> <a href='/db_deletedata.html'>Delete another record</a></div>";

  //Display the html div with the text "Return to the home page"

 echo "<div> <a href='/db_index.html'>Return to the home page</a></div>";

?>

</body>
</html>