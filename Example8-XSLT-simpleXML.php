<?php
	$xsl = "data/example.xsl";
	$xml = "data/example.xml";

	$xmldoc = new DOMDocument();
	$xsldoc = new DOMDocument();
	$xslproc = new XSLTProcessor();

	if (file_exists($xml)){
		$xmldoc = simplexml_load_file($xml);
	}else{
		echo "could not load xml document";
	}

	if (file_exists($xsl)){
		$xsldoc = simplexml_load_file($xsl);
	}else{
		echo "could not load xsl document";
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