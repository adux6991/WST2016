<?xml version="1.0" encoding="UTF-8"?>
<xsl:stylesheet version="1.0" xmlns:xsl="http://www.w3.org/1999/XSL/Transform">

<xsl:template match="/">
<html>
<head>
	<title>Cookbook</title>
	<meta charset="UTF-8" />
	<meta name="author" content="Xu Da" />
		<link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Raleway" />
		<link rel="stylesheet" type="text/css" href="/main.css" />
</head>

<body>

<div class = "head">
	<h1><b>Cookbook</b></h1>
</div>

<div class="block para" align="center">
	<xsl:for-each select="cookbook/recipe">
		<h2 style="text-align: center"><xsl:value-of select="name"/></h2>

		<img>
			<xsl:attribute name="src">
				<xsl:value-of select="picture"/>
			</xsl:attribute>
		</img>
		<br /><br />
		<table border = "1" width = "80%">

			<tr>
				<th colspan = "2">Ingredients</th>
			</tr>
			<xsl:for-each select="ingredient">
				<tr>
					<td>
						<xsl:value-of select="name"/>
					</td>
					<td>		
						<xsl:value-of select="amount"/>
						<xsl:value-of select="unit"/>
					</td>
				</tr>
			</xsl:for-each>

			<tr>
				<th colspan = "2">Preparation</th>
			</tr>
			<xsl:for-each select="preparation">
				<tr >
					<td colspan = "2">
						<xsl:value-of select="." />
					</td>
				</tr>
			</xsl:for-each>

			<tr>
				<th colspan = "2">Cooking</th>
			</tr>
			<xsl:for-each select="cooking">
				<tr >
					<td colspan = "2">
						<xsl:value-of select="." />
					</td>
				</tr>
			</xsl:for-each>

		</table>

		<br /><br />

		<xsl:choose>
			<xsl:when test="position() != last()"><hr/></xsl:when>
		</xsl:choose>

	</xsl:for-each>

</div>

<div class = "block foot">
	<div class = "head">
		<p><a href = "index.html"> Return </a></p>
	</div>
</div>

</body>

</html>

</xsl:template>

</xsl:stylesheet>
