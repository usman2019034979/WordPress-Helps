<?php
	/**
 * WordPress Customizer Api
 * When You Need To Get The Settings, Then
 * get_theme_mod(settings_id);
 */

function register_customizer($wp_customize)
{
//    Add Panel
    $wp_customize->add_panel('theme_settings_panel', array(
        'title' => __('Theme Settings', 'nafayh'),
        'priority' => 10,
    ));

//    Add First Section
    $wp_customize->add_section('main_settings_section', array(
        'title' => __('Main Settings', 'nafayh'),
        'panel' => 'theme_settings_panel',
        'priority' => 30,
    ));

    $wp_customize->add_setting('name_field', array(
        'default' => '',
        'transport' => 'postMessage',
    ));

    $wp_customize->add_control('name_field_control', array(
        'label' => __('Name', 'nafayh'),
        'section' => 'main_settings_section',
        'settings' => 'name_field',
        'type' => 'text',
    ));

    $wp_customize->add_setting('email_field', array(
        'default' => '',
        'transport' => 'postMessage',
    ));

    $wp_customize->add_control('email_field_control', array(
        'label' => __('Email', 'nafayh'),
        'section' => 'main_settings_section',
        'settings' => 'email_field',
        'type' => 'email',
    ));

//    Add Second Section
    $wp_customize->add_section('second_settings_section', array(
        'title' => __('Second Settings', 'nafayh'),
        'panel' => 'theme_settings_panel',
        'priority' => 40,
    ));

    $wp_customize->add_setting('number_field', array(
        'default' => '',
        'transport' => 'postMessage',
    ));

    $wp_customize->add_control('number_field_control', array(
        'label' => __('Number', 'nafayh'),
        'section' => 'second_settings_section',
        'settings' => 'number_field',
        'type' => 'number',
    ));

}

add_action('customize_register', 'register_customizer');