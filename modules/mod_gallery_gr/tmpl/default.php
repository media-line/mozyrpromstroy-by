<?php
/**
 * @package		Joomla.Site
 * @subpackage	mod_articles_popular
 * @copyright	Copyright (C) 2005 - 2014 Open Source Matters, Inc. All rights reserved.
 * @license		GNU General Public License version 2 or later; see LICENSE.txt
 */

// no direct access
defined('_JEXEC') or die;
?>
<div class="mod-gallery-gr">
    <div class="imgs clearfix gallery-slick">
	<?php foreach ($photos as $photo) { ?>
        <div class="img-wrapper">
            <a rel="group-gallery" style="background-image: url(<?php echo $photo['img-prev']; ?>)" class="img fancybox-gallery" href="<?php echo $photo['img-full']; ?>"></a>
        </div>
	<? } ?>
    </div>
</div>