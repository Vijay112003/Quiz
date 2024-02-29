<?php
echo("<head>
<title>Examination</title>
<meta charset='utf-8'>
<meta name='viewport' content='width=device-width, initial-scale=1'>
<link href='https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css' rel='stylesheet'>
<script src='https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js'></script>
</head>");
$uname=$_POST['uname'];
$pass=$_POST['pwd'];
$conn = new mysqli("localhost","root","","examination");
if($conn->connect_error){
die("Connection failed");
}
$query1='select * from User_register where User_name="'.$uname.'" and pass="'.$pass.'"';
//echo($query2);
$res=$conn->query($query1);
if($res->num_rows==1){
//echo("All the best for your test");
$resultquery = "CREATE TABLE IF NOT EXISTS user_ans (
user_name VARCHAR(50),
question_id INT(3),
user_ans VARCHAR(50),
crt_ans VARCHAR(50)
);
";
if($conn->query($resultquery)==TRUE)
{
$query2='CREATE TABLE IF NOT EXISTS questions (
ques_id INT(3) AUTO_INCREMENT,
question VARCHAR(100) UNIQUE,
opt1 VARCHAR(50),
opt2 VARCHAR(50),
opt3 VARCHAR(50),
opt4 VARCHAR(50),
answer VARCHAR(50),
PRIMARY KEY (ques_id)
);
';
if ($conn->query($query2) === TRUE){
$query8="select user_name from user_ans limit 1";
$res1 = $conn->query($query8);
if($res1->num_rows==1){
echo("<div class='container mt-5 col-5'>
<div class='card'>
<h5 class='card-title m-3'>Aready attended</h5>
<div class='card-body'>");
echo("<form action='result.php' method='POST'>");
echo("<input type='hidden' Value='".$uname."' name='uname'>");
echo("<div class='d-grid gap-2 col-4 mx-auto'>
<input type='submit' class='btn btn-primary' name='score' Value='View score'>
</div>");
echo("</form>");
echo("</div>
</div>
</div>");
}
else{
$query3="select * from questions limit 7";
//echo($query3);
$res1=$conn->query($query3);
echo("<div class='container mt-5 col-5'>
<div class='card'>
<h5 class='card-title m-3'>ALL THE BEST</h5>
<div class='card-body'>");
echo("<form action='result.php' method='POST'>");
foreach($res1 as $row){
//print_r($row);
echo($row['ques_id'].")".$row['question']."<br>");
echo("<input type='radio' name='q".$row['ques_id']."'
value='".$row['opt1']."'required>".$row['opt1']."<br>");
echo("<input type='radio' name='q".$row['ques_id']."'
value='".$row['opt2']."'>".$row['opt2']."<br>");
echo("<input type='radio' name='q".$row['ques_id']."'
value='".$row['opt3']."'>".$row['opt3']."<br>");
echo("<input type='radio' name='q".$row['ques_id']."'
value='".$row['opt4']."'>".$row['opt4']."<br><br>");
}
echo("<input type='hidden' Value='".$uname."' name='uname'>");
echo("<div class='d-grid gap-2 col-4 mx-auto'>
<input type='submit' class='btn btn-primary' name='score' Value='submit'>
</div>");
echo("</form>");
echo("</div>
</div>
</div>");
}
}
}
}
else{
echo("<div class='container mt-5 col-5'>
<div class='card'>
<h5 class='card-title m-3'>User not found</h5>
<div class='card-body'>");
echo("<form action='index.php' method='POST'>");
echo("<div class='d-grid gap-2 col-4 mx-auto'>
<input type='submit' class='btn btn-primary' name='score' Value='Register'>
</div>");
echo("</form>");
echo("</div>
</div>
</div>");
}
?>
