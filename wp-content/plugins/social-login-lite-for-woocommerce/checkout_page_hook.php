<?php 

add_action( 'woocommerce_before_checkout_form', 'psl_add_checkout_notice', 10);
function psl_add_checkout_notice() {
	extract($setting_data['facebook_details']);
	extract($setting_data['google_plus_details']);
		if($enable_facebook=='on'|| $enable_google_plus=='on' ){
			wc_print_notice( __("Social Sign In: <a href='#' id='social_login'>".$checkout_label."</a>", 'woocommerce' ), 'notice' );
			?>
				<p class="form-row form-row-first login-checkout">
				   <?php if($enable_facebook=='on'){ ?>
				   <img src='<?php if($fb_icon_url!=''){ echo $fb_icon_url;}else{ echo plugin_dir_url( __FILE__ )."images/facebook.png"; } ?>'   style="cursor:pointer;" onclick="facebook_login()"/>
				   <?php } if($enable_google_plus=='on'){ ?>
				   <img src='<?php if($google_icon_url!=''){ echo $google_icon_url;}else{ echo plugin_dir_url( __FILE__ )."images/google-plus.png";} ?>'   style="cursor:pointer;" onclick="google_login()"/>
				 </p>
			<?php 
 }
  wp_enqueue_script("checkout-js", plugin_dir_url( __FILE__ )."js/checkout.js",array('jquery'),'',true);
  ?>