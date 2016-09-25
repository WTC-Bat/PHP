$(document.body).ready(function()
{
	$.ajax
	({
  		url: 'select.php',
		dataType: 'html',
  		success: function(data)
		{
    		console.log("Data: " + data);
  		},
		error: function(data)
		{
			console.log("Error");
		}
	});
});
