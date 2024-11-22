<form method="post">
    <input type="hidden" name="book_id" value="256">
    <label for="post-title">Post Title:</label><br>
    <input type="text" id="post-title" name="post_title"><br>
    <label for="content">Content:</label><br>
    <input type="text" id="content" name="content">
    <input type="submit" value="Submit" name="submit">
</form>

<?php
/**
 * Update Post Via WordPress Rest Api With Custom Endpoint
 */

if (isset($_POST['submit'])) {
    $id = $_POST['book_id'];
    $title = $_POST['post_title'];
    $content = $_POST['content'];

    $data = array(
        'id' => $id,
        'title' => $title,
        'content' => $content,
    );

    $api_url = 'http://localhost/wordpress/wp-json/update_book/v2/update_book';
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
        if (isset($response_data['post_id'])) {
            echo "Success! The book has been updated with ID: " . $response_data['post_id'];
        } else {
            echo "Failed to update book.";
        }
    }
    curl_close($ch);
}