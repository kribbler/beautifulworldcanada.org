<?php 
if (AJAX) {
	$ob=array();
	if (have_posts ()){
		while (have_posts()) {
			the_post();
			$o=array();
			$o['title']=get_the_title();
			$o['content']=get_the_content();
			$ob[]=$o;
		}
	}
	json($ob);	
}
$g_skip_social = FALSE;
?>
<?php get_header(); ?>
  <div id="content-cont">
    <div id="innerbanner"> <img src="<?php bloginfo('template_directory') ?>/images/sub-banner.jpg" width="990" height="156" /></div>
    <div class="clear"></div>
    <div id="innercontent">
      <div class="innerblock">


          <?php
        if(have_posts ()): while (have_posts()): the_post();  ?>
          <h5><?php
		    ob_start();
		  the_title();
		  $t=ob_get_contents();
		  ob_end_clean();
		  if ($a=strtotime($t))
		  	$t=date('F d, Y',$a);
		echo $t;
		?></h5>
          <?php the_content(); ?>
<?php

        endwhile;
    endif;
?>









     
      </div>

      <div class="shadowbox">
  <ul>                        <?php
 if (!function_exists('dynamic_sidebar') || !dynamic_sidebar('Bottom-widget')) :
 endif; ?>
  </ul>

        <div class="clear"></div>
      </div>
      <div class="clear"></div>
    </div>
    <?php get_footer(); ?>