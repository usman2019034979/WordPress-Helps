<?php
/**
 * WordPress Database Class
 */

global $wpdb;

// Get Table Prefix
$table_prefix = $wpdb->prefix;

// Get Results From Database And Print It
$results = $wpdb->get_results("SELECT * FROM {$wpdb->prefix}posts WHERE post_status = 'publish' AND post_type = 'page'");

// Insert Data Into Database
$wpdb->insert(
    "{$wpdb->prefix}posts",
    array(
        'post_type' => 'books',
        'post_title' => 'My New Post',
        'post_content' => 'Content goes here',
        'post_status' => 'publish',
        'post_date' => current_time('mysql')
    ),
    array('%s', '%s', '%s', '%s')
);

// Update Result In Database
$wpdb->update(
    "{$wpdb->prefix}posts",
    array('post_status' => 'draft', 'post_title' => 'Post Title', 'post_type' => 'post'),
    array('ID' => 1),
    array('%s'),
    array('%d')
);

// Delete Result From Database
$wpdb->delete("{$wpdb->prefix}posts", array('ID' => 131), array('%d'));

// Create Table If It Is Not Already Exist
$table_name = $wpdb->prefix . 'new';
$sql = "CREATE TABLE $table_name (
    id BIGINT(20) UNSIGNED NOT NULL AUTO_INCREMENT,
    name VARCHAR(255) NOT NULL,
    PRIMARY KEY (id)
) {$wpdb->get_charset_collate()};";
require_once(ABSPATH . 'wp-admin/includes/upgrade.php');
dbDelta($sql);