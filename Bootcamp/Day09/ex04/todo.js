$(document.body).ready(function()
{
	var ajax = new XMLHttpRequest();
    ajax.onreadystatechange = function()
	{
        if (this.readyState == 4 && this.status == 200)
		{
			$("#ft_list").append(this.responseText);
        }
    };
    ajax.open("POST", "select.php?select=OK", true);
    ajax.send();
});
