<?php
/**
 * Основной файл шаблона
 * Template name: Главная страница
 *
 * @package WordPress
 * @subpackage cinar
 * @since cinar 1.0
 */

get_header();
?>

    <?php get_template_part('templates/driver', 'car-repeater') ?>

<?php
get_footer();