<?php
echo ("<head>
<link rel='stylesheet' href='https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css'>
</head>");
$conn = new mysqli("localhost","root","","examination");
if($conn->connect_error){
die("Connection failed");
}
$query3="select * from questions limit 7";
$res1=$conn->query($query3);
$score=0;
$name=$_POST['uname'];
echo "<div class='container'>
<table class='table'>
<thead>
<tr>
<th>Ques.no</th>
<th>Your answer</th>
<th>Correct answer</th>
</tr>
</thead>
<tbody>";
if($_POST['score']=='View score'){
$scorequery="select * from user_ans where user_name='$name'";
$res2 = $conn->query($scorequery);
foreach($res2 as $row){
echo
"<tr><td>q".$row['question_id']."</td><td>".$row['user_ans']."</td><td>".$row['crt_ans']."</td></tr><br>";
if($row['user_ans']==$row['crt_ans'])
$score++;
}
}
else{
foreach($res1 as $row){
echo
"<tr><td>q".$row['ques_id']."</td><td>".$_POST['q'.$row['ques_id']]."</td><td>".$row['answer']."</td></tr><br>";
$query4="insert into user_ans (user_name,question_id,user_ans,crt_ans)
values('".$name."',".$row['ques_id'].",'".$_POST['q'.$row['ques_id']]."','".$row['answer']."')";
$res = $conn->query($query4);
if($_POST['q'.$row['ques_id']]==$row['answer'])
$score++;
}
}
echo "</tbody></table>";
echo("<div class='container mt-5 col-5'>
<div class='card'>
<div class='card-body'>");
echo("<h1 class='card-title m-3'>Score : $score</h1>");
echo("</div>
</div>
</div>");
echo("<script src='https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js'></script>
<script src='https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js'></script>");
?>