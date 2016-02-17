<?php
/**
 * The template for displaying archive pages.
 *
 * @link https://codex.wordpress.org/Template_Hierarchy
 *
 * @package bbginnovate
  template name: Team
 */

/*** SHARING VARS ****/
$teamCategoryID=$_GET["cat"];
$teamCategory=get_category($teamCategoryID);
$iconName = "bbg-team__icon__".$teamCategory->category_nicename;

$ogTitle=$teamCategory->name . " team page";
$ogDescription=$teamCategory->description; 
/*** END SHARING VARS ****/

$numPortfolioPostsToShow=9;
$numBlogPostsToShow=2;

get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
			<div class="usa-grid-full">

				<header class="page-header bbg-page__header">
					<div class="bbg-avatar__container bbg-team__icon">
						<div class="bbg-avatar bbg-team__icon__image <?php echo $iconName ?>" style="background-image: url(<?php echo get_template_directory_uri() ?>/img/icon_team_<?php echo $teamCategory->category_nicename; ?>.png);"></div>
					</div>
					<div class="bbg-team__text">
						<h1 style='' class="page-title bbg-team__name"><?php echo $teamCategory->name; ?> Team</h1>
						<h3 class="usa-font-lead bbg-team__text-description"><?php echo $ogDescription; ?></h3>
					</div>
				</header><!-- .page-header -->



				<section class="usa-section usa-grid">
					<?php $categoryLink=get_category_link( $teamCategoryID ); ?>

					<h6 class="bbg-label small"><a href="<?php echo $categoryLink; ?>">Recent posts</a></h6>
					<div class="bbg-grid__container">
						<?php 
							$qParams=array(
								'post_type' => array('post'),
								'posts_per_page' => $numBlogPostsToShow,
								'category__in' => [$teamCategoryID],
								'category__not_in' => [get_cat_id('Portfolio')]
							);
							query_posts($qParams);

							while ( have_posts() )  {
								the_post();

								$gridClass = "bbg-grid--1-2-2";
								$includeImage = FALSE;
								get_template_part( 'template-parts/content-excerpt', get_post_format() );
							}
						?>
					</div><!-- .bbg-grid__container -->
					<a href="<?php echo $categoryLink; ?>" style="display: block; clear: left;">Read more <?php echo $teamCategory->name; ?> posts</a>
				</section>



				<section class="usa-section usa-grid">
					<h6 class="bbg-label small"><a href="<?php echo site_url(); ?>/portfolio"><?php echo $teamCategory->name; ?> projects</a></h6>
					<div class="bbg-grid__container">
					<?php 
						$qParams=array(
							'post_type' => array('post'),
							'posts_per_page' => $numPortfolioPostsToShow,
							'category__and' => [$teamCategoryID, get_cat_id('Portfolio')]
						);
						query_posts($qParams);

						$counter=0;
						while ( have_posts() )  {
							the_post();

							$gridClass = "bbg-grid--1-2-3";
							get_template_part( 'template-parts/content-portfolio', get_post_format() );
						}
					?>
					</div><!--.bbg-grid__containter -->
					<a href="<?php echo get_permalink( get_page_by_path( 'portfolio' ) ) ?>" style="display:block; clear: left;">Explore entire portfolio</a>
				</section>

			</div><!-- .usa-grid -->
		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>


