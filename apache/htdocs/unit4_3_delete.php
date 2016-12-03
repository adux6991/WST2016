<!DOCTYPE html>

<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="author" content="Xu Da">
<title> Questionaire </title>
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
<link rel="stylesheet" href="/main.css">
</head>
<body>

<div class = "head">
<h1><b> Questionaire Results </b></h1>
</div>

<div class = "block head">
<br/>
<h3> Successfully deleted! </h3>

<?php
error_reporting(0);

$con = mysql_connect("localhost", "usr_2016_100", "777188");
if (!$con)
{
	die("Could not connect: ".sql_error());
}

mysql_select_db("db_2016_100", $con);

/*
$result = mysql_query("SELECT * FROM $guest");

while ($row = mysql_fetch_array($result))
{
	$id = $row["Guest_ID"];
	if(isset($_POST[$id]))
	{
		mysql_query("DELETE FROM $guest WHERE Guest_ID = $id");
	}
}
 */
foreach ($_POST as $key=>$value) {
	mysql_query("DELETE FROM guest WHERE Guest_ID = $key");
	mysql_query("DELETE FROM guest_party WHERE Guest_ID = $key");
}



mysql_close($con);

?>
<br/>
</div>

<div class = "block foot">
    <div class = "head">
        <p><a href = "unit4_3_main.php"> Return </a></p>
    </div>
</div>

</body>
</html>

