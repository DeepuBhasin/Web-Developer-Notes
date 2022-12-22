<?xml version="1.0" encoding="UTF-8" ?>
<xsl:stylesheet version="1.0" xmlns:xsl="https://www.w3.org/1999/XSL/Transform">
  
  <xsl:template match="/">            
    <html>
      <head>
          <title>
            Xml tutorial
          </title>
        </head>
        <body>
            <xsl:value-of select="person/user/fname"/>
        </body>
    </html>
  </xsl:template>
</xsl:stylesheet>