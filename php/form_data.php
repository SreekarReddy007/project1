
<?php
require_once('dbconnect.php');
$fname=$_POST["fname"];
$lname=$_POST["lname"];
$age=$_POST["age"];
$gen=$_POST["gen"];
$dob=$_POST["dob"];
$fp=$_POST["place"];
$email=$_POST["email"];
$pass=$_POST["password"];
$ph=$_POST["mobile"];
$creation_time=date('jS F g:i A');
$last_updated=date('jS F g:i A');
$sql = "INSERT INTO forms (fname, lname, age,gen,dob,place,email,password,mobile,creation_time,last_updated)
VALUES ('$fname', '$lname','$age','$gen','$dob','$fp','$email','$pass','$ph','$creation_time','$last_updated')";

try {
    // use exec() because no results are returned
    $conn->exec($sql);
    //echo "You are now registered successfully";
    }
catch(PDOException $e)
    {
    echo $sql . "<br>" . $e->getMessage();
    }
    header("location: details.php");

?>