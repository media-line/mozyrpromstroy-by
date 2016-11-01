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

<div class="mod_form_gr">
	<?php if ($params->get('modal_on')) { ?>

		<div class="modal_form_btn<?php echo ' '.$params->get('modal_btn_class'); ?>" data-toggle="modal" data-target="#modal_form<?php echo $module->id; ?>">
			<span><?php echo $params->get('modal_btn_text'); ?></span>
		</div>

		<div class="modal fade" id="modal_form<?php echo $module->id; ?>" tabindex="-1" role="dialog" aria-hidden="true">
			<div class="modal-dialog">
				<div class="modal-content modal-content-form">
	<?php } ?>

	<form id="form_back_<?php echo $module->id; ?>" name="form" method="post" enctype="multipart/form-data" class="clearfix row">
		<div class="page-head">
			<span><?php echo $params->get('head'); ?></span>
            <div type="button" class="close" data-dismiss="modal" aria-hidden="true">&times;</div>
		</div>
				<?php for ($i=0; $i < count($fields); $i++) { ?>
					<?php if ($fields[$i]['type'] != 'separator') { ?>
							<?php if ($fields[$i]['title']) { ?>
								<div class="text text<?php echo $i?>">
									<?php echo $fields[$i]['title']; ?> <span><?php if ($fields[$i]['required']) { echo '*'; } ?></span>
								</div>							
							<?php } ?>
							<?php if ($i%2==0) {
							    echo '<div class="bigfield">';
                            }?>
                                <div class="field  field<?php echo $i?>">
                                    <?php switch ($fields[$i]['type']) {
                                        case 'text': ?>
                                            <input class="input" type="text" name="field<?php echo $i; ?>" placeholder="<?php echo $fields[$i]['placeholder']; ?><?php if ($fields[$i]['required']) { echo '*'; } ?>">
                                            <?php break;

                                        case 'textarea': ?>
                                            <textarea class="input textarea" name="field<?php echo $i; ?>" placeholder="<?php echo $fields[$i]['placeholder']; ?><?php if ($fields[$i]['required']) { echo '*'; } ?>"></textarea>
                                            <?php break;
                                    } ?>
                                </div>
                            <?php if ($i%2!=0) {
                                echo '</div>';
                            }?>
					<?php } else { ?>
						<div class="text-separator ">
							<?php echo $fields[$i]['title']; ?> <span><?php if ($fields[$i]['required']) { echo '*'; } ?></span><br/>
						</div>					
					<?php } ?>
				<?php } ?>
                </div>
				<div class="file">
					<?php if ($params->get('file_on')) { ?>
						<label><i class="icon-pdf-file-format-symbol"></i><input type="file" name="file"><span><?php echo $params->get('file_text'); ?></span></label>
					<?php } ?>	
					<div class="send">
						<button class="btn_form<?php echo $module->id; ?> js-form-send form-send" type="submit" name="submit"><i class="icon-paper-plane"></i><span><?php echo $params->get('button_text'); ?></span></button>
					</div>
				</div>	

			<?php if ($params->get('captcha_on')) { ?>
					<div class="captcha">
						<div class="g-recaptcha" data-sitekey="<?php echo $params->get('captcha_key'); ?>"></div>
					</div>	
			<?php } ?>					
		
		<input class="input capfield" type="text" name="capfield" style="height:1px; opacity:0; visibility: hidden;">
	</form>

	<?php if ($params->get('modal_on')) { ?>
		</div>
	  </div>
	</div>
	<?php } ?>	
	
	<!-- Modal -->
	<div class="modal fade answer" id="answer<?php echo $module->id; ?>" tabindex="-1" role="dialog">
		<div class="modal-dialog" role="document">
			<div class="modal-content">
				<div class="modal-body">
					<button type="button" class="close modal_close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
					<div><?php echo $params->get('thanks'); ?></div>
				</div>
			</div>
		</div>
	</div>
    
    <input type="hidden" class="js-form-gr-json" value='<?php echo $json; ?>'>
</div>