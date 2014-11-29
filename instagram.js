// JavaScript Document


//Use this url below to get your access token
//https://instagram.com/oauth/authorize/?display=touch&client_id=2579136181b543c5ba694d94db4a6947&redirect_uri=http://gentrysanders.com/fantasyfootball/redirect&response_type=token 

//if you need a user id for yourself or someone else use:
//http://jelled.com/instagram/lookup-user-id   user id = 276561954
	
						
$(function() {
	
	var apiurl = "https://api.instagram.com/v1/tags/fantasyfootball/media/recent?access_token=276561954.2579136.3e5b708346c7418e8d496f88f82a42c0&callback=?"
	var access_token = location.hash.split('=')[1];
	var html = ""
	
		$.ajax({
			type: "GET",
			dataType: "json",
			cache: false,
			url: apiurl,
			success: parseData
		});
				
		
		function parseData(json){
			console.log(json);
			
			$.each(json.data,function(i,data){
				html += '<p>Filter:"'+ data.filter+'"</p>';
				html += '<img src ="' + data.images.low_resolution.url + '">'
			});
			
			console.log(html);
			$("#results").append(html);
			
		}
		
		
                
               
 });
		
		
		
		
	

		
