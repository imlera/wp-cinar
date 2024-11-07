<?php

add_filter('wpcf7_form_elements', function($content) {
	$content = preg_replace('/<span class="wpcf7-form-control-wrap"[^>]*>/', '', $content);
	$content = str_replace('</span>', '', $content);
	return $content;
});