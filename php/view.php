<!--< ?php
    $conn = mysqli_connect('localhost', 'root', 'root@12345', 'test');
    if (!$conn) {
	    die ('Failed to connect to MySQL: ' . mysqli_connect_error());	
    } else {
       // echo 'Connected !';
    }
   
   
    $sql = "SELECT * FROM forms where id='$id'";
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
</head>
<body>
<form action="index.php" method="POST">
    <table width="1200" border="1" cellpadding="1" cellspacing="1">
        <caption class="title">Record of particular User</caption>
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
        < ?php
    if ($result->num_rows > 0) {
        //     // output data of each row
            while($row = $result->fetch_assoc()) {
                // output data of each row
        
                    echo "<br>";
                    echo '<tr>
                          <td> '.$result["id"]. ' </td> 
                          <td>'.$result['fname'].'</td>
                          <td>'.$result['lname'].'</td>
                          <td>'.$result['age'].'</td>
                          <td>'.$result['gen'].'</td>
                          <td>'.$result['dob'].'</td>
                          <td>'.$result['place'].'</td>
                          <td>'.$result['email'].'</td>
                          <td>'.$result['password'].'</td>
                          <td>'.$result['mobile'].'</td>
                          <td>'.$result['creation_time'].'</td>
                          <td>'.$result['last_updated'].'</td>
                          <td><a href="edit.php?'.$result['id'].'">edit</a></td>
                          <td> <a href="delete.php?'.$result['id'].'">delete</a></td>
                          </tr>';      
            }
        }
            $conn->close();
            ?>
        </tbody>
    </table>
</body>
</html> -->
<?php 
session_start();
?>
<?php
    $id = $_GET["id"];
    $conn = mysqli_connect('localhost', 'root', 'root@12345', 'test');
    if (!$conn) {
        die ('Failed to connect to MySQL: ' . mysqli_connect_error());  
    } else {
       // echo 'Connected !';
    }
    $sql = "SELECT * FROM forms where id=$id";
    $result = mysqli_query($conn, $sql);
    $row = $result->fetch_assoc();
?> 
<!DOCTYPE html>
<html>
<head>
    
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
    <center>
    <table width="1200" border="1" cellpadding="7" cellspacing="3">
        <caption class="title has-background-info">Record of the user
        <?php 
          echo "<br />\n";
          echo "first visited time :".$_SESSION["first_visited"] ;
          ?></caption>
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
            // while($row){
                echo '<tr>
                        <td>'.$row['id'].'</td>
                        <td>'.$row['fname'].'</td>
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
                        <td> <a href="delete.php?id='.$row['id'].'">delete</a></td>
                    </tr>';
             //}
         }
            //$conn->close();
            ?>
        </tbody>
    </table>
    <a href="details.php" class="button is-info">Back</a></center>
</body>
</html> 