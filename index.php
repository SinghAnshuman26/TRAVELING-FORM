<?php
$insert = false;
if(isset($_POST['name'])){
   $server="localhost";
   $username = "root";
   $password = "";

   $con = mysqli_connect($server,$username,$password);

   if(!$con){
    die("connection to this database failed due to ". mysqli_connect_error());

   }
   //echo "success connectiong to the db";
   $name = $_POST['name'];
   $age = $_POST['age'];
   $gender = $_POST['gender'];
   $email = $_POST['email'];
   $desc = $_POST['desc'];
   $phone = $_POST['phone'];
   $sql = "INSERT INTO `trip`.`reip` (`name`, `age`, `gender`, `email`, `phone`, `other_info`, `dt`) VALUES ('$name', '$age', '$gender', '$email', '$phone', '$desc', current_timestamp())";
   //echo $sql;
   if($con->query($sql) == true){
    //echo "successfully inserted";
    $insert =true;
   } 
   else{
    echo"ERROR:$sql <br> $con->error";
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
    <title>Welcomem To Travel Form</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="container">
        <h1>Welcome to Friendclub Goa trip form</h1>
        <p>Enter your details and submit this form to conform yours particapatin in the trip </p>
        <?php
        if($insert == true){
        echo"<p class='submitMsg'>Thanks for your response .we are happy to see you there </p>";
        }
         ?>
        <form action="index.php" method="post">
        <input type="text" name="name" id="name" placeholder="Enter your name">
        <input type="text" name="age" id="age" placeholder="Enter your Age">
        <input type="text" name="gender" id="gender" placeholder="Enter your gender">
        <input type="email" name="email" id="email" placeholder="Enter your email">
        <input type="phone" name="phone" id="phone" placeholder="Enter your phone">
        <textarea name="desc" id="desc" cols="30" ros="10" placeholder="Enter any other information here"></textarea>
        <button class="btn">Submit</button>
        </form>  
    </div>
    <script src = "index.js"></script>
</body>
</html>