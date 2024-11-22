<form action="" method="post" enctype="multipart/form-data">
    <label for="fname">Upload Image:</label><br>
    <input type="file" id="file" name="file"><br><br>
    <input type="submit" value="Submit" name="submit">
</form>

<?php

/**
 * Get Image And Insert As A WordPress Attachment
 */

if (isset($_POST['submit'])) {
    if (isset($_FILES['file']) && $_FILES['file']['error'] === 0) {
        $file = $_FILES['file'];

        require_once(ABSPATH . 'wp-admin/includes/file.php');
        require_once(ABSPATH . 'wp-admin/includes/image.php');
        require_once(ABSPATH . 'wp-admin/includes/media.php');

        $upload_overrides = array('test_form' => false);
        $uploaded_file = wp_handle_upload($file, $upload_overrides);

        if (isset($uploaded_file['error'])) {
            echo "Error: " . $uploaded_file['error'];
            exit();
        }

        $file_url = $uploaded_file['url'];
        $file_path = $uploaded_file['file'];
        $attachment = array(
            'guid' => $file_url,
            'post_mime_type' => $uploaded_file['type'],
            'post_title' => preg_replace('/\.[^.]+$/', '', basename($file['name'])),
            'post_content' => '',
            'post_status' => 'inherit',
        );
        $attachment_id = wp_insert_attachment($attachment, $file_path);
        $attachment_metadata = wp_generate_attachment_metadata($attachment_id, $file_path);
        wp_update_attachment_metadata($attachment_id, $attachment_metadata);
        echo "File uploaded and attached successfully!";
    }
}