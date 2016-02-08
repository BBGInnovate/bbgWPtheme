<?php
/**
 * The template for displaying archive pages.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package bbginnovate
  template name: Portfolio
 */
$maxPostsToShow=10;
$qParams=array(
	'post_type' => array('post'),
	'posts_per_page' => $maxPostsToShow,
	'cat' => get_cat_id('Portfolio')
);
query_posts($qParams);


get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
			<div class="usa-grid">

			<?php if ( have_posts() ) : ?>

				<header class="page-header">
					<h1 class="page-title">Special Portfolio Landing Page</h1>
				</header><!-- .page-header -->

				<?php 
					$counter=0;
					while ( have_posts() )  {
						the_post();
						$counter=$counter+1;
						if ($counter == 1) {
							get_template_part( 'template-parts/content-excerpt-featured', get_post_format() );
						} 
						else if ($counter <= $maxPostsToShow) {
							$gridClass = "bbg-grid--1-2-2";
							get_template_part( 'template-parts/content-portfolio', get_post_format() );
						}
					}
					the_posts_navigation(); 
				?>

			<?php else : ?>

				<?php get_template_part( 'template-parts/content', 'none' ); ?>

			<?php endif; ?>
			</div><!-- .usa-grid -->
		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>


