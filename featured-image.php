<?php 

function add_Featured_Image( $image_url, $post_id, $caption='', $description=''  ){
	
	$upload_dir = wp_upload_dir();
    $image_data = file_get_contents($image_url);
    $filename = sanitize_file_name(basename($image_url));
    if(wp_mkdir_p($upload_dir['path']))     $file = $upload_dir['path'] . '/' . $filename;
    else                                    $file = $upload_dir['basedir'] . '/' . $filename;
    file_put_contents($file, $image_data);

    $wp_filetype = wp_check_filetype($filename, null );
    $attachment = array(
        'post_mime_type' => $wp_filetype['type'],
        'post_title' => sanitize_file_name($filename),
        'post_excerpt' => $caption, 
        'post_content' => $description, 
        'post_status' => 'inherit'
    );
    $attach_id = wp_insert_attachment( $attachment, $file, $post_id );
    require_once(ABSPATH . 'wp-admin/includes/image.php');
    $attach_data = wp_generate_attachment_metadata( $attach_id, $file );
    $res1= wp_update_attachment_metadata( $attach_id, $attach_data );
    $res2= set_post_thumbnail( $post_id, $attach_id );
}

// some image URL
// some Post ID
add_Featured_Image('https://www.gstatic.com/webp/gallery3/1.sm.png', '1');

?>
