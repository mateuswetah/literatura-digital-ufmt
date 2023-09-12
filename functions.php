<?php
if (! defined('WP_DEBUG')) {
	die( 'Direct access forbidden.' );
}
add_action( 'wp_enqueue_scripts', function () {
	wp_enqueue_style( 'parent-style', get_template_directory_uri() . '/style.css' );
	wp_enqueue_style( 'literatura-digital-ufmt-style', get_stylesheet_uri() );
	wp_enqueue_script( 'literatura-instagram', 'https://www.instagram.com/embed.js', array(), '1.0.0', array(
		'strategy' => 'async',
		'in_footer' => true
	)  );
	wp_enqueue_script( 'literatura-tiktok', 'https://www.tiktok.com/embed.js', array(), '1.0.0', array(
		'strategy' => 'async',
		'in_footer' => true
	) );
	wp_enqueue_script( 'literatura-twitter', 'https://platform.twitter.com/widgets.js', array(), '1.0.0', array(
		'strategy' => 'async',
		'in_footer' => true
	)  );
	wp_enqueue_script( 'literatura-facebook', 'https://connect.facebook.net/en_US/sdk.js#xfbml=1&version=v17.0', array(), '1.0.0' );
});

add_filter( 'tainacan-item-get-document-as-html', function($html, $img_size, $item) {

	if ( str_contains($html, 'https://www.facebook.com') ) {
		$html =	'<div id="fb-root"></div>
			<div class="fb-post" data-href="' . $item->get_document() . '" data-width="500" data-show-text="true">
				<blockquote cite="' . $item->get_document() . '" class="fb-xfbml-parse-ignore">
					Publicado por <a href="https://www.facebook.com/facebook/">Facebook</a> em&nbsp;<a href="' . $item->get_document() . '">' . $item->get_document() . '</a>
				</blockquote>
			</div>';
	}

	return $html;
}, 10, 3);