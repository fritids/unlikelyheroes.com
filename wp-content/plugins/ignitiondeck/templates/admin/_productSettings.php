<div class="wrap">
	<?php echo (isset($message) ? $message : '');?>
	<div class="postbox-container" style="width:95%; margin-right: 5%">
		<div class="metabox-holder">
			<div class="meta-box-sortables" style="min-height:0;">
				<div class="postbox">
					<h3 class="hndle"><span><?php echo $tr_Default_Product_Settings; ?></span><a href="javascript:toggleDiv('hDefaultset');" class="idMoreinfo">[?]</a></h3>
					<div class="inside">
						<div id="hDefaultset" class="idMoreinfofull">
							This is where you set the defaults for whenever you create a new project on your website.  Whatever you set here, is what each project will default to, unless oyu set its custom settings below.<br><br>
							
							Currency Code: this is the currency PayPal will collect funds in, as well as the currency that will be displayed publicly.<br><br>
							
							Address information: Ask for this if some of your reward levels involve shipping an item.  We highly suggest however, that you email all of your supporters once it’s actually time to ship, to get up to date shipping information from them at that time.
						</div>
						<div>
							<form name="formdefaultsettings" id="formdefaultsettings" action="" method="post">
								<table>
									<tr>
										<td><strong><?php echo $tr_Currency_Code; ?></strong></td>
										<td colspan="2"><select name="currency_code_default" id="currency_code_default">
											<option <?php echo ((isset($default_currency) && $default_currency->currency_code == "USD") ? 'selected="selected"' : '')?> value="USD">U.S. Dollar</option>
											<option <?php echo ((isset($default_currency) && $default_currency->currency_code == "AUD") ? 'selected="selected"' : '')?> value="AUD">Australian Dollar</option>
											<option <?php echo ((isset($default_currency) && $default_currency->currency_code == "CAD") ? 'selected="selected"' : '')?> value="CAD">Canadian Dollar</option>
											<option <?php echo ((isset($default_currency) && $default_currency->currency_code == "CZK") ? 'selected="selected"' : '')?> value="CZK">Czech Koruna</option>
											<option <?php echo ((isset($default_currency) && $default_currency->currency_code == "DKK") ? 'selected="selected"' : '')?> value="DKK">Danish Krone</option>
											<option <?php echo ((isset($default_currency) && $default_currency->currency_code == "EUR") ? 'selected="selected"' : '')?> value="EUR">Euro</option>
											<option <?php echo ((isset($default_currency) && $default_currency->currency_code == "HKD") ? 'selected="selected"' : '')?> value="HKD">Hong Kong Dollar</option>
											<option <?php echo ((isset($default_currency) && $default_currency->currency_code == "HUF") ? 'selected="selected"' : '')?> value="HUF">Hungarian Forint</option>
											<option <?php echo ((isset($default_currency) && $default_currency->currency_code == "ILS") ? 'selected="selected"' : '')?> value="ILS">Israeli New Sheqel</option>
											<option <?php echo ((isset($default_currency) && $default_currency->currency_code == "JPY") ? 'selected="selected"' : '')?> value="JPY">Japanese Yen</option>
											<option <?php echo ((isset($default_currency) && $default_currency->currency_code == "MXN") ? 'selected="selected"' : '')?> value="MXN">Mexican Peso</option>
											<option <?php echo ((isset($default_currency) && $default_currency->currency_code == "MYR") ? 'selected="selected"' : '')?> value="MYR">Malaysian Ringgit</option>
											<option <?php echo ((isset($default_currency) && $default_currency->currency_code == "NOK") ? 'selected="selected"' : '')?> value="NOK">Norwegian Krone</option>
											<option <?php echo ((isset($default_currency) && $default_currency->currency_code == "NZD") ? 'selected="selected"' : '')?> value="NZD">New Zealand Dollar</option>
											<option <?php echo ((isset($default_currency) && $default_currency->currency_code == "PHP") ? 'selected="selected"' : '')?> value="PHP">Philippine Peso</option>
											<option <?php echo ((isset($default_currency) && $default_currency->currency_code == "PLN") ? 'selected="selected"' : '')?> value="PLN">Polish Zloty</option>
											<option <?php echo ((isset($default_currency) && $default_currency->currency_code == "GBP") ? 'selected="selected"' : '')?> value="GBP">Pound Sterling</option>
											<option <?php echo ((isset($default_currency) && $default_currency->currency_code == "SGD") ? 'selected="selected"' : '')?> value="SGD">Singapore Dollar</option>
											<option <?php echo ((isset($default_currency) && $default_currency->currency_code == "SEK") ? 'selected="selected"' : '')?> value="SEK">Swedish Krona</option>
											<option <?php echo ((isset($default_currency) && $default_currency->currency_code == "CHF") ? 'selected="selected"' : '')?> value="CHF">Swiss Franc</option>
											<option <?php echo ((isset($default_currency) && $default_currency->currency_code == "TWD") ? 'selected="selected"' : '')?> value="TWD">New Taiwan Dollar</option>
											<option <?php echo ((isset($default_currency) && $default_currency->currency_code == "THB") ? 'selected="selected"' : '')?> value="THB">Thai Baht</option>
											<option <?php echo ((isset($default_currency) && $default_currency->currency_code == "TRY") ? 'selected="selected"' : '')?> value="TRY">Turkish Lira</option>
											<option <?php echo ((isset($default_currency) && $default_currency->currency_code == "BRL") ? 'selected="selected"' : '')?> value="BRL">Brazilian Real</option>
										</select></td>
									</tr>
									<tr>
										<td>&nbsp;</td>
										<td><a href="#" id="check-all-settings">Check All</a></td>
										<td><a href="#" id="clear-all-settings">Clear All</a></td>
									</tr>
									<tr>
										<td><strong><?php echo $tr_Field_name; ?></strong></td>
										<td><strong><?php echo $tr_Enabled; ?></strong></td>
										<td><strong><?php echo $tr_Mandatory; ?></strong></td>
									</tr>
									<tr>
										<td><?php echo $tr_First_name; ?></td>
										<td><input type="checkbox" <?php echo (isset($form_default['first_name']['status']))?'checked="checked"':''; ?> name="ignitiondeck_form_default[first_name][status]" class="main-setting"/></td>
										<td><input type="checkbox" <?php echo (isset($form_default['first_name']['mandatory']))?'checked="checked"':''; ?> name="ignitiondeck_form_default[first_name][mandatory]" class="main-setting"/></td>
									</tr>
									<tr>
										<td><?php echo $tr_Last_name; ?></td>
										<td><input type="checkbox" <?php echo (isset($form_default['last_name']['status']))?'checked="checked"':''; ?> name="ignitiondeck_form_default[last_name][status]" class="main-setting"/></td>
										<td><input type="checkbox" <?php echo (isset($form_default['last_name']['mandatory']))?'checked="checked"':''; ?> name="ignitiondeck_form_default[last_name][mandatory]" class="main-setting"/></td>
									</tr>
									<tr>
										<td><?php echo $tr_Email; ?></td>
										<td><input type="checkbox" <?php echo (isset($form_default['email']['status']))?'checked="checked"':''; ?> name="ignitiondeck_form_default[email][status]" class="main-setting"/></td>
										<td><input type="checkbox" <?php echo (isset($form_default['email']['mandatory']))?'checked="checked"':''; ?> name="ignitiondeck_form_default[email][mandatory]" class="main-setting"/></td>
									</tr>
									<tr>
										<td><?php echo $tr_Address; ?></td>
										<td><input type="checkbox" <?php echo (isset($form_default['address']['status']))?'checked="checked"':''; ?> name="ignitiondeck_form_default[address][status]" class="main-setting"/></td>
										<td><input type="checkbox" <?php echo (isset($form_default['address']['mandatory']))?'checked="checked"':''; ?>name="ignitiondeck_form_default[address][mandatory]" class="main-setting"/></td>
									</tr>
									<tr>
										<td><?php echo $tr_Country; ?></td>
										<td><input type="checkbox" <?php echo (isset($form_default['country']['status']))?'checked="checked"':''; ?> name="ignitiondeck_form_default[country][status]" class="main-setting"/></td>
										<td><input type="checkbox" <?php echo (isset($form_default['country']['mandatory']))?'checked="checked"':''; ?> name="ignitiondeck_form_default[country][mandatory]" class="main-setting"/></td>
									</tr>
									<tr>
										<td><?php echo $tr_State; ?></td>
										<td><input type="checkbox" <?php echo 
										(isset($form_default['state']['status']))?'checked="checked"':''; ?> name="ignitiondeck_form_default[state][status]" class="main-setting"/></td>
										<td><input type="checkbox" <?php echo (isset($form_default['state']['mandatory']))?'checked="checked"':''; ?> name="ignitiondeck_form_default[state][mandatory]" class="main-setting"/></td>
									</tr>
									<tr>
										<td><?php echo $tr_City; ?></td>
										<td><input type="checkbox" <?php echo (isset($form_default['city']['status']))?'checked="checked"':''; ?> name="ignitiondeck_form_default[city][status]" class="main-setting"/></td>
										<td><input type="checkbox" <?php echo (isset($form_default['city']['mandatory']))?'checked="checked"':''; ?> name="ignitiondeck_form_default[city][mandatory]" class="main-setting"/></td>
									</tr>
									<tr>
										<td><?php echo $tr_Zip; ?></td>
										<td><input type="checkbox" <?php echo (isset($form_default['zip']['status']))?'checked="checked"':''; ?> name="ignitiondeck_form_default[zip][status]" class="main-setting"/></td>
										<td><input type="checkbox" <?php echo (isset($form_default['zip']['mandatory']))?'checked="checked"':''; ?> name="ignitiondeck_form_default[zip][mandatory]" class="main-setting"/></td>
									</tr>
									<tr>
										<td>&nbsp;</td>
									</tr>
									<tr>
										<td><strong><?php echo $tr_Default_Purchase_Page; ?></strong></td>
									</tr>
									<tr>
										<td>
											<select name="ign_option_purchase_url" id="select_purchase_pageurls" onchange=storepurchaseurladdress();>
												<option value="page_or_post" <?php echo (!empty($purchase_default['option']) && $purchase_default['option'] == 'page_or_post' ? 'selected="selected"' : ''); ?>><?php echo $tr_Page_Post; ?></option>
												<option value="external_url" <?php echo (!empty($purchase_default['option']) && $purchase_default['option'] == 'external_url' ? 'selected="selected"' : ''); ?>><?php echo $tr_External_URL; ?></option>
											</select>
										</td>
									</tr>
									<tr>
										<td id="purchase_url_cont" <?php echo (empty($purchase_default['option']) || $purchase_default['option'] !== 'external_url' ? 'style="display: none;"' : ''); ?>>
											<input class="purchase-url-container" name="id_purchase_URL" type="text" id="id_purchase_URL" value="<?php echo (isset($purchase_default['option']) && $purchase_default['option'] == 'external_url' && isset($purchase_default['value']) ? $purchase_default['value'] : ''); ?>">
										</td>
									</tr>
									<tr>
										<td>
											<div id="purchase_posts">
								            <select name="ign_purchase_post_name" id="posts_pro">
								            	<option value="0"><?php echo $tr_Select; ?></option>
												<?php if ($list->have_posts()) {
													while ($list->have_posts()) {
														$list->the_post();
														$post_id = get_the_ID();
														echo '<option value="'.$post_id.'" '.(!empty($purchase_default['option']) && $purchase_default['option'] == 'page_or_post' && isset($purchase_default['value']) && $purchase_default['value'] == $post_id ? 'selected="selected"' : '').'>'.get_the_title().'</option>';
													}
												} ?>
								            </select>
								        </td>
									</tr>
									<tr>
										<td><strong><?php echo $tr_Default_Thank_You_Page; ?></strong></td>
									</tr>
									<tr>
										<td>
											<select name="ign_option_ty_url" id="select_ty_pageurls" onchange=storetyurladdress();>
												<option value="page_or_post" <?php echo (!empty($ty_default['option']) && $ty_default['option'] == 'page_or_post' ? 'selected="selected"' : ''); ?>><?php echo $tr_Page_Post; ?></option>
												<option value="external_url" <?php echo (!empty($ty_default['option']) && $ty_default['option'] == 'external_url' ? 'selected="selected"' : ''); ?>><?php echo $tr_External_URL; ?></option>
											</select>
										</td>
									</tr>
									<tr>
										<td id="ty_url_cont" <?php echo (empty($ty_default['option']) || $ty_default['option'] !== 'external_url' ? 'style="display: none;"' : ''); ?>>
											<input class="ty-url-container" name="id_ty_URL" type="text" id="id_ty_URL" value="<?php echo (isset($ty_default['option']) && $ty_default['option'] == 'external_url' && isset($ty_default['value']) ? $ty_default['value'] : ''); ?>">
										</td>
									</tr>
									<tr>
										<td>
											<div id="ty_posts">
								            <select name="ign_ty_post_name" id="posts_pro">
								            	<option value="0"><?php echo $tr_Select; ?></option>
												<?php if ($list->have_posts()) {
													while ($list->have_posts()) {
														$list->the_post();
														$post_id = get_the_ID();
														echo '<option value="'.$post_id.'" '.(!empty($ty_default['option']) && $ty_default['option'] == 'page_or_post' && isset($ty_default['value']) && $ty_default['value'] == $post_id ? 'selected="selected"' : '').'>'.get_the_title().'</option>';
													}
												} ?>
								            </select>
								        </td>
									</tr>
									<tr>
										<td>&nbsp;</td>
									</tr>
									<tr>
										<td colspan="3">
											<input class="button-primary" type="submit" name="btnSubmitDefaultSettings" id="btnAddOrder" value="<?php echo $submit_default?>" />
										</td>
									</tr>
								</table>
							</form>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>
