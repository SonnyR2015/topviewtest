//The following function fetches Data asynchrously from localserver
function fetchAsyncData(items){
	var url="appStart.php?api_key=abcxyz";
	if(items!=null && items!=""){
		url +="&items="+items;
	}
	var xhttp = new XMLHttpRequest();
	xhttp.onreadystatechange = function() {
	    if (this.readyState == 4 && this.status == 200) {
	        var jsonData=JSON.parse(xhttp.responseText);
	        var len=jsonData.length;
	        var htmlOutput="";
	        for(var i=0; i<len; i++){
	        	var rowItem=jsonData[i];
	        	htmlOutput +="<div class='row'><div class='cell'>"+rowItem["currency"]+"</div><div class='cell'>"+rowItem["15m"]+"</div><div class='cell'>"+rowItem["last"]+"</div><div class='cell'>"+rowItem["buy"]+"</div><div class='cell'>"+rowItem["sell"]+"</div><div class='cell'>"+rowItem["symbol"]+"</div></div>";
	        }
	        
	        document.getElementById("tableBody").innerHTML=htmlOutput;
	        
	    }
	};
	xhttp.open("GET", url, true);
	xhttp.send();
	
}

//The following function fires up on the button click
function fetchData(){
	var items=document.getElementById("inp_no_records").value;
	fetchAsyncData(items);
}

//The following function fires up window load
window.onload=function(){
	//alert('window loaded');
	fetchAsyncData();
}