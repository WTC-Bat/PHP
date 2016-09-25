$("#btn").click(function()
{
	var todo = prompt("Add new TODO item:");

	if (todo != null)
	{
		$("#ft_list").prepend("<div id=\"todo\">" + todo + "</div>");
		$("#todo").click(function()
		{
			if (confirm("Delete " + $(this).html() + "?") == true)
			{
				var cooks = document.cookie.split(';');
				for (var cnt = 0; cnt < cooks.length; cnt++)
				{
					var kval = cooks[cnt].split('=');
					if (kval[1] == $(this).html())
					{
						document.cookie = cooks[cnt] +
							"; expires=Thu, 01 Jan 1970 00:00:01 GMT;"
						$(this).remove();
						return ;
					}
				}
			}
		});
		document.cookie = todo + "=" + todo;
	}
});

$(document.body).ready(function()
{
	var cooks = document.cookie.split(';');

	if (cooks[0] != "")
	{
		for (var cnt = 0; cnt < cooks.length; cnt++)
		{
			var kval = cooks[cnt].split('=');
			$("#ft_list").prepend("<div id=\"iclick\">" + kval[1] + "</div>");
			$("#iclick").click(function()
			{
				if (confirm("Delete " + $(this).html() + "?") == true)
				{
					var cooks = document.cookie.split(';');
					for (var cnt = 0; cnt < cooks.length; cnt++)
					{
						var kval = cooks[cnt].split('=');
						if (kval[1] == $(this).html())
						{
							document.cookie = cooks[cnt] +
								"; expires=Thu, 01 Jan 1970 00:00:01 GMT;"
							$(this).remove();
							return ;
						}
					}
				}
			});
		}
	}
});
