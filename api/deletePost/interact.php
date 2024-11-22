<?php
/**
 * Delete Post Via WordPress Rest Api With Custom Endpoint
 */

$id = 7;
$data = array(
    'id' => $id,
);

$api_url = 'http://localhost/wordpress/wp-json/delete_book/v2/delete_book';
$ch = curl_init($api_url);
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
curl_setopt($ch, CURLOPT_POST, true);
curl_setopt($ch, CURLOPT_POSTFIELDS, json_encode($data)); // You Can Use http_build_query() also for sending data
curl_setopt($ch, CURLOPT_HTTPHEADER, array(
    'Content-Type: application/json',
));

$response = curl_exec($ch);
if (curl_errno($ch)) {
    echo 'Curl error: ' . curl_error($ch);
} else {
    $response_data = json_decode($response, true);
    echo '<pre>';
    print_r($response_data);
    echo '</pre>';
}
curl_close($ch);