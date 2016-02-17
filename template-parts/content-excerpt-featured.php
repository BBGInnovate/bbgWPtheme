<?php
/**
 * Template part for displaying a featured excerpt. 
 * Large full width photo and large excerpt text.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package bbginnovate
 */

//The byline meta info is displayed by default 
global $includeMeta;
if ( is_null ($includeMeta)) {
	$includeMeta=TRUE;
}
?>

<article id="post-<?php the_ID(); ?>" <?php post_class("bbg-blog__excerpt--featured"); ?>>
	<header class="entry-header bbg-blog__excerpt-header--featured">

		<?php 
			$link = sprintf( '<a href="%s" rel="bookmark">', esc_url( get_permalink() ) );
			$linkH2 = '<h2 class="entry-title bbg-blog__excerpt-title--featured">'.$link;
			echo $link;

			if (has_post_thumbnail()) {
				echo '<div class="single-post-thumbnail clear usa-single_post_thumbnail bbg__excerpt-header__thumbnail--large">';
				echo the_post_thumbnail('large-thumb');
				echo '</div>';
			}
		?>
		</a>

		<?php the_title( sprintf( $linkH2, esc_url( get_permalink() ) ), '</a></h2>' ); ?>


		<?php if ($includeMeta){ ?>
		<div class="entry-meta bbg__excerpt-meta bbg__excerpt-meta--featured">
			<?php bbginnovate_posted_on(); ?>
		</div><!-- .entry-meta -->
		<?php }?>


	</header><!-- .bbg-blog__excerpt-header--featured -->

	<div class="entry-content bbg-blog__excerpt-content--featured">
		<h3 class="usa-font-lead">
			<?php
				echo get_the_excerpt();
			?>
		</h3>
		<?php
			wp_link_pages( array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'bbginnovate' ),
				'after'  => '</div>',
			) );
		?>
	</div><!-- .entry-content -->

</article><!-- #post-## -->