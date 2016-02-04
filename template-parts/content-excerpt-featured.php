<?php
/**
 * Template part for displaying a featured excerpt. 
 * Large full width photo and large excerpt text.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package bbginnovate
 */

?>

<article id="post-<?php the_ID(); ?>" <?php post_class("bbg-blog__excerpt--featured"); ?>>
	<header class="entry-header bbg-blog__excerpt-header--featured">

		<?php 
			echo sprintf( '<a href="%s" rel="bookmark">', esc_url( get_permalink() ) );
		?>

			<?php the_title( sprintf( '<h1 class="entry-title bbg-blog__excerpt-title--featured">', esc_url( get_permalink() ) ), '</h1>' ); ?>


			<?php
				if (has_post_thumbnail()) {
					echo '<div class="single-post-thumbnail clear usa-single_post_thumbnail bbg__excerpt-header__thumbnail--large">';
					echo the_post_thumbnail('large-thumb');
					echo '</div>';
				}
			?>

		</a>

	</header><!-- .bbg-blog__excerpt-header--featured -->

	<div class="entry-content bbg-blog__excerpt-content--featured">
		<h3 class="usa-font-lead">
			<?php
				echo get_the_excerpt();
			?>
			<span class="bbg-continue">
			<?php echo sprintf( '<a href="%s" rel="bookmark">', esc_url( get_permalink() ) ); ?>
				Continue reading </a>
			</span>
		</h3>
		<?php
			wp_link_pages( array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'bbginnovate' ),
				'after'  => '</div>',
			) );
		?>
	</div><!-- .entry-content -->

</article><!-- #post-## -->
<br/>
