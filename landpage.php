<?php
echo("<head>
<title>Examination</title>
<meta charset='utf-8'>
<meta name='viewport' content='width=device-width, initial-scale=1'>
<link href='https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css' rel='stylesheet'>
<script src='https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js'></script>
</head>");
if($_SERVER["REQUEST_METHOD"]=="POST")
{
$name=$_POST["name"];
$mail=$_POST["email"];
$mob=$_POST["num"];
$pass=$_POST["pass"];
$cpass=$_POST["cpass"];
try {
    $conn = new mysqli("localhost","root","");
  }
catch(Exception $e) {
echo("<div class='container mt-5 col-5'>
<div class='card'>
<h5 class='card-title m-3'>".$e->getMessage()."</h5>
<div class='card-body'>
<form action='login.php'>
<div class='d-grid gap-2 col-4 mx-auto'>
<input type='submit' class='btn btn-primary' name='login'
Value='Login'>
</div>
</form></div>
</div>
</div>");
  }

if($conn->connect_error){
die("Connection failed");
}
else{
$dbname="examination";
$dbquery="CREATE DATABASE IF NOT EXISTS $dbname";
if ($conn->query($dbquery) === TRUE) {
//echo "database created";
$conn->select_db($dbname);
$table="user_register";
$createTableSQL = "CREATE TABLE IF NOT EXISTS $table (
user_id int(3),
user_name varchar(100),
pass varchar(50),
mobile INT(10) UNIQUE,
email varchar(50) UNIQUE,
PRIMARY KEY (user_id)
)";
if ($conn->query($createTableSQL) === TRUE) {
//echo "table created";
$query1='select mobile from user_register where mobile="'.$mob.'" and
email="'.$mail.'"';
$res1 = $conn->query($query1);
if($res1->num_rows>0){
echo("<div class='container mt-5 col-5'>
<div class='card'>
<h5 class='card-title m-3'>Already
registered</h5>
<div class='card-body'>");
echo("<form action='login.php'>");
echo("<div class='d-grid gap-2 col-4 mx-auto'>
<input type='submit' class='btn btn-primary' name='login'
Value='Login'>
</div>");
echo("</form>");
echo("</div>
</div>
</div>");
}
else{
$query='insert into user_register
(User_name,pass,mobile,email) values("'.$name.'","'.$pass.'","'.$mob.'","'.$mail.'")';
//echo($query1);
$res2 = $conn->query($query);
echo("<div class='container mt-5 col-5'>
<div class='card'>
<h5 class='card-title m-3'>Registration
Completed</h5>
<div class='card-body'>");
echo("<form action='action.php' method='POST'>");
echo("<input type='hidden' name='uname' value='$name'>");
echo("<input type='hidden' name='upass' value='$pass'>");
echo("<div class='d-grid gap-2 col-4 mx-auto'>
<input type='submit' class='btn btn-primary' name='startexam'
Value='start'>
</div>");
echo("</form>");
echo("</div>
</div>
</div>");
}
}
else {
echo "Error creating table: " . $conn->error;
}
}
else {
echo "Error creating database: " . $conn->error;
}
}
}
else{
echo("<form action='login.php'>");
echo("<button type='submit'>Go to Another Page</button>");
echo("</form>");
}
?>
