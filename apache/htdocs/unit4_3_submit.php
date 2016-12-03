<?php
$con = mysql_connect("localhost", "usr_2016_100", "777188");
if (!$con)
{
	die("Could not connect: ".sql_error());
}

mysql_select_db("db_2016_100");

$guest = "guest";
$party = "party";
$guest_party = "guest_party";

$sql = "INSERT INTO $guest (Guest_Name, Age, Gender, Email)
	VALUES
	('$_POST[name]', '$_POST[age]', '$_POST[gender]', '$_POST[email]')";

if (!mysql_query($sql))
{
	die('Insert error: '.mysql_error());
}
/*
foreach ($_POST as $key=>$value) {
	print $key." ".$value;
	print "<br />";
}
 */

$result = mysql_query("SELECT LAST_INSERT_ID()");
$row = mysql_fetch_array($result);
$new_id = $row[0];

foreach ($_POST as $key=>$value) {
	if ($key != "name" && $key != "age" && $key != "gender" && $key != "email") {
		mysql_query("INSERT INTO $guest_party (Guest_ID, Party_Num) VALUES ($new_id, $key)");
	}
}

mysql_close($con);

?>
