<div class="cont_l">
		{include file='profile/menu.tpl'}
		<div class="kalk">
			<div class="t_line"><i class="t_l"></i><i class="t_r"></i></div>
			<div class="kalk_pos">
				<form method="POST" action="" {if !$UserLogedIn} name="translation_form2" id="translation_form2" {else} name="translation_form" id="translation_form" {/if} enctype="multipart/form-data">
					<div class="txt_pos">
						<div style="position:absolute; align:right; z-index:4; cursor:arrow;">
							<input type="file" name="file" id="file" style="z-index:4; -moz-opacity:0; filter:alpha(opacity: 0); cursor:arrow; overflow: hidden; width:118px; margin-left:168px; height:22px; opacity:0; border:1px solid #000000;" />
						</div>
						<span class="sbm_button" style="z-index:3;"><input type="button" id="add_file_button" value="{$frontendLangParams.TITLE__ADD_FILE}" onclick="$('input[type=file]').click();"></span>
						{$frontendLangParams.TITLE__YOUR_TEXT}
					</div>
					<div class="txt_pos">
						<p class="t_area"><textarea name="translation_text" id="translation_text"></textarea></p>
					</div>
					<div class="txt_pos">
						<p class="txt_posr">
							{$frontendLangParams.TITLE__LANGUAGE_TO}
							<select id="lang_to_id" name="lang_to_id">
								<option value="0">{$frontendLangParams.TITLE__CHOOSE_LANGUAGE}</option>
								{foreach from=$languages_from item=lang_item}
									<option value="{$lang_item.lang_id}">{$lang_item.title|stripslashes|strip_tags}</option>
								{/foreach}								
							</select>
						</p>
						<p class="txt_posl">
							{$frontendLangParams.TITLE__LANGUAGE_FROM}
							<select id="lang_from_id" name="lang_from_id">
								<option value="0">{$frontendLangParams.TITLE__CHOOSE_LANGUAGE}</option>
								{foreach from=$languages_from item=lang_item}
									<option value="{$lang_item.lang_id}">{$lang_item.title|stripslashes|strip_tags}</option>
								{/foreach}
							</select>
						</p>
					</div>
					<div class="txt_pos">
						{$frontendLangParams.TITLE__TRANSLATION_CATEGORY}
						<select id="ttheme_id" name="ttheme_id">
							<option value="0">{$frontendLangParams.TITLE__CHOOSE_CATEGORY}</option>
							{foreach from=$translations_themes item=tthemes_item}
								<option value="{$tthemes_item.id}">{$tthemes_item.title|stripslashes|strip_tags}</option>
							{/foreach}
						</select>
					</div>
					<div class="txt_pos">
						<span class="m_sbm">
						{if !$UserLogedIn}
							<input type="button" id="calculate2" value="{$frontendLangParams.TITLE__CALCULATE_THE_COST_OF}">
						{else}
							<input type="button" id="calculate" value="{$frontendLangParams.TITLE__CALCULATE_THE_COST_OF}">
						{/if}
						</span>
						&nbsp;<br />
						<strong>&nbsp;</strong>
						<!--
						{$frontendLangParams.TITLE__PRICE}<br>
						<strong>0.00$</strong>
						-->
						<div id="tform_error0" style="display:none; width:100%; text-align:center; border:1px dotted #fff; margin-top:20px; color:#fff; text-alignfont-size:10px; font-weight:normal;">{$frontendLangParams.VALIDATION__INPUT_TTEXT_OR_CHOOSE_FILE}</div>
						<div id="tform_error1" style="display:none; width:100%; text-align:center; border:1px dotted #fff; margin-top:20px; color:#fff; text-alignfont-size:10px; font-weight:normal;">{$frontendLangParams.VALIDATION__CHOOSE_LANGUAGE_FROM}</div>
						<div id="tform_error2" style="display:none; width:100%; text-align:center; border:1px dotted #fff; margin-top:20px; color:#fff; text-alignfont-size:10px; font-weight:normal;">{$frontendLangParams.VALIDATION__CHOOSE_LANGUAGE_TO}</div>
						<div id="tform_error3" style="display:none; width:100%; text-align:center; border:1px dotted #fff; margin-top:20px; color:#fff; text-alignfont-size:10px; font-weight:normal;">{$frontendLangParams.VALIDATION__CHOOSE_THEME}</div>
						<div id="tform_error4" style="display:none; width:100%; text-align:center; border:1px dotted #fff; margin-top:20px; color:#fff; text-alignfont-size:10px; font-weight:normal;">{$frontendLangParams.VALIDATION__LANGUAGES_SHOULD_BE_DIFFERENT}</div>
                        <div id="tform_error5" style="display:none; width:100%; text-align:center; border:1px dotted #fff; margin-top:20px; color:#fff; text-alignfont-size:10px; font-weight:normal;">{$frontendLangParams.VALIDATION__FILE_EXTENSION_ERROR}</div>
						<input type="hidden" id="file-uploaded" value="{$frontendLangParams.TITLE__FILE_UPLOADED}" />
					</div>
					<div class="clear_line"></div>
				</form>
				<i class="b_l"></i><i class="b_r"></i>
			</div>
		</div>
		{if $review}
		<div class="otzivi">
			<div class="otzivi_pos">
				<h3><a href="">{$frontendLangParams.TITLE__REVIEWS}</a></h3>
				<p><b>{$review.user_name}</b> {$frontendLangParams.TITLE__WROTE}</p>
			</div>
			<div class="block">
				<i class="t_l"></i><i class="t_r"></i>
				<div class="block_pos">
						<div class="otzv_t"><div>
						{$review.text|stripslashes}
						</div></div>
				</div>
				<i class="b_l"></i><i class="b_r"></i>
			</div>
		</div>
		{/if}
</div>