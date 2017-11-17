<?php
//This is the starting point of the web app
//Front end calls on this file
require_once 'fetchData.class.php';

$secretApiKey=null;
$items=null;

if(isset($_GET["api_key"])){
	$secretApiKey=trim($_GET["api_key"]);
}
if(isset($_GET["items"])){
	$items=trim($_GET["items"]);
}

$fetchData=new FetchData();
echo $fetchData->getData($secretApiKey, $items);

?>