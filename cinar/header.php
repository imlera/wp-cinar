<?php
/**
 * Шаблон шапки темы
 *
 * @package WordPress
 * @subpackage cinar
 * @since cinar 1.0
 */
?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>
    <meta charset="<?php bloginfo( 'charset' ); ?>"/>
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">

    <title><?php wp_title('|', true, 'right'); bloginfo('name'); ?></title>

	<?php wp_head(); ?>
</head>
<body <?php body_class(); ?>>
<?php wp_body_open(); ?>

    <div class="wrapper padding-top-72 padding-bottom-72">
