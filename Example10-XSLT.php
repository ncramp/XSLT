<?php
	$xsl = "data/example-10.xsl";
	$xml = "data/Perseus_text_1999.01.0126.xml";

	$xmldoc = new DOMDocument();
	$xsldoc = new DOMDocument();
	$xslproc = new XSLTProcessor();

	$book = htmlspecialchars($_GET["book"]);
	

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

	$xslproc->setParameter('', 'book', $book);

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