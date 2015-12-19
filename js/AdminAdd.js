$(document).ready(function() 
{

	var spancategory = $("<span class = \"info\" id =\"cat\"></span>").text("Please select a category.");
	var spanitemname = $("<span class = \"info\" id =\"item\"></span>").text("Please provide an item name.");
	var spanprice = $("<span class = \"info\" id =\"pri\"></span>").text("Please provide item price.");
	var spanpicture = $("<span class = \"info\" id =\"pict\"></span>").text("Please provide item picture name without path and extension");
	var spandescription = $("<span class = \"info\" id =\"desc\"></span>").text("Please provide item description.");
	var spanitemtype = $("<span class = \"info\" id =\"itemtype\"></span>").text("Please select an item type.");
	var spanquantity = $("<span class = \"info\" id =\"quant\"></span>").text("Please provide item quantity.");

	$("#category").parent().append(spancategory);
	$("#itemname").parent().append(spanitemname);
	$("#price").parent().append(spanprice);
	$("#picture").parent().append(spanpicture);	
	$("#description").parent().append(spandescription);
	$("#type").parent().append(spanitemtype);
	$("#quantity").parent().append(spanquantity);
	
	$("#cat").hide();
	$("#item").hide();
	$("#pri").hide();
	$("#pict").hide();
	$("#desc").hide();
	$("#itemtype").hide();
	$("#quant").hide();
	
	$("#category").focusin(function()
	{

		$("#cat").removeClass("error").addClass("info");
		$("#cat").show();
	
	});
	
	$("#itemname").focusin(function()
	{
			
		$("#item").removeClass("error").addClass("info");
		$("#item").show();
		
	});
	
	$("#price").focusin(function()
	{
			
		$("#pri").removeClass("error").addClass("info");
		$("#pri").show();
		
	});
	
	$("#picture").focusin(function()
	{
			
		$("#pict").removeClass("error").addClass("info");
		$("#pict").show();
		
	});

	$("#description").focusin(function()
	{

		$("#desc").removeClass("error").addClass("info");
		$("#desc").show();
	
	});
	
	$("#type").focusin(function()
	{
			
		$("#itemtype").removeClass("error").addClass("info");
		$("#itemtype").show();
		
	});
	
	$("#quantity").focusin(function()
	{
			
		$("#quant").removeClass("error").addClass("info");
		$("#quant").show();
		
	});
	
	
	$("#quantity").focusout(function()
	{

		$("#quant").removeClass("info");
		$("#quant").removeClass("error");
		$("#quant").hide();

	});
	
	$("#type").focusout(function()
	{

		$("#itemtype").removeClass("info");
		$("#itemtype").removeClass("error");
		$("#itemtype").hide();

	});
	
	$("#description").focusout(function()
	{

		$("#desc").removeClass("info");
		$("#desc").removeClass("error");
		$("#desc").hide();

	});
	
	$("#picture").focusout(function()
	{

		$("#pict").removeClass("info");
		$("#pict").removeClass("error");
		$("#pict").hide();

	});
	
		$("#itemname").focusout(function()
	{

		$("#item").removeClass("info");
		$("#item").removeClass("error");
		$("#item").hide();

	});
	
	$("#category").focusout(function()
	{

		$("#cat").removeClass("info");
		$("#cat").removeClass("error");
		$("#cat").hide();

	});
	
	$("#price").focusout(function()
	{

		$("#pri").removeClass("info");
		$("#pri").removeClass("error");
		$("#pri").hide();

	});
	
});