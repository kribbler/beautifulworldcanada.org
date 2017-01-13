<?php

	/*

	Template Name: Student Stories

	*/	

?>

<?php get_header(); ?>

<style> h5 {
	font-size:14pt;
}
	

</style>

  <div id="content-cont">

    <div id="banner"> <img src="<?php bloginfo('template_directory') ?>/images/banner-inner.jpg" alt="banner" /> </div>

    <div class="clear"></div>

    <div id="content">

    	<h1>Student Stories</h1>

        
		<div>   
			 <?php if (have_posts()) : while (have_posts()) : the_post();?>
			
			<?php the_content(); ?>
			
			<?php endwhile; endif; ?>            

	    			
        
        </div>
<style>
	
</style>
            <br style='clear: both;'>

        </div>        

      <div class="clear"></div>

    </div>
<script>
/*Reference 
 *http://css-tricks.com/snippets/jquery/simple-jquery-accordion/
 */

	jQuery(document).ready(function($) {
		
		var textToHide=$('.story p:nth-child(2)').hide();
		$('.story p:nth-child(3)').remove();
		
		$('.stories a').click(function(e){
		
			e.preventDefault();
			
			var story=$(this).parent('p').parent().find('.down');
			
			textToHide.not(story).slideUp();
			
			$('.stories a').not($(this)).text("…READ ON");
			
			 story.slideToggle();
				
			if ($(this).text() == '…READ ON'){
			$(this).text("READ LESS");
					}
			else{
					$(this).text("…READ ON");
						}	
		 });
});
	
</script>
    <?php get_footer(); ?>