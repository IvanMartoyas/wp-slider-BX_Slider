<?
/*
 * Plugin Name: SLider Mart
 * Description: Кастомный слайдер
 * Author: IOAN MARTOYAS
 * 
 * License:     GPL2
 * License URI: https://www.gnu.org/licenses/gpl-2.0.html
 * Version:     2
 * Network:     false
 */

require_once('include__assets.php'); // подключаю js  и css
require_once('admin_side_slider.php'); // подключаю добавление слайдов в админке
require_once('admin_side_slider_metabox.php'); // добавлят метабокс в админку

require_once('create_shortcode.php'); // подключаю создание шорткода

require_once('admin_slider_update_metabox.php');// сохранение данные слайдера