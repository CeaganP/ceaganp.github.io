<?php
$LINK = filter_input(INPUT_GET, 'link', FILTER_SANITIZE_STRING);

//GET MY LINKEDIN content for the link provided to this
//THIS IS A URL
$html = file_get_contents($LINK);

//$p = $html->find('p'); // Find all p tags.

//get the summary object from the profile
$summaryContent = $html->find('.summary');
//read the paragraph tag, this contains the content we want

$response["about"] = $summaryContent->find('p');
$response["ok"] = true;

//$element_id = $html->find('#element'); // Find element with the id element
return json_encode($response);
?>