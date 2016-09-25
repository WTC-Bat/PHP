$(document.body).ready(function()
{
	// $.ajax
	// ({
 //  		url: 'select.php',
	// 	dataType: 'html',
 //  		success: function(data)
	// 	{
    // 		console.log("Data: " + data);
 //  		},
	// 	error: function(data)
	// 	{
	// 		console.log("Error");
	// 	}
	// });
	var xmlhttp = new XMLHttpRequest();
    xmlhttp.onreadystatechange = function()
	{
        if (this.readyState == 4 && this.status == 200)
		{
            // console.log(this.responseText);
			$("#ft_list").append(this.responseText);
        }
    };
    xmlhttp.open("POST", "select.php?select=OK", true);
    xmlhttp.send();
});
