<?php
/**
 * @package     Joomla.Site
 * @subpackage  Templates.protostar
 *
 * @copyright   Copyright (C) 2005 - 2016 Open Source Matters, Inc. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;

?>

<!DOCTYPE html>
<html lang="<?php echo $this->language; ?>" dir="<?php echo $this->direction; ?>">
<meta http-equiv="Content-type" content="text/html;charset=UTF-8">
<head>
    <!-- предупреждение о том, что браузер устарел -->
    <!--[if lte IE 10]><script src="http://phpbbex.com/oldies/oldies.js" charset="utf-8"></script><![endif]-->

    <!-- Подключение jQuery (Google) -->
    <script src="//ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>    
    
    <!-- Подключение Bootstrap -->
    <link type="text/css" rel="stylesheet" href="<?php echo $this->baseurl; ?>/templates/<?php echo $this->template?>/css/bootstrap.min.css" />
    <script type="text/javascript" src="<?php echo $this->baseurl; ?>/templates/<?php echo $this->template?>/js/bootstrap.min.js"></script>
    
    <!-- заголовок -->
    <jdoc:include type="head" />

    <!-- подключение фавикона -->
    <link rel="icon" href="/templates/mozyrpromstroy/favicon.ico" type="image/x-icon">
    <link rel="shortcut icon" href="/templates/mozyrpromstroy/favicon.ico" type="image/x-icon">

    <!-- Подключение собственного CSS -->
    <link type="text/css" rel="stylesheet" href="/templates/mozyrpromstroy/custom.css" />
</head>
<?php $app = JFactory::getApplication();
$menu = $app->getMenu();
$activeMenu = $menu->getActive();
 ?>
<body class="<?php echo $activeMenu->params['pageclass_sfx']; ?>">
    <header>
        <div class="container">
            <div class="right-header">
                <a href="/">
                    <div class="logo">
                        <img src="/templates/mozyrpromstroy/images/logo.jpg" />
                    </div>
                    <div class="name">
                        <jdoc:include type="modules" name="name" style="xhml" />
                    </div>
                </a>
            </div>
            <div class="middle-header"></div>
            <div class="left-header">
                <div class="phone-header">
                    <jdoc:include type="modules" name="phone-header" style="xhtml" />
                </div>
                <div class="feedback-form">
                    <jdoc:include type="modules" name="feedback-form" style="xhtml" />
                </div>
            </div>
        </div>
    </header>
    <div class="main-menu">
        <div class="container">
            <jdoc:include type="modules" name="main-menu" style="xhtml" />
        </div>
    </div>
    <div class="slider">
        <jdoc:include type="modules" name="slider" style="xhtml" />
    </div>
    <main>
        <div class="main-wrapper">
            <div class="inner-wrapper">
                <?php
                $app = JFactory::getApplication();
                $menu = $app->getMenu();
                if ($menu->getActive() == $menu->getDefault()) { ?>
                <div class="main-page main-content">
                <?php } else { ?>
                <div class="main-content">
                <?php } ?>
                    <jdoc:include type="modules" name="crumbsbread" style="xhtml" />
                        
                    <?php if ($this->countModules('content-right-block')) { ?> 
                        <div class="clearfix">
                            <div class="content-left-block">
                                <jdoc:include type="component" />
                            </div>   
                            <div class="content-right-block">
                                <jdoc:include type="modules" name="content-right-block" style="xhtml" />
                            </div>
                        </div>
                    <?php } else { ?>
                        <jdoc:include type="component" />
                    <?php } ?>
                    
                </div>
                
                <?php if ($this->countModules('our-objects')) { ?>
                    <div class="our-objects">
                        <jdoc:include type="modules" name="our-objects" style="xhtml" />
                    </div>
                <?php } ?>
                
            </div>
        </div>
    </main>
    <footer>
        <div class="container">
            <div class="top-footer">
                <a href="/">
                    <div class="logo">
                        <img src="/templates/mozyrpromstroy/images/logo-foot.png" />
                    </div>
                    <div class="name">
                        <jdoc:include type="modules" name="name" style="xhml" />
                    </div>
                </a>
                <jdoc:include type="modules" name="main-menu" style="xhtml" />
            </div>
            <div class="bottom-footer">
                <jdoc:include type="modules" name="copyright" style="xhtml" />
                <div class="developer">Разработка сайта - <a target="_blank" href="http://www.medialine.by">Медиа Лайн</a> </div>
            </div>
        </div>
    </footer>
</body>
</html>