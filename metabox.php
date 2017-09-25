<?php
/*

	Добавление Metabox

*/

add_action('add_meta_boxes_page', 'at_portfolio_metabox');

function at_portfolio_metabox($post) {
    add_meta_box(
        'custom_meta_box',
        __( 'Portfolio metabox', 'at-portfolio' ),
        'render_at_portfolio_metabox',
        'at_portfolio',
        'side',
        'default'
    );
}

function render_at_portfolio_metabox($post) {
    $portfolio_date = get_post_meta($post->ID, 'portfolio_date', true);
    $portfolio_link = get_post_meta($post->ID, 'portfolio_link', true);
    ?>
    <p>
    <input type="text" name="portfolio_date" id="portfolio_date" value=<?=$portfolio_date;?> >
    </p>
    <p>
    <input type="text" name="portfolio_link" id="portfolio_link" value=<?=$portfolio_link;?> >
    </p>

    

    <?php
}

add_action('save_post', 'at_portfolio_metabox_save');

function at_portfolio_metabox_save( $post_id ) {
    if ( defined( 'DOING_AUTOSAVE' ) && DOING_AUTOSAVE ) {
        return $post_id;
    }

    if ( !isset($_POST['post_type']) ) return $post_id;

   // Sanitize the user input.
    $date = sanitize_text_field( $_POST['portfolio_date'] );
    $link = sanitize_text_field( $_POST['portfolio_link'] );

    // Update the meta field.
    update_post_meta( $post_id, 'portfolio_date', $date );
    update_post_meta( $post_id, 'portfolio_link', $link );

}
?>