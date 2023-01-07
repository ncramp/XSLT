<?php

$xml = "data/Perseus_text_1999.01.0126.xml";

if (file_exists($xml)){

	if (file_exists($xml)){
		$xmldoc = simplexml_load_file($xml);
	}else{
		echo "could not load xml document";
	}

	libxml_use_internal_errors(true);

	$result = $xmldoc->xpath('count(//milestone[@unit="chapter"])');
	if(!$result){
		
		 foreach (libxml_get_errors() as $error) {
		    echo "Libxml error: {$error->message}\n";
	    }
	    
	}else{
		
		foreach ($result as $node) {
    			echo "This book includes {$node[unit]} {$node[n]}";
		}
	}

	libxml_use_internal_errors(false);
}

?>
