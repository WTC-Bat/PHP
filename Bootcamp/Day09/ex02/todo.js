function addNew()
{
	var todo = prompt("Add new TODO item:");

	if (todo != null)
	{
		var list = document.getElementById("ft_list");
		var d = document.createElement("div");
		var dtxt = document.createTextNode(todo);
		var ccnt = cookieCount();

		d.setAttribute("onclick", "removeItem(this)");
		d.appendChild(dtxt);
		list.insertBefore(d, list.firstChild);
		//document.cookie = "todo" + ccnt + "=" + todo;
		document.cookie = todo + "=" + todo;
	}
}

function removeItem(elem)
{
	var cooks = document.cookie.split(';');

	for (var cnt = 0; cnt < cooks.length; cnt++)
	{
		var kval = cooks[cnt].split('=');
		if (kval[1] == elem.innerHTML)
		{
			document.cookie = cooks[cnt] +
				"; expires=Thu, 01 Jan 1970 00:00:01 GMT;"
			elem.remove()
			return ;
		}
	}
}

function cookieCount()
{
	var cooks = document.cookie.split(';');

	if (cooks[0] == "")
		return (0);
	else
		return (cooks.length);
}

function listcook()
{
	var cooks = document.cookie.split(';');

	for (var cnt = 0; cnt < cooks.length; cnt++)
	{
		console.log(cooks[cnt]);
	}
}
