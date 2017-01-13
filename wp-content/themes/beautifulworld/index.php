<?php get_header(); ?>

<?php

$_SESSION['skip_socialfooter'] = TRUE;

?>

  <div id="content-cont">

    <div id="banner"> <img src="<?php bloginfo('template_directory') ?>/images/banner.png" alt="banner" /> </div>

    <div class="clear"></div>

    <div id="content">

        <div id="home_page_left" style="margin-bottom:100px">

            <h1>Let's make this a beautiful world, Canada!</h1>                          

						<?php add_new_widget_location("Home Left 1"); ?>         

            <br style=""/><br/><br/>

            <?php add_new_widget_location("Home Quote 1"); ?>            

        </div>

        <div id="home_page_right">

        	 <?php add_new_widget_location("Home Right 1"); ?> 

						

						<?php //add_new_widget_location("Home Right 2"); ?>

            <img src='/wp-content/uploads/home_03a.jpg' alt='Visual whitewash for sidebar footer.'>

						<br>

						

<div id='home_sidebar_social' style="text-align:right;margin-right:20px;">

							<a href='http://www.facebook.com/beautifulworldcanada' target="_blank"><img src='/wp-content/uploads/home_06a.jpg' alt='Like us on Facebook!' style='margin-left: 12px;'></a>
                            <!--<a href='http://twitter.com/BeautifulWorld' target="_blank"><img src='/wp-content/uploads/home_08a.jpg' alt='Like us on Facebook!' style='float: left; margin-left: 12px;'></a>-->
                            <!--<a href='http://www.linkedin.com/company/beautiful-world-canada' target="_blank"><img src='/wp-content/uploads/home_10a.jpg' alt='Like us on Facebook!' style='float: left; margin-left: 12px;'></a>-->
                            <a href='http://www.youtube.com/channel/UCf5MZ4DeIVRNRlBt-TuVwBw' target="_blank"><img src='/wp-content/uploads/home_12a.jpg' alt='Like us on Facebook!' style='margin-left: 12px;'></a>
                            <!--<a href='http://www.beautifulworldcanada.tumblr.com' target="_blank"><img src='/wp-content/uploads/home_14a.jpg' alt='Like us on Facebook!' style='float: left; margin-left: 12px;'></a>-->

						</div>



        </div>				

       

      <div class="clear"></div>

    </div>

    <?php get_footer(); ?>

