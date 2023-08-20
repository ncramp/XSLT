<?xml version="1.0" encoding="UTF-8"?>
<xsl:stylesheet version="1.0" xmlns:xsl="http://www.w3.org/1999/XSL/Transform">
<xsl:output type="html"/>

<xsl:key name="person-key" match="person" use="@name"/>

<xsl:template match="/">
	<xsl:apply-templates select="key('person-key','Nero')"/>
</xsl:template>

</xsl:stylesheet>
