<?php 
/**
 * The template for displaying all pages.
 *
 *
 Template Name: Thanks
 */

get_header(); 
?>
  <div id="content-cont">
    <div id="banner"> <img src="<?php bloginfo('template_directory') ?>/images/banner-inner.jpg" alt="banner" /> </div>
	  <div class="clear"></div>		
	  <div style='width: 298px; float: left; padding: 25px'>
			<div style="padding-left:20px">
            <dl>
							<dt>
							<h4>By Mail</h4>
							</dt>
							<dd>
							Beautiful World Canada<br/>
                            620 Wilson Avenue. Suite 503<br>
							Toronto, Ontario<br>
							M3K 1Z3<br>
							</dd>
							</dl>
							<br><br/>
							<dl>
							<dt>
							<h4>By Phone or Fax</h4>
							</dt>
							<dd>
                            Office Hours: 8:30am to 4:30pm<br/>
                            Monday - Friday, excluding holidays,<br/><br/>
							<span class="phone"><i>phone</i> 647.799.2090</span>
                            <span class="phone"><i>fax</i> 647.799.3001</span>
							</dd>
						</dl>
        	</div>
    </div>
<?php
$p=allpost();
$replyto='';
if (strpos($p['email'],'@')!==false)
	$replyto='Reply-To: '.$p['email'];
mail('info@beautifulworldcanada.org','Message from Beautiful World Website',htmlarray($p),"Content-Type: text/html\r\nFrom: info@beautifulworldcanada.org\r\n".$replyto);
?>
    <div style='width: 446px; float: left; position: relative; padding: 0; margin: 0;display: block; padding: 25px;'>
			<?php while ( have_posts() ) : the_post(); ?>
			<h2><?php the_title(); ?></h2>
			<?php the_content(); ?>
			<?php get_template_part( 'content', 'page' ); ?>					
			<?php endwhile; // end of the loop. ?>
		</div>				
		<br style='clear: both;'>
</div>
<?php get_footer(); ?>