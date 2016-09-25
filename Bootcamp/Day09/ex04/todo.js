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
	ajax.open("GET", "select.php?select=OK", true);
    ajax.send();
});

$("#btn").click(function()
{
	var todo = prompt("Add new TODO item:");

	if (todo != null)
	{
		var ajax = new XMLHttpRequest();
		ajax.onreadystatechange = function()
		{
			if (this.readyState == 4 && this.status == 200)
			{
				// console.log(this.responseText);
			}
		}
		ajax.open("GET", "insert.php?insert=" + todo, true);
		ajax.send();
		$("#ft_list").prepend("<div id=\"todo\">" + todo + "</div>");
	}
});

$(document.body).on("click", "#todo", function()
{
	if (confirm("Delete " + $(this).html() + "?") == true)
	{
		var ajax = new XMLHttpRequest();
		ajax.onreadystatechange = function()
		{
			if (this.readyState == 4 && this.status == 200)
			{
				// console.log(this.responseText);
			}
		}
		ajax.open("GET", "delete.php?delete=" + ($(this).html()), true);
		ajax.send();
		$(this).remove();
	}
});
