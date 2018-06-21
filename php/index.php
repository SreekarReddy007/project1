<?php 
session_start();
?>
<?php 
$creation_time=date('jS F g:i A');
$_SESSION["first_visited"] = $creation_time;
$current_time="";
$update_time=date('g:i');
$diff=$update_time-$current_time;
//var_dump($diff);
?>
<?php 



    if (empty($_POST["fname"])) {
      $nameErr = "Name is required";
    } else {
      $name = test_input($_POST["fname"]);
      // check if name only contains letters and whitespace
      if (!preg_match("/^[a-zA-Z ]*$/",$name)) {
        $nameErr = "Only letters and white space allowed"; 
        
      }
    }

?>
<!DOCTYPE html>
<html>

<head>
    <title>php form</title>
    <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/bulma/0.7.1/css/bulma.min.css">
    
    <style>
    
        
    </style>
    </head>
    <body>

    
        <form action="form_data.php" method="post" id="form" >
            
            <div class="columns is-mobile">
                <div class="column is-half is-offset-one-quarter">
                  <h1 class="has-text-centered  has-text-weight-bold has-background-danger">Registration Form</h1>
            
                    <div class="field ">
                        <label class="label">Firstname</label>
                        <div class="control"><input id="fname" class="input" type="text"  placeholder="Enter Firstname" required name="fname">
                        <span class="error">* <?php echo $nameErr;?></span>
                        </div>
                    </div>
                    <div class="field">
                        <label class="label">Lastname</label>
                        <div class="control"><input id="lname" class="input" type="text"  placeholder="Enter Lastname" required name="lname">
                        </div>
                    </div>
                    <div class="field">
                        <label class="label">Age</label>
                        <div class="control"><input id="age" class="input" type="number"  placeholder="enter Age" required name="age"></div>
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
                        <div class="control"><input type="date" id="dob" required name="dob"/></td>
                    </div>
                    <div class="field">
                        <label>Favourite place </label>
                        <div class="control">
                            <select id="place" required name="place">
                                <option class="is-info">--Select favourite place--</option>
                                <option>Hyderabad</option>
                                <option>Bangalore</option>
                                <option>chennai</option>
                            </select>
                        </div>
                    </div>
                    <div class="field">
                        <label>EMail-id </label>
                        <div class="control"><input type="email" id="email" placeholder="Enter EMail-id" required name="email"></div>
                    </div>
                    <div class="field">
                        <label>Password </label>
                    
                        <div class="control"><input type="password" id="password" placeholder="Enter Password" required name="password"/></div>
                    </div>
    
                    <div class="field">
                        <label>Mobile </label>
                        
                        <div class="control "><input type="tel "  id="mobile" placeholder="Enter Mobile number" maxlength="10" required name="mobile"></div>
                        </div>
                   
    
            <center>
                <input type="submit"  class="button is-info" id="submit" value="SUBMIT">
                <input type="reset"  class=" button is-danger" id="reset " value="RESET">
                <a href="details.php" class="button is-primary"> viewform</a>
            </center>
            </div>
            </div>
        </form>
    
    </body>
    
    </html>
    