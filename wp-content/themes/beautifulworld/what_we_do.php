<?php
	/*
	Template Name: What We Do
	*/	

$opts=qsql('SELECT option_value FROM wp_options WHERE option_name=\'first_section\'');
$opts=(isset($opts[0]['option_value'])) ? unserialize($opts[0]['option_value']) : array();
$terms = get_terms('location',array(
	'hide_empty'=>false
));
?>
<?php get_header(); ?>
  <div id="content-cont">
    <div id="banner"> <img src="<?php bloginfo('template_directory') ?>/images/banner-inner.jpg" alt="banner" /> </div>
    <div class="clear"></div>
    <div id="content">
    	<h1>What We Do</h1>
      <div style='width: 380px;margin-right:24px; float: left;'>
			      <?php      
				    // Our Purpose
						echo '<div id="maplinks">';
				    //echo '<img src="/wp-content/themes/beautifulworld/images/what_we_do_03.jpg" alt="What we do.">';
						echo '<div id="linkmap">';
						foreach ((array)$terms as $k=>$a) {
							echo '<a href="#',$a->slug,'" class="',$a->slug,'"><img src="';
							bloginfo('template_directory');
							echo '/images/mappulse-',$a->slug,'.png"/></a>';
						}
						echo '</div>';
						echo '<div id="popups">';
						foreach ((array)$terms as $k=>$a) {
							echo '<div id="',$a->slug,'">';
							echo '<div class="close">X</div>';
							echo '<div class="text">';
							echo nl2br(html($opts[$a->term_id]['popup']));
							echo '</div>';
							echo '<a href="/location/',$a->slug,'">View Our Projects in <b>',$a->name,'</b></a>';
							echo '</div>';
						}
						echo '</div>';
						echo '</div>'; 
						?>
            <br/>
            <?php add_new_widget_location("What We Do Map Caption"); ?>
            <!--<div style="text-align:center">
            <a href="/all-projects" id="allprojects"><img src="<?php bloginfo('template_directory') ?>/images/view-all-projects.jpg"/></a>
        	</div>-->
        </div>
        <div style='width: 540px; float: left;'>
        	 <?php                  
          if(get_page_by_name("beautiful-world-canada-provides")) 
          {
							$pages_id = get_page_by_name("beautiful-world-canada-provides");
							$page_id = "page_id=" . $pages_id;
							$the_query = new WP_Query($page_id);
							if($the_query->have_posts()) {
								$the_query->the_post();									
								the_content();
							}
					} 						                 					
          ?>
          <div style='width: 48%; padding: 1%; float: left;' class="wwd_wwf">
          	<h2>What We Fund</h2>
          	<?php                  
	          if(get_page_by_name("what-we-fund")) 
	          {
								$pages_id = get_page_by_name("what-we-fund");
								$page_id = "page_id=" . $pages_id;
								$the_query = new WP_Query($page_id);
								if($the_query->have_posts()) {
									$the_query->the_post();									
									the_content();
								}
						} 						                 					
	          ?>
          </div>
          <div style='width: 48%; padding: 1%; float: left;'>
          	<img src='<?php bloginfo('template_directory') ?>/images/what_we_do_12.jpg' alt='Photographs of children being educated in a formal classroom environment.'>
          </div>
          <br style='clear: both;'>
      </div>        
      <br style='clear: both;'>
    </div>
<script type="text/javascript">
function pulse() {
	jQuery('#linkmap > a:not(.hover) > img').fadeIn('slow','swing',function() {
		jQuery('#linkmap > a:not(.hover) > img').fadeOut('slow','swing',function() {

		});
	});
	setTimeout(function() {
		pulse();	
	},2000);
};
jQuery(document).ready(function($) {
	var IE=(function(){
		var undef,v = 3,div = document.createElement('div'),all = div.getElementsByTagName('i');
		while (
        	div.innerHTML = '<!--[if gt IE ' + (++v) + ']><i></i><![endif]-->',
        	all[0]
    	);
		return v > 4 ? v : undef;
	}());
	$('#maplinks').click(function() {
		$('#popups > div').fadeOut();
	});
	$('#linkmap > a').click(function() {
		//if (IE<=7) {
			window.location=$('#popups > '+$(this).attr('href')+' a').attr('href');
			return false;
		//}
		//$('#popups > div:visible').fadeOut();
		//$('#popups > '+$(this).attr('href')).fadeIn();
		//return false;
	});
	/*if (!IE || IE>=8) {
		$('#linkmap > a').hover(function() {
			$('#popups > div').hide();
			$('#popups > '+$(this).attr('href')).show();
		});
	}
	$('#linkmap > a').hover(function() {
		$(this).addClass('hover');
	},function() {
		$(this).removeClass('hover');
	});*/
	if (!IE || IE>=9)
		pulse();
});

</script>
    <?php get_footer(); ?>
	
