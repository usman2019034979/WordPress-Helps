<?php

/**
 * Create Admin Menu Page
 */
function add_school_admin_menu()
{
    add_menu_page(
        'School',
        'School',
        'manage_options',
        'school',
        'school_menu_page',
        'dashicons-school',
        6
    );
}

function school_menu_page()
{
    ?>
    <div class="wrap">
        <h1>Welcome to the School Admin Page</h1>
        <p>Here you can manage school-related settings.</p>
    </div>
    <?php
}

add_action('admin_menu', 'add_school_admin_menu');