<?php
$url = filter_input(INPUT_GET, 'link', FILTER_SANITIZE_STRING);

//GET MY LINKEDIN content for the link provided to this
//THIS IS A URL
//$html = file_get_contents(strval($LINK));


//fopen opens webpage in Binary
$handle = fopen($url,"rb");
// initialize
$aboutContent = "";

// read content line by line
do
{
	$data = fread($handle,1024);
	if(strlen($data)==0) 
	{
		break;
	}
	
	$aboutContent .= $data;
}
while(true);
//close handle to release resources
fclose($handle);

//get the summary object from the profile
$summaryContent = $aboutContent->find('.summary');
//read the paragraph tag, this contains the content we want

$response["about"] = $summaryContent->find('p');
$response["ok"] = true;

//$element_id = $html->find('#element'); // Find element with the id element
echo json_encode($response);
?>