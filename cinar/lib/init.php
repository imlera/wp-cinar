<?php
/**
 * Roots initial setup and constants
 */


#[\JetBrains\PhpStorm\NoReturn] function roots_setup(): void
{

}

add_action('after_setup_theme', 'roots_setup');
