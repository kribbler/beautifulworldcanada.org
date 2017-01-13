<?php
/*
 * template name:News & Event
 */    
?>
<?php get_header(); ?>
  <div id="content-cont">
  	<h1>News and Events</h1>
    <div id="innerbanner"> <img src="<?php bloginfo('template_directory') ?>/images/sub-banner.jpg" width="990" height="156" /></div>
    <div class="clear"></div>
    <div id="innercontent">
      <div class="innerblock">
        <div class="contactleft">
          <h1>Latest News</h1>
          <div class="arrowlistmenu">
              <?php
        global $post;
        $args = array('post_type' => 'news','numberposts'     => 7,'orderby'=>'title DESC');
        $myposts = get_posts( $args );
        $i=0;
        foreach( $myposts as $post ) :	setup_postdata($post);
		$t=$post->post_title;
		if (!($t=strtotime($t)))
			continue;
		
		?>
              <h3 headerindex="0h" class="menuheader expandable"><span class="accordprefix"></span><?php echo date('F d, Y',$t); ?>
              <ul style="display: none;" contentindex="0c" class="categoryitems">
                <li>
                    <span class="blutext"></span>
                  <?php the_content(); ?>
                </li>
              </ul>
            </h3>
              <?php endforeach; ?>
            
          </div>
        </div>
        <div class="contactright">
          <h1>Upcoming Events</h1>
          <div class="eventblock">
            <h4>All Upcoming Events</h4>
            <?php
global $post;
$args = array('post_type' => 'events_listing','numberposts'     => 2);
$myposts = get_posts( $args );
foreach( $myposts as $post ) :	setup_postdata($post); ?>
            <div class="upcom">
              <div class="upgrey">
                <div class="datebox">
                  <h1><?php echo date("d",strtotime(get_post_meta($post->ID,"events_listing_date", true))); ?></h1>
                  <h2><?php echo date("M",strtotime(get_post_meta($post->ID,"events_listing_date", true))); ?></h2>
                </div>
                <div class="datedetail" style="width:320px;position:relative">
                  <p style="float:left;width:100%"><span class="datedetailbold">Date      :</span> <?php echo date("d-M-Y",strtotime(get_post_meta($post->ID,"events_listing_date", true))); ?>
<?php
$link=get_post_meta($post->ID,"events_listing_link", true);
if (!empty($link)) {
	echo ' <a href="',$link,'" target="_blank" style="position:absolute;right:0px;top:2px">Download Event Package</a>';
}
?>                  
                  </p>
                  <p><span class="datedetailbold">Time      :</span> <?php echo get_post_meta($post->ID,"events_listing_time", true); ?> </p>
                  <p><span class="datedetailbold">Event     :</span> <?php the_title(); ?> </p>
                  <p><span class="datedetailbold">Location :</span><?php echo get_post_meta($post->ID,"events_listing_location", true); ?> </p>
                </div>
              </div>
              <div class="clear"></div>
            </div>
   <?php endforeach; ?>
          </div>
<!--
          <div class="eventblock">
           <?php
            if (get_page_by_name("download-all-our-latest-news-here")) {
                $pages_id = get_page_by_name("download-all-our-latest-news-here");
                $page_id = "page_id=" . $pages_id;
                $the_query = new WP_Query($page_id);
                if ($the_query->have_posts()) : $the_query->the_post(); ?>
            <h4><?php the_title(); ?></h4>
 <div class="newstitle">
            <?php the_content(); ?>
 </div>
        <?php endif; ?>
            <?php }
            else{
            ?>
            <h4>Download All Our Latest News Here!</h4>
            <div class="newstitle">
              <ul>
                <li>
                  <div class="pdf"><a href="#">Newsletter vv Here with Date</a> </div>
                </li>
                <li>
                  <div class="pdf"><a href="#">Newsletter Title Here with Date</a> </div>
                </li>
              </ul>
         
            </div>
            <?php } ?>
            <div class="clear"></div>
          </div>
        </div>
-->
        <div class="clear"></div>
      </div>
      <div class="clear"></div>
    </div>
    <div class="shadowbox">
       <ul>
            <?php
 if (!function_exists('dynamic_sidebar') || !dynamic_sidebar('Bottom-widget')) :
echo "Bottom-widget";
 endif; ?>
  </ul>
      <div class="clear"></div>

    <?php get_footer(); ?>