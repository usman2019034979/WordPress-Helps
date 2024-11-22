<?php

/**
 * WordPress Settings Api
 */

// Step 1: Create Admin Menu Page
function settings_admin_menu()
{
    add_menu_page(
        'Theme Settings',
        'Theme Settings',
        'manage_options',
        'theme_settings',
        'theme_settings_page',
        '',
        20
    );
}

add_action('admin_menu', 'settings_admin_menu');

// Step 2: Create Settings
function theme_settings_init()
{
    register_setting('theme_settings_group', 'theme_settings_options');
    add_settings_section('theme_settings_section', 'Setting Section Title', 'theme_settings_section_callback', 'theme_settings');

    add_settings_field('name_setting', 'Name', 'theme_settings_name_callback', 'theme_settings', 'theme_settings_section');
    add_settings_field('email_setting', 'Email', 'theme_settings_email_callback', 'theme_settings', 'theme_settings_section');
    add_settings_field('image_setting', 'Image', 'theme_settings_image_callback', 'theme_settings', 'theme_settings_section');
}

add_action('admin_init', 'theme_settings_init');

// Step 3: All Callback Functions
function theme_settings_section_callback()
{
    echo 'Add Settings Section Callback';
}

function theme_settings_name_callback()
{
    $options = get_option('theme_settings_options');
    $name_setting = isset($options['name_setting']) ? $options['name_setting'] : '';
    echo '<input type="text" name="theme_settings_options[name_setting]" value="' . esc_attr($name_setting) . '" placeholder="Enter your name" />';
}

function theme_settings_email_callback()
{
    $options = get_option('theme_settings_options');
    $email_setting = isset($options['email_setting']) ? $options['email_setting'] : '';
    echo '<input type="email" name="theme_settings_options[email_setting]" value="' . esc_attr($email_setting) . '" placeholder="Enter your email" />';
}

function theme_settings_image_callback()
{
    $options = get_option('theme_settings_options');
    $image_url = isset($options['image_setting']) ? $options['image_setting'] : '';

    echo '<input type="text" id="theme-settings-image" name="theme_settings_options[image_setting]" value="' . esc_attr($image_url) . '" class="regular-text" />';
    echo '<input type="button" class="button" value="Select Image" id="theme-settings-upload-btn" />';
    if ($image_url) {
        echo '<br><img src="' . esc_url($image_url) . '" style="max-width: 200px; margin-top: 10px;" />';
    }
    echo '<script>
        jQuery(document).ready(function($) {
            var custom_uploader;
            $("#theme-settings-upload-btn").click(function(e) {
                e.preventDefault();
                if (custom_uploader) {
                    custom_uploader.open();
                    return;
                }
                custom_uploader = wp.media({
                    title: "Select Image",
                    button: {
                        text: "Use this image"
                    },
                    multiple: false  // Set to false to allow only one image
                })
                .on("select", function() {
                    var attachment = custom_uploader.state().get("selection").first().toJSON();
                    $("#theme-settings-image").val(attachment.url);
                    $("img").attr("src", attachment.url).show();
                })
                .open();
            });
        });
    </script>';
}

function theme_settings_page()
{
    echo '<div class="wrap">';
    echo '<h2>Theme Settings</h2>';
    echo '<form method="post" action="options.php">';
    settings_fields('theme_settings_group');
    do_settings_sections('theme_settings');
    submit_button();
    echo '</form>';
    echo '</div>';
}

// Step 4: Add Admin javascript For Image Functionality

function enqueue_media_uploader()
{
    if (isset($_GET['page']) && $_GET['page'] == 'theme_settings') {
        wp_enqueue_media();
        wp_enqueue_script('jquery');
    }
}

add_action('admin_enqueue_scripts', 'enqueue_media_uploader');