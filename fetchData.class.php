<?php


class FetchData{
	private $apiUrl=null;
	private $superSecretKey=null;
	
	public function __construct(){
		$this->apiUrl="https://blockchain.info/ticker";
		$this->superSecretKey="abcxyz";
	}
	public function getData($apiKey=null, $itemsNo=null){
		if($apiKey!=$this->superSecretKey){
			//Just creating the web app a little secured.
			//If api key is not passed correctly from front end app will end
			die("Oops Credentials Error");
		}
		if($itemsNo==null || $itemsNo=="" || !isset($itemsNo)){
			//If no items numer passed, then return the full table
			$jsonData=file_get_contents($this->apiUrl);
		    $arrData=json_decode($jsonData,true);
		    
		    return $this->formatData($arrData);
		}
		else{
			//if items number passed then only return that many items
			if(is_numeric($itemsNo)) {
				$jsonData=file_get_contents($this->apiUrl);
				$arrData=json_decode($jsonData,true);
				$arrData=array_slice($arrData,0,$itemsNo);
				
				return $this->formatData($arrData);
			}
			else{
				//throw exception
			}
		}
	}
	
	public function formatData($arr){
		//print_r($arr);
		$output=[];
		foreach($arr as $key=>$valArr){
			$modifiedItem=array_merge(array("currency" => $key), $valArr);
			array_push($output, $modifiedItem);
		}
		return json_encode($output);
	}
}
?>