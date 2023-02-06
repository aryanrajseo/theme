<?php

declare( strict_types=1 );

namespace Blockify\Theme;

use const DIRECTORY_SEPARATOR;
use function add_action;
use function glob;
use function is_readable;

const SLUG = 'blockify';
const NAME = 'Blockify';
const NS   = __NAMESPACE__ . '\\';
const DS   = DIRECTORY_SEPARATOR;
const DIR  = __DIR__ . DS;
const FILE = __FILE__;

add_action( 'after_setup_theme', NS . 'setup', 8 );
/**
 * Setup theme.
 *
 * @since 0.0.1
 *
 * @return void
 */
function setup(): void {
	$files = [
		...glob( DIR . 'includes/utility/*.php' ),
		...glob( DIR . 'includes/config/*.php' ),
		...glob( DIR . 'includes/*.php' ),
		...glob( DIR . 'includes/blocks/*.php' ),
		...glob( DIR . 'includes/extensions/*.php' ),
		...glob( DIR . 'includes/plugins/*.php' ),
	];

	foreach ( $files as $file ) {
		if ( is_readable( $file ) ) {
			require_once $file;
		}
	}
}
