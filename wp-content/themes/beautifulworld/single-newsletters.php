<?php
error_reporting(E_ALL);
?>
<?php $g_skip_social = FALSE; ?>
<?php get_header(); ?>

<div id="content-cont">
  <div id="banner"> <img src="<?php bloginfo('template_directory') ?>/images/banner-inner.jpg" alt="banner" /> </div>
  <div class="clear"></div>
  <div id="content">
    <h1>Newsletters</h1>
    <div style="padding-left: 42px;width: 600px;float:left">
      <?php
        if(have_posts ()): while (have_posts()): the_post();  ?>
      <h2><?php the_title(); ?></h2>
      <?php the_content(); ?>
      <?php

        endwhile;
    endif;
?>
<br/><br/><br/>
<a href="https://www.facebook.com/BeautifulWorldCanada/app_141428856257" target="_blank" style="font-size:20px">Click here to join our newsletter</a>
<br/><br/><br/>
    </div>
    <div style="width: 278px;margin: 0px;float: right;">
      <ul>
        <?php (function_exists('dynamic_sidebar') && dynamic_sidebar('Newsletters')) ?>
      </ul>
      <div class="clear"></div>
    </div>
  </div>
  <div class="clear"></div>
  
<?php
get_footer();
?>

</div>

