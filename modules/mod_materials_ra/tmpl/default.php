<?php
/**
 * @package		Joomla.Site
 * @subpackage	mod_footer
 * @copyright	Copyright (C) 2005 - 2012 Open Source Matters, Inc. All rights reserved.
 * @license		GNU General Public License version 2 or later; see LICENSE.txt
 */

// no direct access
defined('_JEXEC') or die;

$qtu = 2;

//Подключаемся к БД
/*$link = mysqli_connect('localhost', 'mozirprom_user', 'tKA21$w6', 'mozirprom_db');*/
$link = mysqli_connect('localhost', 'root', '', 'mozyrpromstroy_db');

//Проверка подключения к БД, c выводом ошибки в случае невозможности подключения
if (!$link) {
    die('Ошибка подключения (' . mysqli_connect_errno() . ') <br/> В модуле вывода Проектов необходимо сменить подключение к БД с локального на серверное');
}

//Создаем запрос к БД на выборку названий материалов
$q = "SELECT title, alias, introtext, catid, images FROM qh7rt_content";

//исправляем проблему некорректного вывода кодировки
if (!mysqli_set_charset($link, "utf8")) {
    printf("Ошибка при загрузке набора символов utf8: %s\n", mysqli_error($link));
} else {
    /*тут ничего не должно быть*/
}

//Выполняем запрос к БД на выборку названий материалов
$query = mysqli_query($link, $q);
$myrow=mysqli_fetch_row($query);

//Создаем массивы для каждого таба (Create an array for each the tab)
$prom = array (); //массив для первой вкладки
$social = array (); //массив для второй вкладки

//Перебираем запрос из БД и разносим данные по нужным массивам
while ($myrow=mysqli_fetch_row($query)) {
    if ($myrow['3'] == 9) {
        array_push($prom, $myrow);
    } elseif ($myrow['3'] == 10) {
        array_push($social, $myrow);
    }
}

?>


<!-- подключаем css-файл модуля -->
<link type="text/css" rel="stylesheet" href="/modules/mod_materials_ra/custom.css" />

<!-- Табы (Tabs) -->
<ul class="nav  nav-tabs  our-objects" id="myTab">
    <?php
    for ($i=0; $i < $qtu; $i++) { ?>
        <li <? if ($i==0) { echo 'class="active"'; } ?>><a href="#cat<?php echo $i ?>" data-toggle="tab"><?php
                if(!class_exists('JCategories')) require_once JPATH_ROOT.'/libraries/joomla/application/categories.php';
                $idcat = $params->get('cat'.$i);
                $youCategory = JCategories::getInstance('Content', array())->get($idcat);

                echo $youCategory->title;
                ?></a></li>
    <?php } ?>
    <li><a href="/nashi-raboty">Все</a></li> <!-- тут будет ссылка на страницу Наши работы -->
</ul>

<!-- Панели под табами (Tab panes) -->
<div id="myTabContent" class="tab-content">
    <div class="tab-pane active" id="cat0">
        <?php
        $i=0;
        foreach ($prom as $object) {
            if ($i<4) {
            $imges = json_decode($object[4]);
            ?>
                <a class="oo-item" href="/index.php/promyshlennye-i-zhilye-zdaniya/<?php echo $object[1]; ?>">
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
            $i++;
        } ?>
    </div>
    <div class="tab-pane" id="cat1">
        <?php
        $i=0;
        foreach ($social as $object) {
            if ($i<4) {
            $imges = json_decode($object[4]); ?>
                <a class="oo-item" href="/index.php/ob-ekty-sotskultbyta/<?php echo $object[1]; ?>">
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
            $i++;
        }?>
    </div>
</div>