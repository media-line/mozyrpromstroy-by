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
<div class="mod-gallery-gr social-template">
    <div class="imgs clearfix">
	<?php foreach ($photos as $photo) { ?>
        <div class="img-wrapper">
            <img src="<?php echo $photo['img-prev']; ?>" alt="">
        </div>
	<? } ?>
    </div>
</div>