<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Contact Message</title>
</head>
<body>
{if isset($name)}
<p>
	<b>Имя:</b>{$name|stripslashes}
</p>
{/if}
{if isset($phone)}
<p>
    <b>Телефон:</b>{$phone|stripslashes}
</p>
{/if}
{if isset($email)}
<p>
    <b>E-mail:</b>{$email|stripslashes}
</p>
{/if}
<p>
	{$message|stripslashes}
</p>
</body>
</html>
