<?php
$xsl = "data/example.xsl";
$xml = "data/example.xml";

$xmldoc = new DOMDocument();
$xsldoc = new DOMDocument();

$xslproc = new XSLTProcessor();

if (file_exists($xml)){
	if(!$xmldoc->load($xml)){
	    	echo "could not load xml documents";
	}
}

if (file_exists($xsl)){
	if(! $xsldoc->load($xsl)){
		echo "could not load xsl documents";
	}
}

libxml_use_internal_errors(true);

$result = $xslproc->importStyleSheet($xsldoc);
if (!$result) {
	foreach (libxml_get_errors() as $error) {
		echo "Libxml error: {$error->message}\n";
	}
}

libxml_use_internal_errors(false);

if ($result) {
	echo $xslproc->transformToXML($xmldoc);
}
?>
