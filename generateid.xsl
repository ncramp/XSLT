<?xml version="1.0" encoding="UTF-8"?>
<xsl:stylesheet version="1.0" xmlns:xsl="http://www.w3.org/1999/XSL/Transform">
<xsl:output method="html"/>

<xsl:template match="/">
	<html lang="en">
	<head>
		<title>XPath generate-id()</title>
	</head>
	<body>
		<ul>
			<xsl:apply-templates select="history/period/person" mode="link"/>
		</ul>
		<xsl:apply-templates select="history/period/person" mode="section"/>
		<script>
	
		const event = document.querySelector("a").addEventListener("click", (event) => (console.log(event.target.href)),);
		
		</script>
	</body>
	</html>
</xsl:template>

<xsl:template match="person" mode="link">
	<li>
		<a href="#{generate-id(current())}">
			<xsl:value-of select="@name"/>
		</a>
	</li>
</xsl:template>

<xsl:template match="person" mode="section">
	<section>
		<a id="{generate-id(current())}">
			<xsl:value-of select="."/>
		</a>
	</section>
</xsl:template>

</xsl:stylesheet>
