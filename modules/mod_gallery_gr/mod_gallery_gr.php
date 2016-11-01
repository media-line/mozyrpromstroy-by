<?php
/**
 * @package		Joomla.Site
 * @subpackage	mod_footer
 * @copyright	Copyright (C) 2005 - 2012 Open Source Matters, Inc. All rights reserved.
 * @license		GNU General Public License version 2 or later; see LICENSE.txt
 */

// no direct access
defined('_JEXEC') or die; 

require_once dirname(__FILE__).'/helper.php';

$document = JFactory::getDocument();
$document->addScript(JURI::base().'modules/'.$module->module.'/js/script.js');
$document->addScript(JURI::base().'modules/'.$module->module.'/js/slick.min.js');
$document->addScript(JURI::base().'modules/'.$module->module.'/js/jquery.fancybox.pack.js');

$document->addStyleSheet(JURI::base().'modules/'.$module->module.'/css/slick.css');
$document->addStyleSheet(JURI::base().'modules/'.$module->module.'/css/jquery.fancybox.css');

$photos = modGalleryGrHelper::getData($params, 'gallery');

require JModuleHelper::getLayoutPath('mod_gallery_gr', $params->get('layout', 'default'));

?>
