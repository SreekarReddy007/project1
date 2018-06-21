<!--
< ?php
    $conn = mysqli_connect('localhost', 'root', 'root@12345', 'test');
    if (!$conn) {
	    die ('Failed to connect to MySQL: ' . mysqli_connect_error());	
    } else {
       // echo 'Connected !';
    }
    $sql = "UPDATE employees SET id=:id, fname=:fname, lname=:lname ,age=: age,gen=: gen,dob=: dob,place=:place, email=:email,password=:passwod,mobile=:mobile WHERE id=:id";
 
    if($stmt = $pdo->prepare($sql)){
        // Bind variables to the prepared statement as parameters
        $stmt->bindParam(':id', $param_id);
        $stmt->bindParam(':fname', $param_fname);
        $stmt->bindParam(':lname', $param_lname);
        $stmt->bindParam(':age', $param_age);
        $stmt->bindParam(':gen', $param_gen);
        $stmt->bindParam(':dob', $param_dob);
        $stmt->bindParam(':place', $param_place);
        $stmt->bindParam(':email', $param_email);
        $stmt->bindParam(':password', $param_password);
        $stmt->bindParam(':mobile', $param_mobile);
        
        // Set parameters
        $param_id = $id;
        $param_fname = $fname;
        $param_lname = $lname;
        $param_age = $age;
        $param_gen = $gen;
        $param_dob = $dob;
        $param_email = $email;
        $param_password = $password;
        $param_mobile = $mobile;
        
        // Attempt to execute the prepared statement
        if($stmt->execute()){
            // Records updated successfully. Redirect to landing page
            header("location: index1.php");
            exit();
        } else{
            echo "Something went wrong. Please try again later.";
        }
    }
     
    // Close statement
    unset($stmt);


// Close connection
unset($pdo);
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
   
</body>
</html> 
    -->
    <?php 
session_start();
?>
          
    <html>
   
   <head>
      <title>Update a Record in MySQL Database</title>
      <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.7.1/css/bulma.min.css">
    
   </head>
   
   <body>
     
    
   <form  method="post">
    <?php
        //$conn = mysqli_connect('localhost', 'root', 'root@12345', 'test');
        require_once('dbconnect.php');
        $id=$_GET["id"];
        //var_dump("$age");
        if (isset($_POST["update"])) {
            $fname=$_POST["fname"];
            $lname=$_POST["lname"];
            $age=$_POST["age"]; 
            $gen=$_POST["gen"];
            $dob=$_POST["dob"];
            $fp=$_POST["place"];
            $email=$_POST["email"];
            $pass=$_POST["password"];
            $ph=$_POST["mobile"];
            $creation_time= "";
            $updation_time=date('jS F g:i A');
        
            try {
                
                $sql = "UPDATE forms SET fname= '$fname',lname= '$lname', age= '$age',gen= '$gen', dob='$dob',place='$fp', email= '$email',password= '$pass',mobile= '$ph', last_updated= '$updation_time' WHERE id='$id'";

                $stmt = $conn->prepare($sql);

                // execute the query
                $stmt->execute();
                //header("Location:emp_details.php");
                //var_dump("$stmt");

                }
            catch(PDOException $e)
                {
                echo $sql . "<br>" . $e->getMessage();
                header("Location:details.php");
                }

            //$conn = null;
        }

        $qry = $conn->prepare("SELECT * from forms WHERE id='$id';"); 
        $qry->execute();
        //$result = $qry->setFetchMode(PDO::FETCH_ASSOC); 
        $result = $qry->fetch();
       
    ?>
       
            <div class="columns is-mobile">
                <div class="column is-half is-offset-one-quarter">
                  <h2 class="has-text-centered  has-text-weight-bold has-background-success">Registration Form 
                  <?php 
                        echo "<br />\n";
                        echo "first visited time :".$_SESSION["first_visited"] ;
                   ?></h2>
                    <div class="field ">
                        <label class="label">Firstname</label>
                        <div class="control"><input id="fname" class="input" type="text" value="<?php echo $result['fname']; ?>" required name="fname">
                        </div>
                    </div>
                    <div class="field">
                        <label class="label">Lastname</label>
                        <div class="control"><input id="lname" class="input" type="text"value="<?php echo $result['lname']; ?>" required name="lname">
                        </div>
                    </div>
                    <div class="field">
                        <label class="label">Age</label>
                        <div class="control"><input id="age" class="input" type="number" value="<?php echo $result['age']; ?>"required name="age"></div>
                    </div>
                   
                    <div class="field">
                        <label>Gender </label>
                        <div class="control"><input type="radio" name="gen" id="gender1" value="male" checked/>Male
                            <input type="radio" name="gen" id="gender2" value="female" />Female
                            <input type="radio" name="gen" id="gender3" value="other" />Other
                        </div>
                    </div>
                    <div class="field">
                        <label>Date of Birth </label>
                        <div class="control"><input type="date" id="dob" value="<?php echo $result['dob']; ?>"required name="dob"/></td>
                    </div>
                    <div class="field">
                        <label>Favourite place </label>
                        <div class="control">
                            <select id="place" required name="place">
                                <option><?php echo $result['place']; ?></option>
                                <option class="is-info">--Select favourite place--</option>
                                <option>Hyderabad</option>
                                <option>Bangalore</option>
                                <option>chennai</option>
                            </select>
                        </div>
                    </div>
                    <div class="field">
                        <label>EMail-id </label>
                        <div class="control"><input type="email" id="email" value="<?php echo $result['email']; ?>" required name="email"></div>
                    </div>
                    <div class="field">
                        <label>Password </label>
                    
                        <div class="control"><input type="password" id="password" value="<?php echo $result['password']; ?>" required name="password"/></div>
                    </div>
    
                    <div class="field">
                        <label>Mobile </label>
                        
                        <div class="control "><input type="tel "  id="mobile" value="<?php echo $result['mobile']; ?>"  maxlength="10" required name="mobile"></div>
                        </div>
                        <center>
                <input type="submit" name="update" class="button is-info" id="update" value="UPDATE">
                <a href="details.php" class="button is-primary"> viewform</a>
                
            </center>
                   
            <?php
        
      ?>
      </form>
   </body>
</html>

<!--<!DOCTYPE html>
<html lang="en">


<head>
    <title>Employee Details</title>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.7.1/css/bulma.min.css" />
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.0.13/css/all.css" integrity="sha384-DNOHZ68U8hZfKXOrtjWvjxusGo9WQnrNx2sqG0tfsghAvtVlRW3tvkXWZh58N9jp" crossorigin="anonymous" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
    <meta charset="utf-8">
</head>

<body>
    <section class="container">
        <div class="hero is-primary hero-body has-text-centered">
            <p class="title">Form Updation</p>
        </div>
        <form method="POST">
            < ?php
            require_once('dbconnect.php');
            if (isset($_POST["back"])) {
                header("Location:emp_details.php");
            }
            $id=$_GET["id"];
            if (isset($_POST["update"])) {
                $fname=$_POST["fname"];
                $lname=$_POST["lname"];
                $email=$_POST["email"];
                $dob=$_POST["dob"];
                $bg=$_POST["blood_gp"];
                $gen=$_POST["gen"];
                $ph=$_POST["phone"];
                $addr=$_POST["address"];
                $creation_time= "";
                $updation_time=date('jS F g:i A');
                try {
                    $sql = "UPDATE emp SET fname= '$fname',lname= '$lname', email= '$email', blood_gp= '$bg', gender='$gen', mobile='$ph', address= '$addr', last_updated= '$updation_time' WHERE id='$id'";

                    $stmt = $conn->prepare($sql);

                    // execute the query
                    $stmt->execute();
                    //header("Location:emp_details.php");

                    }
                catch(PDOException $e)
                    {
                    echo $sql . "<br>" . $e->getMessage();
                    header("Location:emp_details.php");
                    }

                //$conn = null;
            }

                $qry = $conn->prepare("SELECT * from emp WHERE id=$id;"); 
                $qry->execute();
                $result = $qry->fetch();
            ?>
            <div class="columns is-centered ">
                <div class="column is-8">
                    <div class="field">
                        <label class="label">ID</label>
                        <div class="control">
                            <input class="input is-primary" type="text" value="< ?php echo $result['id']; ?>" disabled name="id">
                        </div>
                    </div>
                    <div class="field">
                        <label class="label">First Name</label>
                        <div class="control">
                            <input class="input is-primary" type="text" value="< ?php echo $result['fname']; ?>" required name="fname">
                        </div>
                    </div>
                    <div class="field">
                        <label class="label">Last Name</label>
                        <div class="control">
                            <input class="input is-primary" type="text" value="< ?php echo $result['lname']; ?>" name="lname">
                        </div>
                    </div>
                    <div class="field">
                        <label class="label">Email</label>
                        <div class="control">
                            <input class="input is-primary" type="email" value="< ?php echo $result['email']; ?>" required name="email">
                        </div>
                    </div>
                    <div class="field">
                        <label class="label">DOB</label>
                        <div class="control">
                            <input class="input is-primary" type="date" value="< ?php echo $result['dob']; ?>" required name="dob">
                        </div>
                    </div>
                    <div class="field">
                        <label class="label">Blood Group</label>
                        <div class="control">
                            <div class="select is-primary">
                                <select name="blood_gp" required>
                                    <option>< ?php echo $result['blood_gp']; ?></option>
                                    <option>AB+</option>
                                    <option>AB-</option>
                                    <option>A+</option>
                                    <option>A-</option>
                                    <option>B+</option>
                                    <option>B-</option>
                                    <option>O+</option>
                                    <option>O-</option>
                                </select>
                            </div>
                        </div>
                    </div>
                    <div class="field">
                        <div class="control">
                            <label class="radio">
                                <input type="radio" name="gen" value= "female" checked>
                                Male
                            </label>
                            <label class="radio">
                                <input type="radio" name="gen" value="female">
                                Female
                            </label>
                            <label class="radio">
                                <input type="radio" name="gen" value="female">
                                Other
                            </label>
                        </div>
                    </div>
                    <div class="field">
                        <label class="label">Mobile</label>
                        <div class="control">
                            <input class="input is-primary" type="tel" value="< ?php echo $result['mobile']; ?>" name="phone" required>
                        </div>
                    </div>
                    <div class="field">
                        <label class="label">Address</label>
                        <div class="control">
                            <textarea class="textarea is-primary" type="text" name="address" required>< ?php echo $result['address']; ?></textarea>
                        </div>
                    </div>
                    <div class="field is-grouped is-grouped-centered">
                        <div class="control">
                            <button type="submit" name="update" class="button is-primary">Update</button>
                        </div>
                        <div class="control">
                            <button class="button is-primary" name="back">Back</button>
                        </div>
                    </div>
                </div>
            </div>
        </form>
    </section>
</body>

</html>