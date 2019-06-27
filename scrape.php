<?php

if(isset($_GET['search']))
{
	$user_keyword = $_GET['user_query'];

	$ch = curl_init();

	curl_setopt($ch, CURLOPT_URL, $user_keyword);
	curl_setopt($ch, CURLOPT_POST, false);
	curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);

	$html = curl_exec($ch);
	curl_close($ch);

	$DOM = new DOMDocument();
	libxml_use_internal_errors(true);
	$DOM->loadHTML($html);

	$elements = $DOM->getElementsByTagName('a');

	for($i=0; $i<$elements->length; $i++)
	{
		echo $elements->item($i)->getAttribute('href')."<br>";
	}

	// foreach ($DOM->getElementsByTagName('a') as $link) {
	// 	echo $link->textContent."<br>";
	// }
	
}

?>