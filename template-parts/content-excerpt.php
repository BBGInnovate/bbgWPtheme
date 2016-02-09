<?php
/**
 * Template part for displaying posts.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package bbginnovate
 */


global $gridClass;
if ( empty ($gridClass)) {
	$gridClass="";
}
$classNames="bbg-blog__excerpt ".$gridClass;
?>



<article id="post-<?php the_ID(); ?>" <?php post_class($classNames); ?> >
	<header class="entry-header bbg-blog__excerpt-header">

		<?php the_title( sprintf( '<h3 class="entry-title bbg-blog__excerpt-title"><a href="%s" rel="bookmark">', esc_url( get_permalink() ) ), '</a></h3>' ); ?>

		<?php if ( 'post' === get_post_type() ) : ?>
		<div class="entry-meta bbg__excerpt-meta">
			<?php bbginnovate_posted_on(); ?>
		</div><!-- .entry-meta -->
		<?php endif; ?>

	</header><!-- .bbg-blog__excerpt-header -->

	<div class="entry-content bbg-blog__excerpt-content">
		<?php
			the_excerpt();
			/*			
			the_content( sprintf(
				wp_kses( __( 'Continue reading %s <span class="meta-nav">&rarr;</span>', 'bbginnovate' ), array( 'span' => array( 'class' => array() ) ) ),
				the_title( '<span class="screen-reader-text">"', '"</span>', false )
			) );
			*/
		?>

		<?php
			wp_link_pages( array(
				'before' => '<div class="page-links">' . esc_html__( 'Pages:', 'bbginnovate' ),
				'after'  => '</div>',
			) );
		?>
	</div><!-- .bbg-blog__excerpt-content -->

</article><!-- #post-## -->
