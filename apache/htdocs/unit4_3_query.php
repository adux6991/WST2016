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
    <h1><b> Guests </b></h1>
</div>

<div class = "block">

<form method="post" action="unit4_3_delete.php">

<br /><br /><br />

<table border = "0" align = "center">

<tr>
<th></th>
<th>Name</th>
<th>Age</th>
<th>Gender</th>
<th>Email</th>
<th>Parties</th>
</tr>

<?php

error_reporting(0);

$con = mysql_connect("localhost", "usr_2016_100", "777188");
if (!$con) {
      die("Could not connect: ".sql_error());
}

mysql_select_db("db_2016_100", $con);

$result = mysql_query("SELECT * FROM guest");

while ($row = mysql_fetch_array($result)) {
      echo '<tr><td><label><input type="checkbox" name="'.$row["Guest_ID"].'" value="on" /></label></td>';
      echo '<td>'.$row["Guest_Name"].'</td>';
      echo '<td>'.$row["Age"].'</td>';
      echo '<td>'.$row["Gender"].'</td>';
	  echo '<td>'.$row["Email"].'</td>';
	  echo '<td>';
	  $parties = mysql_query("SELECT Time, Place, Host_Name FROM party, guest_party
		  WHERE guest_party.Guest_ID = ".$row["Guest_ID"]." AND guest_party.Party_Num = party.Party_Num");
	  $none = 0;
	  while ($party = mysql_fetch_array($parties)) {
		  $none = 1;
		  echo $party["Time"].", ".$party["Place"].", ".$party["Host_Name"]."<br />";
	  }
	  if ($none == 0) {
		  echo 'None';
	  }
      echo '</td></tr>';
}

mysql_close($con);

?>

<tr>
<td colspan="6"><input type="submit" value="Delete" /></td>
</tr>

</table>

<br /><br /><br />

</form>

</div>

<div class = "block foot">
    <div class = "head">
        <p><a href = "unit4_3_main.php"> Return </a></p>
    </div>
</div>

</body>
</html>
