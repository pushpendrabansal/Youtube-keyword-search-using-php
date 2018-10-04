$(document).ready(function(){
$("#search").keyup(function(){
	 	var search = $('#search').val();
	 	if(search.length==0 || search.length==1){
	 		
    	}
	 	else{
		 	$.ajax({
		      	url: 'request.php',
		     	type: 'POST',
		     	data: {search:search},
			    success:function(data) {
			    			$("#result").html(data);
				}  	
			});
		}	
});
});