<?php
/**
 * Template part for displaying single posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package bbginnovate
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>





<?php
	/*
	if (has_post_thumbnail()) {
		$thumb = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'large-thumb' );
		$url = $thumb['0'];
			<section class="usa-bbg-banner" style="background-image:url(<?php echo $url; ?>)">
				<div class="usa-grid">
					<a href="#">
					</a>
					<div class="usa-bbg-banner-box">
						<h1 class="usa-bbg-banner-site-title"><?php bloginfo( 'name' ); ?></h1>
						<?php $description = get_bloginfo( 'description', 'display' );
						if ( $description || is_customize_preview() ) : ?>
							<h3 class="usa-bbg-banner-site-description"><?php echo $description; ?></h3>
						<?php endif; ?>
					</div>
				</div>
			</section>
	}
	*/
?>
	<div class="usa-grid">

		<header class="entry-header">
		<?php
			if (has_post_thumbnail()) {
				echo '<div class="single-post-thumbnail clear usa-single_post_thumbnail usa-banner">';
				echo the_post_thumbnail('large-thumb');
				echo '</div>';
			}
		?>
			<?php the_title( '<h1 class="entry-title">', '</h1>' ); ?>

			<div class="entry-meta">
				<?php bbginnovate_posted_on(); ?>
			</div><!-- .entry-meta -->
		</header><!-- .entry-header -->

		<div class="entry-content usa-bbg-entry-content">
			<?php the_content(); ?>
			<?php
				wp_link_pages( array(
					'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'bbginnovate' ),
					'after'  => '</div>',
				) );
			?>
		</div><!-- .entry-content -->
	</div><!-- .usa-grid -->

	<footer class="entry-footer">
		<?php bbginnovate_entry_footer(); ?>
	</footer><!-- .entry-footer -->
</article><!-- #post-## -->
