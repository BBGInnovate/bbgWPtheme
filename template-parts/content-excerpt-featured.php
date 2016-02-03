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

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
	<header class="entry-header">

		<?php 
			echo sprintf( '<a href="%s" rel="bookmark">', esc_url( get_permalink() ) );
		?>

			<?php the_title( sprintf( '<h1 class="entry-title bbg-featured-title">', esc_url( get_permalink() ) ), '</h1>' ); ?>


			<?php
				if (has_post_thumbnail()) {
					echo '<div class="single-post-thumbnail clear usa-single_post_thumbnail">';
					echo the_post_thumbnail('large-thumb');
					echo '</div>';
				}
			?>

		</a>

	</header><!-- .entry-header -->

	<div class="entry-content">
	<h3 class="usa-font-lead">
		<?php
			echo get_the_excerpt();
			/*			
			the_content( sprintf(
				wp_kses( __( 'Continue reading %s <span class="meta-nav">&rarr;</span>', 'bbginnovate' ), array( 'span' => array( 'class' => array() ) ) ),
				the_title( '<span class="screen-reader-text">"', '"</span>', false )
			) );
			*/
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
