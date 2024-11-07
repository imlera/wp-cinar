<?php

/**
 * Urls to the assets subfolders
 */

#[\JetBrains\PhpStorm\NoReturn] function roots_get_assets_uri( ?string $pathname = null ): string
{
	return get_template_directory_uri() . "/assets/$pathname";
}

#[\JetBrains\PhpStorm\NoReturn] function roots_get_script_uri( string $pathname ): string
{
	return roots_get_assets_uri( "scripts/$pathname" );
}

#[\JetBrains\PhpStorm\NoReturn] function roots_get_style_uri( string $pathname ): string
{
	return roots_get_assets_uri( "styles/$pathname" );
}

#[\JetBrains\PhpStorm\NoReturn] function roots_get_icon_uri( string $pathname ): string
{
	return roots_get_assets_uri( "icons/$pathname" );
}