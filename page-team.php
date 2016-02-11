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

$numPortfolioPostsToShow=4;
$numBlogPostsToShow=10;




get_header(); ?>

	<div id="primary" class="content-area">
		<main id="main" class="site-main" role="main">
			<div class="usa-grid">

				<header class="page-header">
					<div class="bbg-avatar__container bbg-team__icon">
						<div class="bbg-avatar bbg-team__icon__image <?php echo $iconName ?>" style="background-image: url(<?php echo get_template_directory_uri() ?>/img/icon_team_<?php echo $teamCategory->category_nicename; ?>.png);"></div>
					</div>
					<div class="bbg-team__text">
						<h1 style='' class="page-title bbg-team__name"><?php echo $teamCategory->name; ?> Team</h1>
						<h3 class="usa-font-lead bbg-team__text-description"><?php echo $ogDescription; ?></h3>
					</div>
				</header><!-- .page-header -->



				<h6 class="bbg-label"><a href="<?php echo get_permalink( get_page_by_path( 'blog' ) ) ?>">Recent posts</a></h6>
				<br/>
				<?php 
					$qParams=array(
						'post_type' => array('post'),
						'posts_per_page' => $numBlogPostsToShow,
						'category__in' => [$teamCategoryID],
						'category__not_in' => [get_cat_id('Portfolio')]
					);
					query_posts($qParams);

					$counter=0;
					while ( have_posts() )  {
						the_post();
						$counter=$counter+1;
						$gridClass = "";
						if ($counter <= 2) {
							$gridClass = "bbg-grid--1-2-2";
						} else {
							$gridClass = " ";
						}
						get_template_part( 'template-parts/content-excerpt', get_post_format() );
					}
				?>



				<h6 class="bbg-label"><a href="<?php echo site_url(); ?>/portfolio">Portfolio</a></h6>
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
						$counter=$counter+1;
						/*
						if ($counter == 1) {
							get_template_part( 'template-parts/content-excerpt-featured', get_post_format() );
						} 
						else 
						*/
						//if ($counter <= 4) {
							$gridClass = "bbg-grid--1-2-3";
							get_template_part( 'template-parts/content-portfolio', get_post_format() );
						//}
					}
				?>



			
			</div><!-- .usa-grid -->
		</main><!-- #main -->
	</div><!-- #primary -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>


