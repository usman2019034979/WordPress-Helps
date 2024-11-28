<?php

/**
 * WordPress Cron Job
 */

function custom_schedule( $schedules )
{
    $schedules[ 'every_115_minutes' ] = array(
        'interval' => 115,
        'display'  => 'Every 115 minutes',
    );

    return $schedules;
}

function schedule_custom_event()
{
    add_filter( 'cron_schedules', 'custom_schedule' );
    if( !wp_next_scheduled( 'custom_event' ) )
    {
        wp_schedule_event( time(), 'every_115_minutes', 'custom_event' );
    }
}
add_action( 'init', 'schedule_custom_event' );

function custom_event_callback()
{
   $args    =   array(
       'post_type'  =>  'post',
       'post_status'    =>  'publish',
       'post_title' =>  'Cron Jobs Post Title',
   );
   wp_insert_post($args);
}
add_action( 'custom_event', 'custom_event_callback' );
