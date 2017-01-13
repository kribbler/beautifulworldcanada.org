<?php

	/*

	Template Name: About Us

	*/	

?>

<?php get_header(); ?>

<style>

h5 {

	font-size:14pt;

}

</style>

  <div id="content-cont">

    <div id="banner"> <img src="<?php bloginfo('template_directory') ?>/images/banner-inner.jpg" alt="banner" /> </div>

    <div class="clear"></div>

    <div id="content">

    	<h1>About Us</h1>

        <div style='float: left; width: 48%; padding: 1%;'>

            <?php if (have_posts()) : while (have_posts()) : the_post();?>

 				 		<?php the_content(); ?>

 						<?php endwhile; endif; ?>            

	    			<?php add_new_widget_location("About Left 2"); ?>
					<div class="button">
						<a href="/wp-content/uploads/2015/09/Beautiful-World-Canada-2014-Annual-Report.pdf" target="_blank">2014 Annual Report</a>
					</div>

                    <div class="button">
                        <a href="/wp-content/uploads/2014/12/2013-Combined-Annual-report-with-Finance.pdf" target="_blank">2013 Annual Report</a>
                    </div>
        </div>

        <div style='float: right; width: 48%; padding: 1%;'>

        <?php add_new_widget_location("About Right 1"); ?>

            <div id='countries_we_support' style='float: left; width: 50%;'>

            	<?php add_new_widget_location("About Right 2"); ?> 

            </div>                       

            <div id='what_we_fund'>

            	<img style='display: block;' src='../wp-content/themes/beautifulworld/images/about_us_04.jpg' alt='What We Fund'>

            	<?php add_new_widget_location("About Right 3"); ?>            

            </div>

            <br style='clear: both;'>

        </div>        

      <div class="clear"></div>

    </div>

    <?php get_footer(); ?>