<h1>{$frontendLangParams.FEEDBACK__HEADER}</h1>
<center><p>{$settings.text_message_sent|stripslashes|strip_tags}!</p></center>
{literal}
<script type="text/javascript">
	setTimeout(function () { document.location.href='/{/literal}{$lang_title}{literal}/feedback.html'; }, 5000);
</script>
{/literal}
