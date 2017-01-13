<?php
	/*
	Template Name: Contact Us
	*/	
?>
<?php get_header(); ?>
<script type="text/javascript" src="<?php bloginfo('template_directory') ?>/js/placeholder.js"></script>
<style>
input,select,textarea {
	outline:none;	
}
</style>
  <div id="content-cont">
    <div id="banner"> <img src="<?php bloginfo('template_directory') ?>/images/banner-inner.jpg" alt="banner" /> </div>
    <div class="clear"></div>
    <div id="content">
        <h1>Contact Us</h1>
          <?php if (have_posts()) : while (have_posts()) : the_post();?>
 				 	<?php the_content(); ?>
 					<?php endwhile; endif; ?>
        <div style='width: 646px; float: left; position: relative; padding: 0; margin: 0;display: block; height: 461px;'>
       		<form name='inquiryform' method='post' action='/thank-you-for-the-inquiry/'>
       		<div style='display: block;width: 646px; padding: 0; margin: 0; height: 56px; background-image: url(<?php bloginfo('template_directory') ?>/images/contact_us_03.jpg);'>       			
       		</div>       		
       		<div style='display: inline-block; padding: 0; margin: 0; position: absolute; top: 56px; left: 0px; width: 375px; height: 38px; background-image: url(<?php bloginfo('template_directory') ?>/images/contact_us_05.jpg); background-repeat: no-repeat;'> 
       			<input name="their_name" data-ph="Your Name" type='text' style='width: 325px; margin-left: 40px; margin-top: 9px; background: transparent; border: 0; font-family: 'Open Sans', sans-serif; font-size: 14pt; font-weight: light;'>
       		</div>
       		<div style='display: block; padding: 0; margin: 0; position: absolute; top: 56px; left: 375px; width: 271px;height: 38px; background-image: url(<?php bloginfo('template_directory') ?>/images/contact_us_06.jpg); background-repeat: no-repeat;'>
       			<input name="number" data-ph="Your Number" type='text' style='width: 240px; margin-left: 14px; margin-top: 10px; background: transparent; border: 0; font-family: 'Open Sans', sans-serif; font-size: 14pt; font-weight: light;'>
       		</div>     	 		
       		<div style='display: block; padding: 0; margin: 0; position: absolute; top: 94px; left: 0px; width: 646px; height: 7px; background-image: url(<?php bloginfo('template_directory') ?>/images/contact_us_07.jpg); background-repeat: no-repeat;'> 
       		</div>
       		<div style='display: inline-block; padding: 0; margin: 0; position: absolute; top: 101px; left: 0px; width: 375px; height: 38px; background-image: url(<?php bloginfo('template_directory') ?>/images/contact_us_08.jpg); background-repeat: no-repeat;'> 
       			<input name="email" data-ph="Email Address" type='text' style='width: 325px; margin-left: 40px; margin-top: 9px; background: transparent; border: 0; font-family: 'Open Sans', sans-serif; font-size: 14pt; font-weight: light;'>
       		</div>
       		<div style='display: block; padding: 0; margin: 0; position: absolute; top: 101px; left: 375px; width: 271px;height: 38px; background-image: url(<?php bloginfo('template_directory') ?>/images/contact_us_09.jpg); background-repeat: no-repeat;'>
       			<input name="postal_code" data-ph="Postal Code" type='text' style='width: 240px; margin-left: 14px; margin-top: 10px; background: transparent; border: 0; font-family: 'Open Sans', sans-serif; font-size: 14pt; font-weight: light;'>
       		</div>
       		<div style='display: block; padding: 0; margin: 0; position: absolute; top: 139px; left: 0px; width: 646px; height: 6px; background-image: url(<?php bloginfo('template_directory') ?>/images/contact_us_10.jpg); background-repeat: no-repeat;'>        		
       		</div>
       		<div style='display: inline-block; padding: 0; margin: 0; position: absolute; top: 145px; left: 0px; width: 183px; height: 39px; background-image: url(<?php bloginfo('template_directory') ?>/images/contact_us_11.jpg); background-repeat: no-repeat;'> 
       			<select name="inquiry_type" style='margin-top: 11px; width: 117px; margin-left: 40px; background: transparent; border: 0; font-family: 'open Sans', sans-serif; font-size: 14pt; font-weight: light;'>
       				<option>Inquiry Type</option>
       				<option>General</option>
       				<option>Funding</option>
       				<option>Media</option>
       				
       			</select>
       		</div>
       		<div style='display: block; padding: 0; margin: 0; position: absolute; top: 145px; left: 183px; width: 463px;height: 39px; background-image: url(<?php bloginfo('template_directory') ?>/images/contact_us_12.jpg); background-repeat: no-repeat;'>
       			<input name="subject" data-ph="Message Title" type='text' style='width: 420px; margin-left: 18px; margin-top: 10px; background: transparent; border: 0; font-family: 'Open Sans', sans-serif; font-size: 14pt; font-weight: light;'>
       		</div>
       		<div style='display: block; padding: 0; margin: 0; position: absolute; top: 184px; left: 0px; width: 646px;height: 214px; background-image: url(<?php bloginfo('template_directory') ?>/images/contact_us_13.jpg); background-repeat: no-repeat;'>
       			<textarea name="message" style='width: 580px; height: 200px; margin-top: 18px; margin-bottom: 18px; margin-left: 40px; margin-right: 40px; background: transparent; border: 0; font-family: 'Open Sans',sans-serif; font-size: 14pt; font-weight: light;'></textarea>
       		</div>
       		<div style='display: inline-block; padding: 0; margin: 0; position: absolute; top: 398px; left: 0px; width: 433px;height: 63px; background-image: url(<?php bloginfo('template_directory') ?>/images/contact_us_14.jpg); background-repeat: no-repeat;'>
       		</div>
       		<div style='display: inline-block; padding: 0; margin: 0; position: absolute; top: 398px; left: 433px; width: 149px;height: 63px;'>
       			<a href="#" onclick="jQuery(document).disablePlaceHolders();document.inquiryform.submit();return false"><img src='<?php bloginfo('template_directory') ?>/images/contact_us_16.jpg' alt='Submit button'></a>
       			<br>
       			<img src='<?php bloginfo('template_directory') ?>/images/contact_us_18.jpg' alt='Whitespace'>
       		</div>
       		<div style='display: block; padding: 0; margin: 0; position: absolute; top: 398px; left: 582px; width: 63px; height: 63px;background-image: url(<?php bloginfo('template_directory') ?>/images/contact_us_17.jpg); background-repeat: no-repeat;'>
       		</div>       		        
       		</form>	
      		<br style='clear: both;'>
      	</div>                     
      	<br style='clear: both;'>
    </div>
    <?php get_footer(); ?>