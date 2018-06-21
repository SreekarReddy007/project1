<!--<!DOCTYPE html>
<html>
<head>
<meta charset="utf-8">
<title>View Records</title>
<link rel="stylesheet" href="css/style.css" />
</head>
<body>
<div class="form">

<table width="100%" border="1" style="border-collapse:collapse;">
<thead>
<tr>
<th><strong>Id</strong></th>
<th><strong>fname</strong></th>
<th><strong>lname</strong></th>
<th><strong>age</strong></th>
<th><strong>gen</strong></th>
<th><strong>dob</strong></th>
<th><strong>place</strong></th>
<th><strong>email</strong></th>
<th><strong>password</strong></th>
<th><strong>mobile</strong></th>
<th><strong>Edit</strong></th>
<th><strong>Delete</strong></th>
</tr>
</thead>
<tbody>
< ?php 
$servername = "localhost";
$username = "root";
$password = "root@12345";
$dbname = "test";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
} 
$sql = "select * from forms ";
$result = mysqli_query($con,$sql);
if ($result->num_rows > 0) {
    // output data of each row
    while($row = $result->fetch_assoc()) {
        echo "<br>";
        echo '<tr>
              <td> '. $row["iD"]. ' </td> 
              <td> '. $row["fname"]. '</td>
              <td> '. $row["lname"]. '</td>
              <td> '. $row["age"]. '</td>
              <td> '. $row["gen"]. '</td>
              <td>'.$row['dob'].'</td>
              <td> '. $row["place"]. '</td>
              <td>'.$row['email'].'</td>
              <td>'.$row['password'].'</td>
              <td> '. $row["mobile"]. '</td>
             
              </tr>';
    }
}
else {
    echo "0 results";
} ?> */
</tbody>
</table>
</div>
</body>
</html> -->
<?php 
session_start();
?>

<?php
    $conn = mysqli_connect('localhost', 'root', 'root@12345', 'test');
    if (!$conn) {
	    die ('Failed to connect to MySQL: ' . mysqli_connect_error());	
    } else {
       // echo 'Connected !';
    }
    $sql = "SELECT * FROM forms ";
    $result = mysqli_query($conn, $sql);
?>


<!DOCTYPE html>
<html>
<head>
    <title>Displaying MySQL Data in HTML Table</title>
    <style>
        body{
            font-size: 14px;
        }
    </style>
    <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.7.1/css/bulma.min.css">
</head>
<body>
<form action="index.php" method="POST">
    <center>
    <table width="1200" border="1" cellpadding="7" cellspacing="3">
        <caption class="title has-background-primary ">Records of all the Users
        <?php 
            echo "<br />\n";
            echo "first visited time :".$_SESSION["first_visited"] ;
            
        ?></h2>
        </caption>
        
        <!--<h1 class="has-text-centered  has-text-weight-bold has-background-link title">Record of all the users</h1> -->
        <thead>
        <tr>
            <th>ID</th>
            <th>fname</th>
            <th>lname</th>
            <th>age</th>
            <th>gen</th>
            <th>dob</th>
            <th>place</th>
            <th>email</th>
            <th>password</th>
            <th>mobile</th>
            <th>creation_time</th>
            <th>last_updated</th>
            <th>Edit</th>
            <th>delete</th>
        </tr>
        </thead>
        <tbody>
        <?php
            if ($result->num_rows > 0) {
                // output data of each row
                while($row = $result->fetch_assoc()) {
                    echo "<br>";
                    echo '<tr>
                   
                          <td> '.$row["id"]. ' </td> 
                          <td><a href="view.php?id='.$row['id'].'">'.$row['fname'].'</a></td>
                          <td>'.$row['lname'].'</td>
                          <td>'.$row['age'].'</td>
                          <td>'.$row['gen'].'</td>
                          <td>'.$row['dob'].'</td>
                          <td>'.$row['place'].'</td>
                          <td>'.$row['email'].'</td>
                          <td>'.$row['password'].'</td>
                          <td>'.$row['mobile'].'</td>
                          <td>'.$row['creation_time'].'</td>
                          <td>'.$row['last_updated'].'</td>
                          <td><a href="edit.php?id='.$row['id'].'">edit</a></td>
                          <td> <a href="delete.php?id='.$row['id'].'" onclick="are u">delete</a></td>
                          </tr>';      
                } 
            }
            else {
                echo "0 results";
            }
            $conn->close();
            ?>
            
        </tbody>
       
    </table> 
      <a href="index.php" class="button is-primary "> Add another form</a></center>
</body>
</html>