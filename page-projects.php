<?php
/**
 * The template for displaying archive pages.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package bbginnovate
  template name: Project
 */
$maxPostsToShow=10;
$qParams=array(
	'post_type' => array('post'),
	'posts_per_page' => $maxPostsToShow,
	'cat' => get_cat_id('Project')
);
query_posts($qParams);


/*** SHARING VARS ****/
/*
$teamCategoryID=$_GET["cat"];
$teamCategory=get_category($teamCategoryID);
$portfolioDescription=$teamCategory->description;
*/
$portfolioDescription="some portfolio description could go here based on the category description?";



get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
			<div class="usa-grid">

			<?php if ( have_posts() ) : ?>

				<header class="page-header">
					<h6 class="bbg-label--mobile large">Projects</h6>
				</header><!-- .page-header -->
			</div>

			<div class="usa-grid-full">
				<?php
					$counter=0;
					while ( have_posts() )  {
						the_post();
						$counter=$counter+1;
						if ($counter == 1) {
							$includeMetaFeatured = FALSE;
							get_template_part( 'template-parts/content-excerpt-featured', get_post_format() );
							echo '<div class="usa-grid">';
						}
						else if ($counter <= $maxPostsToShow) {
							$gridClass = "bbg-grid--1-2-3";
							get_template_part( 'template-parts/content-portfolio', get_post_format() );
						}
					}
					echo '</div><!-- .usa-grid-full -->';
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

