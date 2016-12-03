<!DOCTYPE html>

<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="author" content="Xu Da">
<title> Questionaire </title>
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
<link rel="stylesheet" href="main.css">
</head>

<div class = "head">
    <h1><b> Parties </b></h1>
</div>

<div class = "block">

<form method="post" action="unit4_3_delete_party.php">

<br /><br /><br />

<table border = "0" align = "center">

<tr>
<th></th>
<th>Time</th>
<th>Place</th>
<th>Host Name</th>
<th>Guests</th>
</tr>

<?php

error_reporting(0);

$con = mysql_connect("localhost", "usr_2016_100", "777188");
if (!$con) {
      die("Could not connect: ".sql_error());
}

mysql_select_db("db_2016_100", $con);

$result = mysql_query("SELECT * FROM party");

while ($row = mysql_fetch_array($result)) {
      echo '<tr><td><label><input type="checkbox" name="'.$row["Party_Num"].'" value="on" /></label></td>';
      echo '<td>'.$row["Time"].'</td>';
      echo '<td>'.$row["Place"].'</td>';
      echo '<td>'.$row["Host_Name"].'</td>';
	  echo '<td>';
	  $guests = mysql_query("SELECT Guest_Name FROM guest, guest_party
		  WHERE guest_party.Party_Num = ".$row["Party_Num"]." AND guest_party.Guest_ID = guest.Guest_ID");
	  $none = 0;
	  while ($guest = mysql_fetch_array($guests)) {
		  if ($none == 1) {
			  echo ", ";
		  }
		  $none = 1;
		  echo $guest["Guest_Name"];
	  }
	  if ($none == 0) {
		  echo 'None';
	  }
      echo '</td></tr>';
}

mysql_close($con);

?>

<tr>
<td colspan="5"><input type="submit" value="Delete" /></td>
</tr>

</table>

<br /><br /><br />

</form>

</div>

<div class = "block foot">
    <div class = "head">
        <p><a href = "unit4_3_party.php"> Return </a></p>
    </div>
</div>

</body>
</html>
