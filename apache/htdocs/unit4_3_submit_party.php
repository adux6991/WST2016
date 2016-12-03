<?php
$con = mysql_connect("localhost", "usr_2016_100", "777188");
if (!$con)
{
	die("Could not connect: ".sql_error());
}

mysql_select_db("db_2016_100", $con);

$guest = "guest";
$party = "party";
$guest_party = "guest_party";

$sql = "INSERT INTO $party (Time, Place, Host_Name)
	VALUES
	('$_POST[time]', '$_POST[place]', '$_POST[host_name]')";

if (!mysql_query($sql, $con))
{
	die('Insert error: '.mysql_error());
}

echo "1 record added";

mysql_close($con);

?>
