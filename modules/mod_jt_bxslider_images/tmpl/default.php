<?php
/*
# ------------------------------------------------------------------------
# Templates for Joomla 2.5 - Joomla 3.5
# ------------------------------------------------------------------------
# Copyright (C) 2011-2013 Jtemplate.ru. All Rights Reserved.
# @license - PHP files are GNU/GPL V2.
# Author: Makeev Vladimir
# Websites:  http://www.jtemplate.ru 
# ---------  http://code.google.com/p/jtemplate/   
# ------------------------------------------------------------------------
*/
// no direct access
defined('_JEXEC') or die;
if ($jt_load_scripts == 2) { 
	if ($jt_load_jquery > 0) { 
		echo '<script src="http://ajax.googleapis.com/ajax/libs/jquery/'.$jt_jquery_ver.'/jquery.min.js" type="text/javascript"></script>';
		} 
	if ($jt_load_easing > 0) {
		echo '<script type = "text/javascript" src = "'.JURI::root().'/modules/mod_jt_bxslider_images/js/jquery.easing.1.3.js"></script>';
		}
	if ($jt_load_bxslider > 0) {
		echo '<script type = "text/javascript" src = "'.JURI::root().'/modules/mod_jt_bxslider_images/js/jquery.bxslider.min.js"></script>';
		}
	echo '<script type = "text/javascript">if (jQuery) jQuery.noConflict();</script>';
} 
?>


<script type="text/javascript">
jQuery(document).ready(function(){
	jQuery('#bxslider<?php echo $jt_id; ?>').bxSlider({
		mode: '<?php echo $jt_mode;?>',
		randomStart: <?php echo $jt_random_start;?>,
		minSlides: <?php echo $jt_min_slides;?>,
		maxSlides: <?php echo $jt_max_slides;?>,
		slideWidth: <?php echo $jt_slide_width;?>,
		slideMargin: <?php echo $jt_slide_margin;?>,
		adaptiveHeight: <?php echo $jt_adaptive_height;?>,
		adaptiveHeightSpeed: <?php echo $jt_adaptive_height_speed;?>,
		//ticker: <?php echo $jt_ticker;?>,
		//tickerHover: <?php echo $jt_ticker_hover;?>,
		speed: <?php echo $jt_speed;?>,
		controls: <?php echo $jt_controls; ?>,
		auto: <?php echo $jt_auto;?>,
		autoControls: <?php echo $jt_auto_controls;?>,
		pause: <?php echo $jt_pause?>,
		autoDelay: <?php echo $jt_auto_delay; ?>,
		autoHover: <?php echo $jt_autohover; ?>,
		pager: <?php echo $jt_pager;?>,
		pagerType: '<?php echo $jt_pager_type;?>',
		pagerShortSeparator: '<?php echo $jt_pager_saparator;?>'
	});
});
</script>

<div class="mod_jt_bxslider_img <?php echo $moduleclass_sfx ?>">	
	<ul id="bxslider<?php echo $jt_id; ?>">	
		<?php	
		for($n=0;$n < count($img);$n++) {			
			 if( $img[$n] != '') {
		        echo '<li>
					<img src="'.$img[$n].'" alt="'.$alt[$n].'" />
					<div class="container">
			        <div class="bx-slider-text">'.$alt[$n].'</div>						        
			        <a href="'.$url[$n].'" target="'.$target[$n].'">Читать подробнее</a>
			        </div>       						        
				</li>';
			}
		}	
		?>
	</ul>	
<div style="clear:both;"></div>
</div>

