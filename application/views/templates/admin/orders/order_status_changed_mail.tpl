<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>The Order Status of Order <b>#{$order_number}</b> has been changed</title>
</head>

<body>
<p>Hi, {if $member.member_firstname!=''||$member.member_lastname!=''}{$member.member_firstname|stripslashes} {$member.member_lastname|stripslashes}{else}{$member.member_email}{/if}.<br /><br />
  Order status of Order <b>#{$order_number}</b> has been changed.<br />
  Right now order status is <b>"{$ostatus}".</b><br /><br />

  <i>The <a href="http://{$smarty.server.SERVER_NAME}">PetIdMe.com</a> Team</i>
</p>
</body>
</html>
