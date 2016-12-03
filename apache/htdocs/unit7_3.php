<!DOCTYPE html>
<html lang="en">
<head>
<title>Unit 7</title>
<meta charset="UTF-8">
<meta name="author" content="Xu Da">
<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway">
<link rel="stylesheet" href="main.css">
</head>

<body>

<div class = "head">
    <h1><b> Unit 7 </b></h1>
</div>

<div class = "block para">
	<?php
	$color = $_POST["color"];
	$shape = $_POST["shape"];

	print '<applet code = "unit7_3.class" width = "500" height = "300">';
	print '<param name = "shape" value = "'.$shape.'">';
	print '<param name = "color" value = "'.$color.'">';
	print '</applet>';
	?>
</div>

<div class = "block foot">
    <div class = "head">
        <p><a href = "index.html"> Return </a></p>
    </div>
</div>


</body>
</html>
