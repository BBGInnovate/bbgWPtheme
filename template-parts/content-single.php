<?php
/**
 * Template part for displaying single posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package bbginnovate
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class( "bbg__article" ); ?>>

<?php

//the title/headline field, followed by the URL and the author's twitter handle
$twitterText = "";
$twitterText .= html_entity_decode( get_the_title() );
$twitterHandle = get_the_author_meta( 'twitterHandle' );
$twitterHandle = str_replace( "@", "", $twitterHandle );
if ( $twitterHandle && $twitterHandle != '' ) {
	$twitterText .= " by @" . $twitterHandle;
} else {
	$authorDisplayName = get_the_author();
	if ( $authorDisplayName && $authorDisplayName!='' ) {
		$twitterText .= " by " . $authorDisplayName;
	}
}
$twitterText .= " " . get_permalink();
$hashtags="";
//$hashtags="testhashtag1,testhashtag2";

///$twitterURL="//twitter.com/intent/tweet?url=" . urlencode(get_permalink()) . "&text=" . urlencode($ogDescription) . "&hashtags=" . urlencode($hashtags);
$twitterURL="//twitter.com/intent/tweet?text=" . rawurlencode( $twitterText );
$fbUrl="//www.facebook.com/sharer/sharer.php?u=" . urlencode( get_permalink() );

?>
	<div class="usa-grid-full">

		<?php
			$hideFeaturedImage = get_post_meta( get_the_ID(), "hide_featured_image", true );
			if ( has_post_thumbnail() && ( $hideFeaturedImage != 1 ) ) {
				$featuredImageCutline="";
				$thumbnail_image = get_posts(array('p' => get_post_thumbnail_id(get_the_ID()), 'post_type' => 'attachment'));
				if ($thumbnail_image && isset($thumbnail_image[0])) {
					$featuredImageCutline=$thumbnail_image[0]->post_excerpt;
				}
				echo '<div class="single-post-thumbnail clear bbg__article-header__thumbnail--large">';
				//echo '<div style="position: absolute;"><h5 class="bbg-label">Label</h5></div>';
				echo the_post_thumbnail( 'large-thumb' );
				if ($featuredImageCutline != "") {
					echo "<div class='bbg__article-header__caption'>$featuredImageCutline</div>";
				}
				echo '</div>';

				
			}
		?><!-- .bbg__article-header__thumbnail -->
	</div>

	<div class="usa-grid">
		<header class="entry-header bbg__article-header">

		<?php echo bbginnovate_post_categories( '', true, true ); ?>
		<!-- .bbg-label -->

			<?php the_title( '<h1 class="entry-title bbg__article-header__title">', '</h1>' ); ?>
			<!-- .bbg__article-header__title -->

			<div class="entry-meta bbg__article-meta">
				<?php bbginnovate_posted_on(); ?>
			</div><!-- .bbg__article-meta -->
		</header><!-- .bbg__article-header -->
		<div class="container" style="position: relative;">
		<ul class="bbg__article-share">
			<li class="bbg__article-share__link facebook">
				<a href="<?php echo $fbUrl; ?>">
					<span class="bbg__article-share__icon facebook"></span>
					<span class="bbg__article-share__text">Share</span>
				</a>
			</li>
			<li class="bbg__article-share__link twitter">
				<a href="<?php echo $twitterURL; ?>">
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
		</div><!-- .entry-content -->

		<div class="bbg__article-sidebar">
			<?php
				$usersInProjectStr = get_post_meta( get_the_ID(), 'users_in_project', true );

				if(!in_category('project')) {
					bbg_post_author_bottom_card(get_the_author_meta('ID'));
				} elseif ( $usersInProjectStr != "" ) {
					$userIDs = explode( ',', $usersInProjectStr );
					array_walk( $userIDs, 'intval' );
					$args = array( 'include' => $userIDs, 'orderby' => 'include' );

					$blogusers = get_users( $args );
					// Loop through the users to create the staff profiles
					if ( $blogusers ) {
						echo "<div class='bbg__portfolio-members'><h3 class='bbg__portfolio-members__title'>ODDI Team</h3> <ul class='bbg__portfolio-members__list'>";
						foreach ( $blogusers as $user ) {
							$authorName = esc_html( $user -> display_name );
							$authorUrl = get_author_posts_url( $user -> ID, $user -> user_nicename );
							$authorOccupation = esc_html( $user -> occupation );
							echo "<li class='bbg__portfolio-members__member-name'><a href='$authorUrl'>$authorName</a>, <span class='bbg__portfolio-members__member-job'>$authorOccupation</span></li>";
						}
						echo "</ul></div>";
					}

				}
			?>
		</div> <!-- .bbg__article-sidebar -->
		
		</div><!-- container -->
	</div><!-- .usa-grid -->

	<!-- <footer class="entry-footer bbg__article-footer">
		<?php bbginnovate_entry_footer(); ?>
	</footer> --><!-- .entry-footer -->
</article><!-- #post-## -->
