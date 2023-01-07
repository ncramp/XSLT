<?php

$xml = "data/Perseus_text_1999.01.0126.xml";
$xmldoc = new DOMDocument();

if (file_exists($xml)){

	if(!$xmldoc->load($xml)){
	    	echo "could not load xml documents";
	} 

	libxml_use_internal_errors(true);

	$xpath = new DOMXPath($xmldoc);
	$nodes = $xpath->query('//milestone[@unit="chapter"]');
	if(!$nodes){
		 foreach (libxml_get_errors() as $error) {
		    echo "Libxml error: {$error->message}\n";
	    	 }
	}else{
		foreach($nodes as $node){
		    echo $node->tagName;
		}
	}

	libxml_use_internal_errors(false);
}

?>