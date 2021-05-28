<?php
$insert=false;
if(isset($_POST['name'])){
    

 $server="localhost";
 $username="root";
 $password='';

 $con = mysqli_connect($server, $username,$password);
 if(!$con){
    die("connection to this database failed due to" . mysqli_connect_error());
}
    // echo "success connecting to db";
    $name = $_POST['name'];
    $gender = $_POST['gender'];
    $age = $_POST['age'];
    $email = $_POST['email'];
    $number = $_POST['number'];
    $desc = $_POST['desc'];
$sql= "INSERT INTO `trip`.`trip` ( `Name`, `Age`, `Gender`, `Email`, `Number`, `other`, `dt`) VALUES ('$name', '$age', '$gender', '$email', '$number', '$desc', current_timestamp());";

// echo $sql;
if($con->query($sql) == true){
    // echo "Successfully inserted";
    $insert = true;
}    
else{
        echo "ERROR: $sql <br> $con->error";
    }

     $con->close();


}

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome To Travel form</title>
    <link rel="preconnect" href="https://fonts.gstatic.com">
<link href="https://fonts.googleapis.com/css2?family=Stint+Ultra+Condensed&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="style.css">
</head>
<script src="index.js"></script>
<body>
    <img class ='bg' src="bg2.jpg" alt="IIT Kharagpur">
    <div class="container">
<h1 class="head">Welcome To IIT Kharagpur US Trip form</h1>
<p class="para">
    Enter Your details and submit your form to confirm your participation in the Trip
</p>
<?php
if($insert == true){
echo "<p class='submitMsg'>Thanks for submitting your form. We are happy to see you joining us for the US trip</p>";
}
?>
<form action="index.php" method="post">
<input type="text" name='name'  id='name' placeholder="Enter your name">
<input type="text" name='age'  id='Age' placeholder="Enter your age">
<input type="text" name='gender'  id='Gender' placeholder="Enter your gender">
<input type="email" name="email" id="email" placeholder="Enter your email ">    
<input type="number" name="number" id="number" placeholder="Enter your phone number">
<textarea name="desc" id="desc" cols="30" rows="10"  placeholder="Enter other information here"></textarea>
<button type="submit" class="btn">Submit</button>
<!-- <button type="submit" class="btn">Reset</button> -->


</form>

</div>
    
</body>
</html>