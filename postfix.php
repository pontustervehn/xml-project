<?php
// Put XML content into a string
$xmlstr = trim(ob_get_contents());
ob_end_clean();
//echo $xmlstr;

// Check if there was an error
if (!is_null(error_get_last()))
{
	// There was an error, print it and exit
	echo utf8_decode($xmlstr);
	exit;
}

// Load the XML string into a DOMDocument
$xml = new DOMDocument;
$xml->loadXML($xmlstr);

// Make a DOMDocument for the XSL stylesheet
$xsl = new DOMDocument;

// See which user agent is connecting
$UA = getenv('HTTP_USER_AGENT');
if (preg_match('/(android|bb\d+|meego).+mobile|avantgo|bada|blackberry|blazer|compal|elaine|fennec|hiptop|iemobile|ip(hone|od)|iris|kindle|lge |maemo|midp|mmp|mobile.+firefox|netfront|opera m(ob|in)i|palm(os)?|phone|p(ixi|re)|plucker|pocket|psp|series(4|6)0|symbian|treo|up\.(browser|link)|vodafone|wap|windows (ce|phone)|xda|xiino/i', $UA))
{

//	if(isset($_GET['detaljer']))
//	{

//	}

	// If a mobile phone (or Opera), use a wml stylesheet and set appropriate MIME type

	if(isset($_GET['detaljvy']))
	{
	$xsl->load('detaljvymobil.xsl');
	}
	else

	{
		// If not a mobile phone, use a html stylesheet
		$xsl->load('receptlistamobil.xsl');
	}
}
else

		if(isset($_GET['detaljvy']))
		{
		$xsl->load('detaljvy.xsl');
		}
		else

		{
			// If not a mobile phone, use a html stylesheet
			$xsl->load('receptlista.xsl');
		}

// Make the transformation and print the result
$proc = new XSLTProcessor;
$proc->importStyleSheet($xsl); // Attach the XSL rules
echo $proc->transformToXML($xml);
?>
