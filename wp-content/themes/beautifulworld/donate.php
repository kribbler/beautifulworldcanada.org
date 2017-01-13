<?php
	/*
	Template Name: Donate Now
	*/	
?>
<?php get_header(); ?>
  <div id="content-cont">
    <div id="banner"> <img src="<?php bloginfo('template_directory') ?>/images/banner-inner.jpg" alt="banner" /> </div>
    <div class="clear"></div>
    <div id="content">
    	<h1>Donate Now</h1>
        <div style='width: 514px; float: left;'>
            <?php                  
            if(get_page_by_name("generous-donors")) 
            {
								$pages_id = get_page_by_name("generous-donors");
								$page_id = "page_id=" . $pages_id;
								$the_query = new WP_Query($page_id);
								if($the_query->have_posts()) {
									$the_query->the_post();									
									?>
									<div>
									<?php
									the_content();
									?>
									</div>
								<?php
								}
						}
            ?>
        </div>
        <div style='width: 430px; float: left;' class="waysdonate">
        	 <?php                            
          if(get_page_by_name("ways-to-make-a-donation")) 
          {
							$pages_id = get_page_by_name("ways-to-make-a-donation");
							$page_id = "page_id=" . $pages_id;
							$the_query = new WP_Query($page_id);
							if($the_query->have_posts()) {
								$the_query->the_post();									
								the_content();
							}
					} 						                 					
          ?>
      </div>        
      <br style='clear: both;'>
    </div>
    <?php get_footer(); ?>