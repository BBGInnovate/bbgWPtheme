<?php
/**
 * The template for displaying Author archive pages.
 *
 * Learn more: http://codex.wordpress.org/Template_Hierarchy
 *
 * @package bbginnovate
 */

get_header(); ?>

	<section id="primary" class="content-area">
		<div id="content" class="site-content" role="main">
			<div class="usa-grid-full">

			<?php if ( have_posts() ) : ?>


				<?php get_template_part( 'author-bio' ); ?>


				<?php /* Start the Loop */ 
					$counter=0;
				?>
				<div class="usa-grid">
				<?php while ( have_posts() ) : the_post(); ?>



					<?php 
						$counter=$counter+1;
						$gridClass = "";
						if ($counter <= 2) {
							$gridClass = "bbg-grid--1-2-2";
							get_template_part( 'template-parts/content-portfolio', get_post_format() );
						} else {
							$gridClass = " ";
							/*
							 * Include the Post-Format-specific template for the content.
							 */
							get_template_part( 'template-parts/content-excerpt', get_post_format() );
						}

					?>
				<?php endwhile; ?>
				</div>


			<?php else : ?>
				<?php get_template_part( 'author-bio' ); ?>
				<?php get_template_part( 'content', 'none' ); ?>
			<?php endif; ?>
			</div><!-- .usa-grid-full -->
		</div>
		<!-- #content -->
	</section><!-- #primary .content-area -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>