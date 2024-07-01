<?php

function wfmtest_add_admin_page() {
	$hook_suffix = add_menu_page( __( 'WFM Theme Options', 'wfmtest' ), 'WFMTheme', 'manage_options', 'wfmtest-options', 'wfmtest_create_page', get_template_directory_uri() . '/assets/img/moon.png' );

	add_submenu_page( 'wfmtest-options', __( 'WFM Theme Options', 'wfmtest' ), __( 'General', 'wfmtest' ), 'manage_options', 'wfmtest-options', 'wfmtest_create_page' );

	add_submenu_page( 'wfmtest-options', __( 'WFM Theme Options Subpage', 'wfmtest' ), __( 'Additional', 'wfmtest' ), 'manage_options', 'wfmtest-options-subpage', 'wfmtest_create_subpage' );

	add_action( "admin_print_scripts-{$hook_suffix}", "wfmtest_admin_scripts" );
	add_action( 'admin_init', 'wfmtest_custom_settings' );
}

add_action( 'admin_menu', 'wfmtest_add_admin_page' );

function wfmtest_custom_settings() {
    register_setting( 'wfmtest_general_group', 'wfmtest_email' );
    register_setting( 'wfmtest_general_group', 'wfmtest_facebook' );

    add_settings_section( 'wfmtest_general_section', 'Options section', function () {
        echo '<p>Text describing the settings block</p>';
    }, 'wfmtest-options' );

    // add_settings_section( 'wfmtest_general_section2', 'Options section 2', '', 'wfmtest-options' );

    add_settings_field( 'wfmtest_email_field', 'E-mail', 'wfmtest_general_email_field', 'wfmtest-options', 'wfmtest_general_section', array( 'label_for' => 'wfmtest_email_field' ) );

    add_settings_field( 'wfmtest_facebook_field', 'Facebook', 'wfmtest_general_facebook_field', 'wfmtest-options', 'wfmtest_general_section', array( 'label_for' => 'wfmtest_facebook_field' ) );
}

function wfmtest_general_email_field() { 
    $wfmtest_email = esc_attr(get_option('wfmtest_email'));

    echo '<input type="email" name="wfmtest_email" class="regular-text" id="wfmtest_email_field" value="' . $wfmtest_email . '"><p class="description">Text description with some tips for email field</p>';
}

function wfmtest_general_facebook_field() { 
    $wfmtest_facebook = esc_attr(get_option('wfmtest_facebook'));

    echo '<input type="text" name="wfmtest_facebook" class="regular-text" id="wfmtest_facebook_field" value="' . $wfmtest_facebook . '">';
}

function wfmtest_create_page() {
	require get_template_directory() . '/inc/templates/wfmtest-options.php';
}

function wfmtest_create_subpage() {
	require get_template_directory() . '/inc/templates/wfmtest-options-subpage.php';
}

function wfmtest_admin_scripts() {
    wp_enqueue_style( 'wfmtest-admin-main-style', get_template_directory_uri() . '/assets/css/admin-main.css' );
}


