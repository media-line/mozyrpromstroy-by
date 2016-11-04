<?php
/**
 * @package		Joomla.Site
 * @subpackage	mod_footer
 * @copyright	Copyright (C) 2005 - 2012 Open Source Matters, Inc. All rights reserved.
 * @license		GNU General Public License version 2 or later; see LICENSE.txt
 */

// no direct access
defined('_JEXEC') or die;
if(!class_exists('JCategories')) require_once JPATH_ROOT.'/libraries/joomla/application/categories.php';
$qtu = 5;

//Подключаемся к БД
/*$link = mysqli_connect('localhost', 'mozirprom_user', 'tKA21$w6', 'mozirprom_db');*/
$link = mysqli_connect('localhost', 'root', '', 'mozyrpromstroy_db');

//Проверка подключения к БД, c выводом ошибки в случае невозможности подключения
if (!$link) {
    die('Ошибка подключения (' . mysqli_connect_errno() . ') '
        . mysqli_connect_error());
}

//Создаем запрос к БД на выборку названий материалов
$q = "SELECT title, alias, introtext, catid, images FROM qh7rt_content";

//Выполняем запрос к БД на выборку названий материалов
if (!mysqli_set_charset($link, "utf8")) {
    printf("Ошибка при загрузке набора символов utf8: %s\n", mysqli_error($link));
} else {
    /*тут ничего не должно быть*/
}
$query = mysqli_query($link, $q);
$myrow=mysqli_fetch_row($query);

//Создаем массивы для каждого таба (Create an array for each the tab)
$first = array (); //массив для первой вкладки
$second = array (); //массив для второй вкладки
$third = array (); //массив для третьей вкладки
$fourth = array (); //массив для четвертой вкладки
$fifth = array (); //массив для пятой вкладки

//Перебираем запрос из БД и разносим данные по нужным массивам в зависимости от ID категории
while ($myrow=mysqli_fetch_row($query)) {
    if ($myrow['3'] == 9) {
        array_push($first, $myrow);
    } elseif ($myrow['3'] == 10) {
        array_push($second, $myrow);
    } elseif ($myrow['3'] == 13) {
        array_push($third, $myrow);
    } elseif ($myrow['3'] == 14) {
        array_push($fourth, $myrow);
    } elseif ($myrow['3'] == 15) {
        array_push($fifth, $myrow);
    }
}
?>


<!-- подключаем css-файл модуля -->
<link type="text/css" rel="stylesheet" href="/modules/mod_materials_ra/page.css" />

<!-- Табы (Tabs) -->
<ul class="nav  nav-tabs  our-objects" id="myTab">
    <?php

    for ($i=0; $i < $qtu; $i++) { ?>
        <li>
            <a href="#cat<?php echo $i ?>" data-toggle="tab">
                <?php

                $idcat = $params->get('cat'.$i);

                $youCategory = JCategories::getInstance('Content', array())->get($idcat);

                echo $youCategory->title;
                ?>
            </a>
        </li>
    <?php } ?>
    <li class="active"><a href="#all" data-toggle="tab">Все <br/> объекты</a></li>
</ul>

<!-- Панели под табами (Tab panes) -->
<div id="myTabContent" class="tab-content">
    <div class="tab-pane" id="cat0">
        <?php
        foreach ($first as $object) {
            $imges = json_decode($object[4]);
            ?>

            <a class="oo-item" href="/index.php/blagoustrojstvo/<?php echo $object[1]; ?>">
                <div class="oo-images">
                    <img src="<?php echo $imges->image_intro; ?>" />
                </div>
                <div class="oo-title">
                    <?php echo mb_substr($object[0], 0, 50, 'UTF-8')?>
                </div>
                <div class="oo-intro">
                    <?php echo $object[2]; ?>
                </div>
            </a>
        <?php } ?>
    </div>
    <div class="tab-pane" id="cat1">
        <?php
        foreach ($second as $object) {
            $imges = json_decode($object[4]);
            ?>

            <a class="oo-item" href="/index.php/zhilishchnoe-stroitelstvo/<?php echo $object[1]; ?>">
                <div class="oo-images">
                    <img src="<?php echo $imges->image_intro; ?>" />
                </div>
                <div class="oo-title">
                    <?php echo mb_substr($object[0], 0, 50, 'UTF-8')?>
                </div>
                <div class="oo-intro">
                    <?php echo $object[2]; ?>
                </div>
            </a>

        <?php } ?>
    </div>
    <div class="tab-pane" id="cat2">
        <?php
        foreach ($third as $object) {
            $imges = json_decode($object[4]);
            ?>

            <a class="oo-item" href="/index.php/promyshlennoe-stroitelstvo/<?php echo $object[1]; ?>">
                <div class="oo-images">
                    <img src="<?php echo $imges->image_intro; ?>" />
                </div>
                <div class="oo-title">
                    <?php echo mb_substr($object[0], 0, 50, 'UTF-8')?>
                </div>
                <div class="oo-intro">
                    <?php echo $object[2]; ?>
                </div>
            </a>

        <?php } ?>
    </div>
    <div class="tab-pane" id="cat3">
        <?php
        foreach ($fourth as $object) {
            $imges = json_decode($object[4]);
            ?>

            <a class="oo-item" href="/index.php/selskokhozyajstvennoe-stroitelstvo/<?php echo $object[1]; ?>">
                <div class="oo-images">
                    <img src="<?php echo $imges->image_intro; ?>" />
                </div>
                <div class="oo-title">
                    <?php echo mb_substr($object[0], 0, 50, 'UTF-8')?>
                </div>
                <div class="oo-intro">
                    <?php echo $object[2]; ?>
                </div>
            </a>

        <?php } ?>
    </div>
    <div class="tab-pane" id="cat4">
        <?php
        foreach ($fifth as $object) {
            $imges = json_decode($object[4]);
            ?>

            <a class="oo-item" href="/index.php/ob-ekty-sotsialnogo-kulturnogo-i-sportivnogo-naznacheniya/<?php echo $object[1]; ?>">
                <div class="oo-images">
                    <img src="<?php echo $imges->image_intro; ?>" />
                </div>
                <div class="oo-title">
                    <?php echo mb_substr($object[0], 0, 50, 'UTF-8')?>
                </div>
                <div class="oo-intro">
                    <?php echo $object[2]; ?>
                </div>
            </a>

        <?php } ?>
    </div>
    <div class="tab-pane active" id="all">
        <?php
        foreach ($first as $object) {
            $imges = json_decode($object[4]);
            ?>
            <a class="oo-item" href="/index.php/blagoustrojstvo/<?php echo $object[1]; ?>">
                <div class="oo-images">
                    <img src="<?php echo $imges->image_intro; ?>" />
                </div>
                <div class="oo-title">
                    <?php echo mb_substr($object[0], 0, 50, 'UTF-8')?>
                </div>
                <div class="oo-intro">
                    <?php echo $object[2]; ?>
                </div>
            </a>
        <?php }
        foreach ($second as $object) {
        $imges = json_decode($object[4]);
        ?>
        <a class="oo-item" href="/index.php/zhilishchnoe-stroitelstvo/<?php echo $object[1]; ?>">
            <div class="oo-images">
                <img src="<?php echo $imges->image_intro; ?>" />
            </div>
            <div class="oo-title">
                <?php echo mb_substr($object[0], 0, 50, 'UTF-8')?>
            </div>
            <div class="oo-intro">
                <?php echo $object[2]; ?>
            </div>
        </a>
        <?php }
        foreach ($third as $object) {
            $imges = json_decode($object[4]);
            ?>
            <a class="oo-item" href="/index.php/promyshlennoe-stroitelstvo/<?php echo $object[1]; ?>">
                <div class="oo-images">
                    <img src="<?php echo $imges->image_intro; ?>" />
                </div>
                <div class="oo-title">
                    <?php echo mb_substr($object[0], 0, 50, 'UTF-8')?>
                </div>
                <div class="oo-intro">
                    <?php echo $object[2]; ?>
                </div>
            </a>
        <?php }
        foreach ($fourth as $object) {
            $imges = json_decode($object[4]);
            ?>
            <a class="oo-item" href="/index.php/selskokhozyajstvennoe-stroitelstvo/<?php echo $object[1]; ?>">
                <div class="oo-images">
                    <img src="<?php echo $imges->image_intro; ?>" />
                </div>
                <div class="oo-title">
                    <?php echo mb_substr($object[0], 0, 50, 'UTF-8')?>
                </div>
                <div class="oo-intro">
                    <?php echo $object[2]; ?>
                </div>
            </a>
        <?php }
        foreach ($fifth as $object) {
            $imges = json_decode($object[4]);
            ?>
            <a class="oo-item" href="/index.php/ob-ekty-sotsialnogo-kulturnogo-i-sportivnogo-naznacheniya/<?php echo $object[1]; ?>">
                <div class="oo-images">
                    <img src="<?php echo $imges->image_intro; ?>" />
                </div>
                <div class="oo-title">
                    <?php echo mb_substr($object[0], 0, 50, 'UTF-8')?>
                </div>
                <div class="oo-intro">
                    <?php echo $object[2]; ?>
                </div>
            </a>
        <?php } ?>
    </div>
</div>