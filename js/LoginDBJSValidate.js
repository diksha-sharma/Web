$(document).ready(function() 
{
	
	var spanPassword = $("<span class = \"info\" id =\"pass\"></span>").text("Please enter your password.");
	var spanEmail = $("<span class = \"info\" id =\"email\"></span>").text("Please provide a valid email addresss");

	$("#Password").parent().append(spanPassword);
	$("#Email").parent().append(spanEmail);
	
	$("#pass").hide();
	$("#email").hide();
	
	$("#Password").focusin(function()
	{
			
		$("#pass").removeClass("error").addClass("info");
		$("#pass").show();
		
	});
	
	$("#Email").focusin(function()
	{
			
		$("#email").removeClass("error").addClass("info");
		$("#email").show();
		
	});

	$("#Password").focusout(function()
	{

		$("#pass").removeClass("info");
		$("#pass").removeClass("error");
		$("#pass").hide();

	});
	
	$("#Email").focusout(function()
	{

		$("#email").removeClass("info");
		$("#email").removeClass("error");
		$("#email").hide();

	});
	
	$("#Email").focusout(function()
	{
		
		if($("#Email").val().indexOf("@",0) < 0) 
		{
			
			$("#email").removeClass("info").addClass("error");
			
		}
		else if($("#Email").val().indexOf(".",0) < 0) 
		{
			
			$("#email").removeClass("info").addClass("error");
			
		}
		else
		{
			
			$("#email").removeClass("info");
			$("#email").removeClass("error");
			$("#email").show();
			
		}
		
	});

});