<?php

#[\JetBrains\PhpStorm\NoReturn] function load_more_driver_cars(): void
{
	$page_id = +$_POST['page_id'] ?? wp_die();
	$offset = +$_POST['offset'] ?? 0;
	$per_cnt = +$_POST['per_cnt'] ?? get_option('posts_per_rss');
	$limit = $offset + $per_cnt;

	ob_start();
	if( have_rows( 'cars_with_drivers', $page_id ) ):
		$i = 0;
		while( have_rows( 'cars_with_drivers', $page_id ) && $i < $limit ):
			the_row();
			if ($i >= $offset) get_template_part( 'templates/driver', 'car-card' );
			$i++;
		endwhile;
	endif;

	echo ob_get_clean();
	wp_die();
}

add_action('wp_ajax_load_more_driver_cars', 'load_more_driver_cars');
add_action('wp_ajax_nopriv_load_more_driver_cars', 'load_more_driver_cars');