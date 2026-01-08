<?php
/**
 * Text and Image Block Template
 */

// Check if this is preview mode and show preview image
if (isset($block['data']['_is_preview'])) {
	echo '<img src="' . get_stylesheet_directory_uri() . '/blocks/text-and-image/preview.jpg" alt="Block Preview" style="width: 100%; height: auto;">';
	return;
}

$layout   = get_field( 'layout' ) ?: 'text_first';
$background   = get_field( 'background' ) ?: 'default';
$image_id = get_field( 'image' );
$title    = get_field( 'title' );
$summary  = get_field( 'summary_text' );
$body     = get_field( 'body_text' );
$button   = get_field( 'button' );

$block_id   = 'text-and-image-' . ( $block['id'] ?? uniqid() );
$class_name = 'text-and-image';
if ( ! empty( $block['className'] ) ) {
	$class_name .= ' ' . $block['className'];
}
$class_name .= ' text-and-image--' . $layout;
$class_name .= ' text-and-image--bg-' . $background;
?>

<section id="<?php echo esc_attr( $block_id ); ?>" class="<?php echo esc_attr( $class_name ); ?>">
	<div class="text-and-image__container">

		<div class="text-and-image__content">
			<?php if ( $title ) : ?>
				<h2 class="text-and-image__title"><?php echo wp_strip_all_tags( $title ); ?></h2>
			<?php endif; ?>
			<div class="text-and-image__text">
				<?php if ( $summary ): ?>
					<p class="text-and-image__summary">
						<?php echo wp_kses_post( $summary ); ?>
						<?php if ( $body ) : ?>
							<button class="text-and-image__read-more" type="button" aria-expanded="false">
								<?php esc_html_e( 'Read more', 'airfleet' ); ?>
							</button>
						<?php endif; ?>
					</p>
				<?php endif; ?>

				<?php if ( $body ): ?>
					<p class="text-and-image__body">
						<?php echo wp_kses_post( $body ); ?>
					</p>
				<?php endif; ?>
			</div>

			<?php if ( $button ): ?>
				<a class="text-and-image__button" href="<?php echo esc_url( $button['url'] ); ?>"
					<?php echo $button['target'] ? 'target="' . esc_attr( $button['target'] ) . '"' : ''; ?>>
					<?php echo esc_html( $button['title'] ); ?>
				</a>
			<?php endif; ?>
		</div>

		<?php if ( $image_id ): ?>
			<figure class="text-and-image__image">
				<?php echo wp_get_attachment_image( $image_id, 'large' ); ?>
			</figure>
		<?php endif; ?>

	</div>
</section>
