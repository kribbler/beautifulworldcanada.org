<?php 
wp_footer(); 
?>
<div id="footer"<?php echo ($_SESSION['skip_socialfooter'] !== TRUE) ? ' class="skipsociallinks"' : ''; ?>>
      <div class="footer-top" style='padding-top: 28px; text-align: center;'>
      	<?php      		
      		if($_SESSION['skip_socialfooter'] !== TRUE) {
      	?>			
      		<a href='http://www.facebook.com/beautifulworldcanada' target="_blank"><img style='display: inline-block; ' src='/wp-content/themes/beautifulworld/images/about_us_14.jpg' alt='Social Networking Link, Facebook.'></a>
      		<!--<a href="http://twitter.com/BeautifulWorld" target="_blank"><img style='display: inline-block;' src='/wp-content/themes/beautifulworld/images/about_us_16.jpg' alt='Social Networking Link, Twitter.'></a>-->
      		<!--<a href='http://www.linkedin.com/company/beautiful-world-canada' target="_blank"><img style='display: inline-block;' src='/wp-content/themes/beautifulworld/images/about_us_18.jpg' alt='Social Networking Link, LinkedIn.'></a>-->
      		<a href='http://www.youtube.com/channel/UCf5MZ4DeIVRNRlBt-TuVwBw' target="_blank"><img style='display: inline-block;' src='/wp-content/themes/beautifulworld/images/about_us_20.jpg' alt='Social Networking Link, YouTube.'></a>
      		<!--<a href='http://www.beautifulworldcanada.tumblr.com' target="_blank"><img style='display: inline-block;' src='/wp-content/themes/beautifulworld/images/about_us_22.jpg' alt='Social Networking Link, Tumblr.'></a>-->

      	<?php
      		}
      	?>
   		    <div><a href="#" onclick="jQuery('#mc_embed_signup_parent').show(100);" id="nlbutton" style="width:138px;white-space:nowrap">Newsletter Sign-Up</a></div>
			<div id="mc_embed_signup_parent">
			<div id="mc_embed_signup_parent_hide" onclick="jQuery('#mc_embed_signup_parent').hide();"> </div>
				<div id="mc_embed_signup">
					<form action="http://beautifulworldcanada.us7.list-manage2.com/subscribe/post?u=21ef48afee0e1bb3fbfa7c672&amp;id=13b8e4f085" method="post" id="mc-embedded-subscribe-form" name="mc-embedded-subscribe-form" class="validate" target="_blank" novalidate>
						<label for="mce-EMAIL">Sign up for our newsletter</label>
						<input type="email" value="" name="EMAIL" class="email" id="mce-EMAIL" placeholder="email address" required>
						<div class="clear"><input type="submit" value="Subscribe" name="subscribe" id="mc-embedded-subscribe" class="button"></div>
					</form>
				</div>
			</div>
      </div>
      <div class="footer-left">
				<?php wp_nav_menu(array('theme_location'=>'footer','container_class' => 'menu1 ','menu_class'=>' ',)); ?>
      </div>
      <div class="footer-right"> <img src="<?php bloginfo('template_directory') ?>/images/footer-side-img.png" /> </div>
      <div class="clear"></div>
      <div class="footer-bottom">
Beautiful World Canada Foundation. 620 Wilson Avenue, Suite 503 Toronto, Ontario M3K 1Z3. Phone: 647-799-2049<br/>
Charitable Number: #842133480RR0001
      </div>
      <div class="clear"></div>
    </div>
    <div class="clear"></div>
  </div>
		<div class="footer-copyright">
                <p>Copyright &copy; Beautiful World Canada 2013. All Rights Reserved. | <a href="http://www.divinedesigns.ca" target="_blank">Website Design: DivineDesigns.ca – Divinely Inspired Web Design</a></p>
        </div>
</div>
</body>
</html>