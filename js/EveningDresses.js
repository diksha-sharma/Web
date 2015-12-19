$(document).ready(function()
{
	
	$("#submit").click(function(e){
		
		var size = $("#size").val();
        
		$.ajax({
			
			url: "http://localhost/html/EveningDresses.php",
			type: "get",
			data:  {"size": size},
			dataType: "json",
			success: function(data,status)
			{

				for(var i = 0; i < 2; i++)
				{
					
					$("#dresses").append("<img src = \"data[i]\" class=\"items\"/>");
					$("#dresses").append("<p class =\"details\">");
					$("#dresses").append("<ul>");
					$("#dresses").append("<li>");
					$("#dresses").text("Item Name:");
					$("#dresses").text($item[i]);
					$("#dresses").append("</li>");
					$("#dresses").append("<li>");
					$("#dresses").text("Item Description:");
					$("#dresses").append("</li>");
					$("#dresses").append("<li>");
					$("#dresses").text("Item Price:");
					$("#dresses").append("</li>");
					$("#dresses").append("</ul>");
					$("#dresses").append("</p>");
					
				}
							
			},
			error: function(err) 
			{
			
				alert("Error encountered \nError:" + err);
			}		
		
		});	
		
	});	

});