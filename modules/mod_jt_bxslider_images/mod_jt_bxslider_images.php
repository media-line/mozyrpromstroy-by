<!-- подключение библиотек слайдера -->
<script src="/modules/mod_jt_bxslider_images/js/jquery.bxslider.min.js"></script>
<link href="/modules/mod_jt_bxslider_images/css/jquery.bxslider.css" rel="stylesheet" />

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
$document 					=& JFactory::getDocument();
$document->addStyleSheet(JURI::base() . 'modules/mod_jt_bxslider_images/css/jquery.bxslider.css');
$jt_jquery_ver				= $params->get('jt_jquery_ver', '1.8.3');
$jt_load_jquery				= (int)$params->get('jt_load_jquery', 1);
$jt_load_easing				= (int)$params->get('jt_load_easing', 1);
$jt_load_bxslider			= (int)$params->get('jt_load_bxslider', 1);
$jt_load_scripts			= (int)$params->get('jt_load_scripts', 1);
if ($jt_load_scripts == 0) {
	if ($jt_load_jquery  > 0) {
		$document->addScript('http://ajax.googleapis.com/ajax/libs/jquery/'.$jt_jquery_ver.'/jquery.min.js');
		}
	if ($jt_load_easing  > 0) {
		$document->addScript(JURI::base() . 'modules/mod_jt_bxslider_images/js/jquery.easing.1.3.js');
		}
	if ($jt_load_bxslider > 0) {
		$document->addScript(JURI::base() . 'modules/mod_jt_bxslider_images/js/jquery.bxslider.min.js'); 
		}
	$document->addCustomTag('<script type = "text/javascript">if (jQuery) jQuery.noConflict();</script>');
	}
if ($jt_load_scripts == 1) {
	if ($jt_load_jquery  > 0) {
		$document->addCustomTag('<script type = "text/javascript" src = "http://ajax.googleapis.com/ajax/libs/jquery/'.$jt_jquery_ver.'/jquery.min.js"></script>');		
		}
	if ($jt_load_easing  > 0) { 
		$document->addCustomTag('<script type = "text/javascript" src = "'.JURI::root().'modules/mod_jt_bxslider_images/js/jquery.easing.1.3.js"></script>'); 
		}
	if ($jt_load_bxslider > 0) {	
		$document->addCustomTag('<script type = "text/javascript" src = "'.JURI::root().'modules/mod_jt_bxslider_images/js/jquery.bxslider.min.js"></script>');
		}
	$document->addCustomTag('<script type = "text/javascript">if (jQuery) jQuery.noConflict();</script>');	
	}
$moduleclass_sfx			= $params->get('moduleclass_sfx');
$jt_id						= $params->get('jt_id');
// width-height all img !!!
//$jt_width					= (int)$params->get('jt_width' , 300);
//$jt_height				= (int)$params->get('jt_height', 200);

// bxSlider options - http://bxslider.com/options
$jt_mode					= $params->get('jt_mode', 'horizontal');
$jt_speed					= (int)$params->get('jt_speed', 500);
$jt_controls				= $params->get('jt_controls', 'true');
$jt_auto					= $params->get('jt_auto', 'false');
$jt_autohover				= $params->get('jt_autohover', 'false');
$jt_pause					= (int)$params->get('jt_pause', 3000);
$jt_auto_controls			= $params->get('jt_auto_controls', 'true');
$jt_auto_delay				= (int)$params->get('jt_auto_delay', 0);
$jt_pager					= $params->get('jt_pager', 'true');
$jt_pager_type 				= $params->get('jt_pager_type', 'full');
$jt_pager_saparator			= $params->get('jt_pager_saparator', '/');
$jt_min_slides				= (int)$params->get('jt_min_slides', 1);
$jt_max_slides				= (int)$params->get('jt_max_slides', 1);
$jt_slide_width				= (int)$params->get('jt_slide_width', 0);
$jt_slide_margin			= (int)$params->get('jt_slide_margin', 0);
$jt_adaptive_height			= $params->get('jt_adaptive_height', 'false');
$jt_adaptive_height_speed	= (int)$params->get('jt_adaptive_height_speed', 500);
//$jt_ticker 					= $params->get('jt_ticker', 'false');
//$jt_ticker_hover			= $params->get('jt_ticker_hover', 'false');
$jt_random_start			= $params->get('jt_random_start', 'false');


$names = array('img', 'alt', 'url', 'target');
$max = 10;
foreach($names as $name) {
    ${$name} = array();
    for($i = 1; $i <= $max; ++$i)
        ${$name}[] = $params->get($name . $i);
}	
require JModuleHelper::getLayoutPath('mod_jt_bxslider_images', $params->get('layout', 'default'));
echo JText::_(MOD_JT);	
?>