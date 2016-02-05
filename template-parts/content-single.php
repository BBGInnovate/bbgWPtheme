<?php
/**
 * Template part for displaying single posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package bbginnovate
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class("bbg__article"); ?>>

<?php
	/*
	if (has_post_thumbnail()) {
		$thumb = wp_get_attachment_image_src( get_post_thumbnail_id($post->ID), 'large-thumb' );
		$url = $thumb['0'];
			<section class="bbg-banner" style="background-image:url(<?php echo $url; ?>)">
				<div class="usa-grid">
					<a href="#">
					</a>
					<div class="bbg-banner-box">
						<h1 class="bbg-banner-site-title"><?php bloginfo( 'name' ); ?></h1>
						<?php $description = get_bloginfo( 'description', 'display' );
						if ( $description || is_customize_preview() ) : ?>
							<h3 class="bbg-banner-site-description"><?php echo $description; ?></h3>
						<?php endif; ?>
					</div>
				</div>
			</section>
	}
	*/
?>
	<div class="usa-grid">
		
		<?php echo bbginnovate_post_categories( '', true ); ?>
		<!-- .bbg-label -->

		<header class="entry-header bbg__article-header">
		<?php
			if (has_post_thumbnail()) {
				echo '<div class="single-post-thumbnail clear bbg__article-header__thumbnail--large">';
				echo the_post_thumbnail('large-thumb');
				echo '</div>';
			}
		?><!-- .bbg__article-header__thumbnail -->

			<?php the_title( '<h1 class="entry-title bbg__article-header__title">', '</h1>' ); ?>
			<!-- .bbg__article-header__title -->

			<div class="entry-meta bbg__article-meta">
				<?php bbginnovate_posted_on(); ?>
			</div><!-- .bbg__article-meta -->
		</header><!-- .bbg__article-header -->

		<ul class="bbg__article-share">
			<li class="bbg__article-share__link email">
				<a href="#">
					<span class="bbg__article-share__icon email"></span>
					<span class="bbg__article-share__text">Email</span>
				</a>
			</li>
			<li class="bbg__article-share__link facebook">
				<a href="#">
					<span class="bbg__article-share__icon facebook"></span>
					<span class="bbg__article-share__text">Share</span>
				</a>
			</li>
			<li class="bbg__article-share__link twitter">
				<a href="#">
					<span class="bbg__article-share__icon twitter"></span>
					<span class="bbg__article-share__text">Tweet</span>
				</a>
			</li>
		</ul>

		<div class="entry-content bbg__article-content">
			<?php the_content(); ?>
			<?php
				wp_link_pages( array(
					'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'bbginnovate' ),
					'after'  => '</div>',
				) );
			?>
			<?php 
				$usersInProjectStr=get_post_meta( get_the_ID(), 'users_in_project', true );
				if ( $usersInProjectStr != "") {
					//$args = array( 'include' => [11,10,19,13,24,9,3,1]); prod
					$userIDs = explode( ',', $usersInProjectStr );
					array_walk( $userIDs, 'intval' );
					$args = array( 'include' => $userIDs, 'orderby' => 'include');

					$blogusers = get_users($args);
					// Loop through the users to create the staff profiles
					if ($blogusers) {
						echo "Users in Project: <ul>";
						foreach ( $blogusers as $user ) {
							$authorName = esc_html( $user->display_name );
							$authorOccupation = esc_html( $user->occupation );
							echo "<li>$authorName - $authorOccupation</li>";
						}
						echo "</ul>";
					} 
						
				}
			?>
		</div><!-- .entry-content -->
	</div><!-- .usa-grid -->

	<footer class="entry-footer bbg__article-footer">
		<?php bbginnovate_entry_footer(); ?>
	</footer><!-- .entry-footer -->
</article><!-- #post-## -->
