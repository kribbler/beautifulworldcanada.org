<?php
error_reporting(0);
?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<meta name="google-site-verification" content="NuSdhZCYDiVaJzlrYPcCros_JS8T0N3FPnQfJs0jDXQ" />
<title><?php bloginfo('name') ?></title>
<link href="<?php bloginfo('stylesheet_url'); ?>" rel="stylesheet" type="text/css" /> 
<link href='http://fonts.googleapis.com/css?family=Dosis:200,400,600,800' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Open+Sans:300' rel='stylesheet' type='text/css'>
<link href='http://fonts.googleapis.com/css?family=Open+Sans+Condensed:700' rel='stylesheet' type='text/css'>
<link href="//cdn-images.mailchimp.com/embedcode/slim-081711.css" rel="stylesheet" type="text/css">

<style type="text/css">
	#mc_embed_signup{background: #fff;clear: left;font: 14px Helvetica,Arial,sans-serif;position: absolute;left: 50%;top: 50%;width: 250px;padding: 25px 15px 15px 15px;height: 130px;margin-top: -87px;margin-left: -142px;z-index: 10;border: 2px solid #00aeef;}
	#mc_embed_signup_parent{position:fixed;background:rgba(50,50,50,.7);width:100%;height:100%;display:none;top:0px;left:0px;z-index:1000}
	#mc_embed_signup_parent_hide{position:fixed;width:100%;height:100%;display:block;top:0px;left:0px;z-index:1}
	#mc_embed_signup input.email {width: 97%;}
	#mc_embed_signup input.button {margin: 0 10px 10px 0;float: right;background-color:#00aeef}
</style>

<!--<script src="http://code.jquery.com/jquery-latest.js" type="text/javascript"></script>-->
<script type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/1.7.2/jquery.min.js"></script>
<script type="text/javascript" src="<?php bloginfo('template_directory') ?>/js/ddaccordion.js"></script>
<script type="text/javascript">
ddaccordion.init({
	headerclass: "direxp", //Shared CSS class name of headers group that are expandable
	contentclass: "dircat", //Shared CSS class name of contents group               
	revealtype: "click", //Reveal content when user clicks or onmouseover the header? Valid value: "click" or "mouseover
	collapseprev: true, //Collapse previous content (so only one open at any time)? true/false                         
	defaultexpanded: [], //index of content(s) open by default [index1, index2, etc]. [] denotes no content            
	onemustopen: false, //Specify whether at least one header should be open always (so never all headers closed)       
	animatedefault: false, //Should contents open by default be animated into view?                                     
	persiststate: true, //persist state of opened contents within browser session?                                      
	toggleclass: ["", "openheader"], //Two CSS classes to be applied to the header when it's collapsed and expanded, respectively ["class1", "class2"]
	togglehtml: ["prefix", "", ""], //Additional HTML added to the header when it's collapsed and expanded, respectively  ["position", "html1", "html2"] (see docs)
	animatespeed: "normal", //speed of animation: "fast", "normal", or "slow"

	oninit:function(headers, expandedindices){ //custom code to run when headers have initalized
		//do nothing                                                                              
	},

	onopenclose:function(header, index, state, isuseractivated){ //custom code to run whenever a header is opened or closed
		//do nothing                                                                                                         
	}

})   
</script> 
</head>

<body>
<div id="wrapper">
  <div id="header">
    <div id="logo"> <a href="<?php bloginfo('url') ?>"><img src="<?php bloginfo('template_directory') ?>/images/logo.png" alt="logo" /></a> </div>
    <div class="top-navigation">
		<?php wp_nav_menu(array('theme_location'=>'primary','container_class' => 'menu1 ','menu_class'=>' ',)); ?>
    </div>
    <a href="https://interland3.donorperfect.net/weblink/weblink.aspx?name=E920209QE&id=1" id="donatebutton" target="_blank">Donate</a>
    <div class="clear"></div>
  </div>
     <?php wp_head(); 