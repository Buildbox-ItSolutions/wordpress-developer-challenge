<?php

global $post;

	// Get existing values from database
	$duration = get_post_meta($post->ID, 'bx_play_video_duration', true);
	$embed = get_post_meta($post->ID, 'bx_play_video_ID', true);
	?>

<div>
    <?php 	wp_nonce_field( 'wp_play_nonce', 'wp_play_nonce' ); ?>
    
	<label for="bx_play_video_duration"><?php esc_html_e('Duration', 'videos'); ?></label>
	<input type="text" name="bx_play_video_duration" id="bx_play_video_duration" value="<?php echo esc_attr($duration); ?>" />

	<label for="bx_play_video_ID"><?php esc_html_e('Embed', 'videos'); ?></label>
	<input type="text" name="bx_play_video_ID" id="bx_play_video_ID" value="<?php echo esc_attr($embed); ?>" />

</div>

	

	

	