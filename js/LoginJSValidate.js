$(document).ready(function() 
{
	
	var spanUsername = $("<span class = \"info\" id =\"user\"></span>").text("Please provide us your full name.");
	var spanPassword = $("<span class = \"info\" id =\"pass\"></span>").text("Password should be at least 8 characters long.");
	var spanRePassword = $("<span class = \"info\" id =\"repass\"></span>").text("Confirm password should be same as password entered before.");
	var spanEmail = $("<span class = \"info\" id =\"email\"></span>").text("Please provide a valid email addresss");

	$("#Username").parent().append(spanUsername);
	$("#Password").parent().append(spanPassword);
	$("#RePassword").parent().append(spanRePassword);
	$("#Email").parent().append(spanEmail);
	
	$("#user").hide();
	$("#pass").hide();
	$("#repass").hide();
	$("#email").hide();
	
	$("#Username").focusin(function()
	{

		$("#Username").removeClass("error").addClass("info");
		$("#user").show();
	
	});
	
	$("#Password").focusin(function()
	{
			
		$("#pass").removeClass("error").addClass("info");
		$("#pass").show();
		
	});
	
	$("#RePassword").focusin(function()
	{
			
		$("#repass").removeClass("error").addClass("info");
		$("#repass").show();
		
	});
	
	$("#Email").focusin(function()
	{
			
		$("#email").removeClass("error").addClass("info");
		$("#email").show();
		
	});
	
	$("#Username").focusout(function()
	{
	
		var usernamematch =  /^[a-z0-9\\-]+$/i;
		
		if(!$("#Username").val().match(usernamematch))
		{
			
			$("#user").removeClass("info").addClass("error");
			
		}	
		else
		{
			
			$("#user").removeClass("info");
			$("#user").removeClass("error");
			$("#user").hide();
		
		}

	});
	
	$("#Password").focusout(function()
	{

		var passwordmatch = ^[a-zA-Z]\w{3,14}$;
		
		if($("#Password").val().match(passwordmatch))
		{
			
			$("#pass").removeClass("info").addClass("error");
			
		}
		else
		{
			
			$("#pass").removeClass("info");
			$("#pass").removeClass("error");
			$("#pass").show();
			
		}

	});
	
	$("#RePassword").focusout(function()
	{

		$("#repass").removeClass("info");
		$("#repass").removeClass("error");
		$("#repass").hide();

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