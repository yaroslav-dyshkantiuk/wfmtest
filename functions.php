<?php

require __DIR__ . '/inc/Wfmtest_Menu.php';
require __DIR__ . '/inc/Wfmtest_Metabox.php';
require __DIR__ . '/inc/admin-functions.php';

function wfmtest_debug($data) {
    echo '<pre>' . print_r($data, 1) . '</pre>';
}

function wfmtest_scripts() {
    wp_enqueue_style('wfmtest_bootstrap', get_template_directory_uri() . '/assets/css/bootstrap.min.css');
    // wp_enqueue_style('wfmtest_main', get_template_directory_uri() . '/assets/css/main.css');
    wp_enqueue_style('wfmtest_style', get_stylesheet_uri(), array(), wp_get_theme()->get('Version'));

    wp_enqueue_script('jquery');
    wp_enqueue_script('wfmtest_main', get_template_directory_uri() . '/assets/js/main.js', array(), false, true);
    wp_enqueue_script('wfmtest_bootstrap', get_template_directory_uri() . '/assets/js/bootstrap.bundle.min.js', array(), false, true);
}

add_action( 'wp_enqueue_scripts', 'wfmtest_scripts' );

add_filter('excerpt_more', function($more) {
	return '...';
});

function wfmtest_get_human_time_diff(){
    $human_time = human_time_diff( get_post_time( 'U', true ) );
    return __('Published ', 'wfmtest') . "$human_time " . __('ago.', 'wfmtest');
}

function wfmtest_setup() {
	load_theme_textdomain( 'wfmtest', get_template_directory() . '/languages' );

    add_theme_support('post-thumbnails');
    add_theme_support('title-tag');
    add_theme_support('custom-logo', array(
        'width' => 100,
        'height' => 50,
        'flex-width' => false,
        'flex-height' => false,
    ));
    add_theme_support('custom-background', array(
        'default-color' => 'fff',
        'default-image' => get_template_directory_uri() . '/assets/img/bg.jpg',
    ));
    register_default_headers( array(
		'default-image' => array(
			'url' => get_template_directory_uri() . '/assets/img/header.jpg',
			'thumbnail_url' => get_template_directory_uri() . '/assets/img/header.jpg',
			'description' => 'Default Header Image',
		)
	) );
    add_theme_support('custom-header', array(
        'default-image' => get_template_directory_uri() . '/assets/img/header.jpg',
        'width' => 1900,
        'height' => 700,
        'default-text-color' => 'fff',
    ));
    add_theme_support( 'post-formats', array('image', 'video') );
    register_nav_menus( [
		'header_menu' => __( 'Header Menu', 'wfmtest' ),
		'footer_menu' => __( 'Footer Menu', 'wfmtest' ),
	] );
}
add_action('after_setup_theme', 'wfmtest_setup');

function wfmtest_post_thumb($id, $size = 'full', $wrapper_class = 'card-thumb') {
    $html = '<div class="' . $wrapper_class . ' ">';
    if(has_post_thumbnail()) {
        $html .= get_the_post_thumbnail($id, $size);
    } else {
        $html .= '<img src="https://picsum.photos/1200/900?grayscale" alt="" width="1200" height="900">';
    }
    $html .= '</div>';
    return $html;
}

function wfmtest_get_media($types = array()) {
    $content = apply_filters('the_content', get_the_content());
    $items = get_media_embedded_in_content($content, $types); 
    return $items[0] ?? $items;
}

// Customizer

function wfmtest_customize_register($wp_customize) {
    $wp_customize->add_setting( 'wfmtest_link_color', array(
		'default'   => '#0d6efd',
		'transport' => 'refresh',
	) );

    $wp_customize->add_control( new WP_Customize_Color_Control( $wp_customize, 'wfmtest_link_color', array(
		'label'    => __( 'Link color', 'wfmtest' ),
		'section'    => 'colors',
		'settings'   => 'wfmtest_link_color',
	) ) );

    // $wp_customize->add_setting( 'wfmtest_display_description', array(
	// 	'default'   => true,
	// 	'transport' => 'refresh',
	// ) );

    // $wp_customize->add_control( 'wfmtest_display_description', array(
	// 	'section'    => 'title_tagline',
	// 	'label'      => 'Display description',
	// 	'setting'   => 'wfmtest_display_description',
    //     'type' => 'checkbox',
    //     'priority' => 40,
	// )  );

    // Add Section
	$wp_customize->add_section( 'wfmtest_site_options' , array(
		'title'    => __( 'Site settings', 'wfmtest' ),
		'priority'   => 10,
	) );

    // Display description
    $wp_customize->add_setting( 'wfmtest_display_description', array(
		'default'   => true,
		'transport' => 'postMessage',
	) );

    $wp_customize->add_control( 'wfmtest_display_description', array(
		'section'    => 'wfmtest_site_options',
		'label'   => __( 'Display description', 'wfmtest' ),
        'type' => 'checkbox',
 	)  );

    // Phone
	$wp_customize->add_setting( 'wfmtest_phone', array(
		'default'   => '',
		'transport' => 'postMessage',
	) );

	$wp_customize->add_control( 'wfmtest_phone', array(
		'section'  => 'wfmtest_site_options',
		'label'   => __( 'Phone', 'wfmtest' ),
		'type'     => 'text',
	) );

}

add_action( 'customize_register', 'wfmtest_customize_register' );

function wfmtest_customize_css()
{
	?>
	<style type="text/css">
        a { color: <?php echo get_theme_mod('wfmtest_link_color', '#0d6efd'); ?>; }
	</style>
	<?php
}
add_action( 'wp_head', 'wfmtest_customize_css');

function wfmtest_customizer_live_preview()
{
	wp_enqueue_script(
		'wfmtest-customize',			//Give the script an ID
		get_template_directory_uri().'/assets/js/wfmtest-customize.js',//Point to file
		array( 'jquery','customize-preview' ),	//Define dependencies
		'',						//Define a version (optional)
		true						//Put script in footer?
	);
}
add_action( 'customize_preview_init', 'wfmtest_customizer_live_preview' );

// Widgets
function wfmtest_widgets_init() {
	register_sidebar( array(
		'name'         => "Sidebar 1",
		'id'           => 'sidebar-1',
		'description'  => 'Sidebar widgets',
		'before_widget' => '<section id="%1$s" class="widget %2$s">',
		'after_widget' => '</section>',
		'before_title' => '<h3 class="widget-title">',
		'after_title'  => '</h3>',
	) );
}

add_action( 'widgets_init', 'wfmtest_widgets_init' );

function wfmtest_custom_init() {
	register_post_type('book', array(
		'labels' => array(
			'name'          => __( 'Books', 'wfmtest' ),
			'singular_name' => __( 'Book', 'wfmtest' ),
			'all_items'     => __( 'All Books', 'wfmtest' ),
		),
		'public' => true,
		'supports' => array('title', 'editor', 'thumbnail', 'custom-fields'),
		'show_in_rest' => true,
		'menu_position' => 2,
		'menu_icon' => 'dashicons-book',
	));
}

add_action('init', 'wfmtest_custom_init');

function wfmtest_get_price($post_id) {
	$price = get_post_meta($post_id, 'book_price', true);

	return $price ? "<p class='wfmtest-price'>Price: {$price}</p>" : "<p class='wfmtest-price'>Price: -</p>" ;
}

function wfmtest_get_book_pages($post_id) {
	$pages = get_post_meta($post_id, 'book_pages', true);

	return $pages ? "<p class='wfmtest-pages'>Number of pages: {$pages}</p>" : "<p class='wfmtest-pages'>Number of pages: -</p>" ;
}

function wfmtest_get_book_cover($post_id) {
	$cover = get_post_meta($post_id, 'cover', true);

	return $cover ? "<p class='wfmtest-cover'>Has cover: {$pages}</p>" : "<p class='wfmtest-cover'>Has cover: -</p>" ;
}
