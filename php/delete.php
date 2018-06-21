              
        
<?php
    $conn = new mysqli("localhost", "root", "root@12345","test");

    if ($conn->connect_error) {
        die("Connection failed: " . $conn->connect_error);
    } 
    echo "Connected";
    echo "<br>";
    $id= $_GET["id"];
    
    $sql = "DELETE FROM forms WHERE id='$id'";
    $statement = $conn->prepare($sql);
    if ($statement->execute()) {
        header("Location:details.php");
    }
?>