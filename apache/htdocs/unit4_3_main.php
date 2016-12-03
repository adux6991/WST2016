<!DOCTYPE html>

<!-- questionaire.html
     A document to collect information such as name, age, gender and email.
     -->

<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="author" content="Xu Da">
<title> Questionaire </title>
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
<link rel="stylesheet" href="main.css">
<script type = "text/javascript" src = "jquery-3.1.1.min.js"></script>
<script type="text/javascript">

$(document).ready(function(){
    $("#sub").click(function(){
        var name = $("#name").val();
        var age = $("#age").val();
        var gender = $("#gender").val();
        var email = $("#email").val();

        if (name == "" || name == null)
        {
            $("#result").text("Please input your name!");
            return false;
        }

        if (age == "" || age == null)
        {
            $("#result").text("Please input your age!");
            return false;
        }

        if (email == "" || email == null)
        {
            $("#result").text("Please input your email!");
            return false;
        }

        $.ajax({
          type: 'post',
          url: 'unit4_3_submit.php',
          data: $("#survey").serialize(),
          success: function(data){
            $("#result").text("Submit success!");
          }
        })
    });
});

</script>
</head>
<body>

<div class = "head">
<h1><b> Welcome to the Guest Book </b></h1>
<h3 style = "color: red">jQuery Ajax applied</h3>
</div>

<div class = "block">

<form
    name = "survey"
    id = "survey"
    action = "unit4_3_submit.php"
    method = "post">

<br />

<h2 align = "center"> Parties to Go</h2>

<br />
<table border = "0" align = "center">
	<tr>
		<th> </th>
		<th> Time </th>
		<th> Place </th>
		<th> Host_Name </th>
	</tr>	
<?php
error_reporting(0);

$con = mysql_connect("localhost", "usr_2016_100", "777188");
if (!$con)
{
      die("Could not connect: ".sql_error());
}

mysql_select_db("db_2016_100", $con);

$guest = "guest";
$party = "party";

$result = mysql_query("SELECT * FROM $party");

while ($row = mysql_fetch_array($result))
{
      echo '<tr><td><label><input type="checkbox" name="'.$row["Party_Num"].'" value="on" /></label></td>';
      echo '<td>'.$row["Time"].'</td>';
      echo '<td>'.$row["Place"].'</td>';
      echo '<td>'.$row["Host_Name"].'</td>';
      echo '</tr>';
}

mysql_close($con);
?>

</table>

<br />

<h2 align = "center">Your Information</h2>

<br />
<table border = "0" align = "center">
  <tr>
    <td > Name: </td>
    <td >
      <input type = "text"  name = "name" id = "name" size = "20" maxlength = "100"/>
    </td>
  </tr>

  <tr>
    <td > Age: </td>
    <td >
      <input type = "number"  name = "age" id = "age" size = "30" />
    </td>
  </tr>

  <tr>
    <td> Gender: </td>
    <td >
      <input type = "radio" name = "gender" id = "gender" value = "male" checked = "checked"/> Male
      <input type = "radio" name = "gender" id = "gender" value = "female" /> Female
    </td>
  </tr>

  <tr>
    <td >Email: </td>
    <td >
      <input type = "email"  name = "email" id = "email" size = "20" maxlength = "100"/>
    </td>
  </tr>

  <tr>
    <td colspan = "2" >
      <input type = "button" id = "sub"  value = "Submit" />
	  <a href = "unit4_3_query.php"><input type = "button" value = "Query" /></a>
    </td>
  </tr>

  <tr>
    <td colspan = "2" >
	  <a href = "unit4_3_party.php"><input type = "button" value = "I'm party organizer" /></a>
    </td>
  </tr>

  <tr>
    <td colspan = "2" >
      <br />
    </td>
  </tr>

  <tr>
    <td colspan = "2">
      <span id = "result" style = "color: red"><br /></span>
    </td>
  </tr>
</table>

<br />
<br />
<br />

</form>

</div>

<div class = "block foot">
    <div class = "head">
        <p><a href = "index.html"> Return </a></p>
    </div>
</div>

</body>
</html>

