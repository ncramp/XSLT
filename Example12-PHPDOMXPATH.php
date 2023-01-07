<?php

$xml = "data/Perseus_text_1999.01.0126.xml";
$xmldoc = new DOMDocument();

if (file_exists($xml)){

	if(!$xmldoc->load($xml)){
	    	echo "could not load xml documents";
	} 

	libxml_use_internal_errors(true);

	$xpath = new DOMXPath($xmldoc);

	$count = $xpath->evaluate('count(//milestone[@unit="chapter"]');
	if(!$count){
		 foreach (libxml_get_errors() as $error) {
		    echo "Libxml error: {$error->message}\n";
	    	 }
	}else{
		echo "There are {$count} chapters";
	}

	libxml_use_internal_errors(false);
}

?>