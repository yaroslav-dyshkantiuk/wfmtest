<?php

function wfmtest_add_metabox() {
    add_meta_box('book_info_metabox', 'Book data', 'wfmtest_add_metabox_cb', array('book'));
}

function wfmtest_add_metabox_cb($post) {
    wp_nonce_field('wfmtest_action', 'wfmtest_nonce');

    $book_pages = get_post_meta($post->ID, 'book_pages', true);
    $book_cover = get_post_meta($post->ID, 'book_cover', true);
?>
    <tabel class="form-table">
        <tbody>
            <tr>
                <th><label for="book_pages">Number of pages: </label></th>
                <td><input type="text" id="book_pages" name="book_pages" class="regular-text" value="<?php echo esc_attr($book_pages); ?>"></td>
            </tr>
        </tbody>
        <tbody>
            <tr>
                <th><label for="book_cover">Cover?</label></th>
                <td><input type="checkbox" id="book_cover" name="book_cover"  value="<?php checked('yes', $book_cover) ?>"></td>
            </tr>
        </tbody>
    </tabel>
<?php
}

add_action('add_meta_boxes', 'wfmtest_add_metabox');

function wfmtest_save_metabox($post_id) {
    // make sure the field is set.
	if ( ! isset( $_POST['wfmtest_nonce'] ) )
    return;

    // check the nonce of our page, because save_post can be called from another location.
	if ( ! wp_verify_nonce( $_POST['wfmtest_nonce'], 'wfmtest_action' ) )
    return;

    // if this is autosave do nothing
	if ( defined('DOING_AUTOSAVE') && DOING_AUTOSAVE ) 
    return;

    // check user permission
	if( ! current_user_can( 'edit_post', $post_id ) )
    return;

    if(!empty( $_POST['book_pages'] )) {
        update_post_data($post_id, 'book_pages', sanitize_text_field($_POST['book_pages']));
    } else {
        delete_post_meta($post_id, 'book_pages');
    }
    
    if( isset( $_POST['book_cover'] ) && $_POST['book_cover'] == 'on') {
        update_post_data($post_id, 'book_cover', 'yes');
    } else {
        delete_post_meta($post_id, 'book_cover');
    }
}