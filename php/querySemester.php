
<!DOCTYPE html>
<html lang="en">
<head>
     <!--
         Step 6 Project: Implement the frontend and
         backend of your web application
         
         Instructor Schedule DB Group 9
         Author: Roger Diaz
         Date:  2021-11-25
   
         Filename: querySemester.php
   
      -->

    <title> Display all the courses and sections taught in a particular semester </title>
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

/* Display all the courses and sections taught in a particular semester
by executing the sql syntax, and if the execution was succesfull, 
display a html paragraph with the text: "Query Executed Succesfully"
if not, display a html paragraph with the text: "Query Executed Failed"*/
try {
    // Set the sql code for display the query
    $sql= "SELECT CourseId, SectionId, Semester FROM Course_Section WHERE Semester = :semester";  
	$stmnt = $connection->prepare($sql);   
	$stmnt->bindParam(':semester', $_POST['semester']);    

    $stmnt->execute();
    $connection->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);

    $row = $stmnt->fetch();
    if($row) {
        // output data of each row
        echo '<table>';
        echo '<tr> <th>CourseId</th> <th>SectionId</th>  <th>Semester</th> </tr>';
        do {
            echo '<tr><td>' . $row['CourseId'] . '</td><td>' . $row['SectionId'] . '</td><td>' . $row['Semester'] . '</td></tr>';
        }
        while($row = $stmnt-> fetch());
            echo '</table>';
    }
        else {
            echo "<p>There are no records to display</p>";
        }
	echo "<p style='color:green'>Query Executed Successfully</p>";
}
catch (PDOException $err ) {
	echo "<p style='color:red'>Query Executed Failed: " . $err->getMessage() . "</p>\r\n";
}
//End the connection once its done
unset($connection);

 //Display the html div with the text "Select another query"

 echo "<div> <a href='/db_queries.html'>Select another query</a></div>";

  //Display the html div with the text "Return to the home page"

 echo "<div> <a href='/db_index.html'>Return to the home page</a></div>";

?>

</body>
</html>