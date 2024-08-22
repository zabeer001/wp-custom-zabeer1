<?php
/* 
* My Theme Function

*/

// Theme title

add_theme_support('title_tag');

//css and js file calling // boosttrap // jquery 

function zabeer_css_js_file_calling()
{
    wp_enqueue_style('zabeer-style', get_stylesheet_uri());
    // Correct the file path and concatenate it properly
    wp_register_style('bootstrap', get_template_directory_uri() . '/css/bootstrap.css', array(), '5.3.3', 'all');
    //custom
    wp_register_style('custom', get_template_directory_uri() . '/css/custom.css', array(), '5.3.3', 'all');

    // Enqueue the registered style
    wp_enqueue_style('bootstrap');
    wp_enqueue_style('custom');


    //jquery
    wp_enqueue_script('jquery');


    //
    wp_register_script('bootstrap', get_template_directory_uri() . '/js/bootstrap.js', array(), '5.0.2', 'true');
}
add_action('wp_enqueue_scripts', 'zabeer_css_js_file_calling');

//google font

function zabeer_add_google_fonts() {
    wp_enqueue_style('ali_google_fonts', 'https://fonts.googleapis.com/css2?family=Kaisei+Decol&family=Oswald&display=swap', false);
}

add_action( 'wp_enqueue_scripts', 'zabeer_add_google_fonts');


//theme function 
function zabeer_customizer_register($wp_customize){
    $wp_customize->add_section('zabeer_header_area', array(
        'title'=> __('Header Area','zabeer'),
        'description'=> 'If you are interested in updating the header section, do it here.',
    ));

    $wp_customize->add_setting('zabeer_logo', array(
        'default'=> get_bloginfo('template_directory').'/img/logo.png',
    ));

    $wp_customize->add_control(new WP_Customize_Image_Control($wp_customize, 'zabeer_logo', array(
        'label' => 'Logo Upload',
        'description' => 'if you want to change the logo. update here',
        'setting' => 'zabeer_logo',
        'section' => 'zabeer_header_area',
    )));
}

add_action('customize_register', 'zabeer_customizer_register');


//Menu Register

register_nav_menu( 'main_menu',__('Main Menu'));


?>