<?php
// start add logo for dark header
function my_customize_register($wp_customize)
{
    $wp_customize->add_setting('header_logo', array(
        'default' => '',
        'sanitize_callback' => 'absint',
    ));

    $wp_customize->add_control(new WP_Customize_Media_Control($wp_customize, 'header_logo', array(
        'section' => 'title_tagline',
        'label' => 'Logo for dark header'
    )));

    $wp_customize->selective_refresh->add_partial('header_logo', array(
        'selector' => '.header-logo',
        'render_callback' => function () {
            $logo = get_theme_mod('header_logo');
            $img = wp_get_attachment_image_src($logo, 'full');
            if ($img) {
                return '<img src="' . $img[0] . '" alt="Logo">';
            } else {
                return '';
            }
        }
    ));
}

add_action('customize_register', 'my_customize_register');
// end add logo for dark header


//start  add customizer fo footer info

add_action('customize_register', 'dco_customize_register_contact_title');
function dco_customize_register_contact_title($wp_customize)
{
    $setting_name = 'contact_title';
    $wp_customize->add_setting($setting_name, array(
        'sanitize_callback' => 'sanitize_textarea_field',
        'transport' => 'postMessage'
    ));

    $wp_customize->add_control($setting_name, array(
        'section' => 'footer',
        'type' => 'text',
        'label' => 'Contact form title',
    ));
}
add_action('customize_register', 'dco_customize_register_contact_subtitle');
function dco_customize_register_contact_subtitle($wp_customize)
{
    $setting_name = 'contact_subtitle';
    $wp_customize->add_setting($setting_name, array(
        'sanitize_callback' => 'sanitize_textarea_field',
        'transport' => 'postMessage'
    ));

    $wp_customize->add_control($setting_name, array(
        'section' => 'footer',
        'type' => 'text',
        'label' => 'Contact form subtitle',
    ));
}


add_action('customize_register', 'dco_customize_register');
function dco_customize_register($wp_customize)
{

    $wp_customize->add_section('footer', array(
        'title' => 'Footer info',
        'priority' => 1,
    ));

    $setting_name = 'twitter-link';
    $wp_customize->add_setting($setting_name, array(
        'sanitize_callback' => 'sanitize_textarea_field',
        'transport' => 'postMessage'
    ));

    $wp_customize->add_control($setting_name, array(
        'section' => 'footer',
        'type' => 'text',
        'label' => 'Link to twitter',
    ));
}

add_action('customize_register', 'dco_customize_register1');
function dco_customize_register1($wp_customize)
{
    $setting_name = 'linkedin-link';
    $wp_customize->add_setting($setting_name, array(
        'sanitize_callback' => 'sanitize_textarea_field',
        'transport' => 'postMessage'
    ));

    $wp_customize->add_control($setting_name, array(
        'section' => 'footer',
        'type' => 'text',
        'label' => 'Link to linkedin',
    ));
}

add_action('customize_register', 'dco_customize_register_legal_text');
function dco_customize_register_legal_text($wp_customize)
{
    $setting_name = 'legal-text';
    $wp_customize->add_setting($setting_name, array(
        'sanitize_callback' => 'sanitize_textarea_field',
        'transport' => 'postMessage'
    ));

    $wp_customize->add_control($setting_name, array(
        'section' => 'footer',
        'type' => 'text',
        'label' => 'Legal text',
    ));
}

add_action('customize_register', 'dco_customize_register_legal_link');
function dco_customize_register_legal_link($wp_customize)
{
    $setting_name = 'legal-link';
    $wp_customize->add_setting($setting_name, array(
        'sanitize_callback' => 'sanitize_textarea_field',
        'transport' => 'postMessage'
    ));

    $wp_customize->add_control($setting_name, array(
        'section' => 'footer',
        'type' => 'text',
        'label' => 'Legal link',
    ));
}

add_action('customize_register', 'dco_customize_register_legal_text_for_link');
function dco_customize_register_legal_text_for_link($wp_customize)
{
    $setting_name = 'legal-text-for-link';
    $wp_customize->add_setting($setting_name, array(
        'sanitize_callback' => 'sanitize_textarea_field',
        'transport' => 'postMessage'
    ));

    $wp_customize->add_control($setting_name, array(
        'section' => 'footer',
        'type' => 'text',
        'label' => 'Legal text for link',
    ));
}



//start  add customizer fo footer info