<!DOCTYPE html>

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
        var time = $("#time").val();
        var place = $("#place").val();
        var host_name = $("#host_name").val();

        if (time == "" || time == null)
        {
            $("#result").text("Please input party time!");
            return false;
        }

        if (place == "" || place == null)
        {
            $("#result").text("Please input party place!");
            return false;
        }

        if (host_name == "" || host_name == null)
        {
            $("#result").text("Please input party host name!");
            return false;
        }

        $.ajax({
          type: 'post',
          url: 'unit4_3_submit_party.php',
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
<h1><b> Welcome to the Party Book </b></h1>
<h3 style = "color: red">jQuery Ajax applied</h3>
</div>

<div class = "block">

<form
    name = "survey"
    id = "survey"
    action = "unit4_3_submit_party.php"
    method = "post">

<br />
<h2 align = "center">Party Information</h2>
<br />
<table border = "0" align = "center">
  <tr>
    <td > Time: </td>
    <td >
      <input type = "text"  name = "time" id = "time" size = "40" maxlength = "100"/>
    </td>
  </tr>

  <tr>
    <td > Place: </td>
    <td >
      <input type = "text"  name = "place" id = "place" size = "40" maxlength = "100"/>
    </td>
  </tr>

  <tr>
	<td> Host_Name: </td>
	<td>
      <input type = "text"  name = "host_name" id = "host_name" size = "40" maxlength = "100"/>
    </td>
  </tr>

  <tr>
    <td colspan = "2" >
      <input type = "button" id = "sub"  value = "Submit" />
      <a href = "unit4_3_query_party.php"><input type = "button" value = "Query" /></a>
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
        <p><a href = "unit4_3_main.php"> Return </a></p>
    </div>
</div>

</body>
</html>

