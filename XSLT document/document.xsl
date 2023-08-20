<?xml version="1.0" encoding="UTF-8"?>
<xsl:stylesheet version="1.0" xmlns:xsl="http://www.w3.org/1999/XSL/Transform">
<xsl:output method="html"/>

<xsl:variable name="country" select="document('country_codes.xml')/manifest/code"/>

<xsl:template match="/">
	<xsl:apply-templates/>
</xsl:template>

<xsl:template match="code">
	<xsl:variable name="code" select="text()"/>
	<xsl:value-of select="$country[@abrev=$code]/text()"/>
</xsl:template>


</xsl:stylesheet>
