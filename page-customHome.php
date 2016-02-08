<?php
/**
 * The custom home page for the Broadcasting Board of Governors.
 * It includes the mission, a portfolio of recent projects, recent blog posts and staff.
 *
 * @package Independent Publisher
 * @since   Independent Publisher 1.0
  template name: Custom Home
 */

$templateName = "customHome";
include_once("helperFunctions.php");


/*
require(dirname(__FILE__).'/../../fuego/init.php');
use OpenFuego\app\Getter as Getter;
$fuego = new Getter();
siteintroduction
*/

get_header();

?>
<div id="main" class="site-main">

	<div id="primary" class="content-area">
		<main id="content" class="site-content bbg-home-main" role="main">
			<?php
				if ( get_header_image() != "") { 
					/* Check if there's an image set. Ideally we'd tweak the design accorgingly. */
				}
			?>
			<section class="bbg-banner" style="background-image:url(<?php echo get_header_image(); ?>)">
				<div class="usa-grid">
					<a href="<?php echo site_url(); ?>">
						<img class="bbg-banner__site-logo" src="<?php echo get_template_directory_uri() ?>/img/logo-agency-square.png" alt="BBG logo">
					</a>
					<div class="bbg-banner-box">
						<h1 class="bbg-banner-site-title"><?php echo bbginnovate_site_name_html(); ?></h1>
						<?php $description = get_bloginfo( 'description', 'display' );
						if ( $description || is_customize_preview() ) : ?>
							<h3 class="bbg-banner-site-description usa-heading-site-description"><?php echo $description; ?></h3>
						<?php endif; ?>
					</div>
				</div>
			</section>


			<!-- Site introduction -->
			<div class="usa-grid">
			<?php
				$qParams=array(
					'post_type' => array('post'),
					'posts_per_page' => 1,
					'cat' => get_cat_id('Site Introduction')
				);
				query_posts($qParams);

				$siteIntroContent="";
				if ( have_posts() ) :
					while ( have_posts() ) : the_post();
						$siteIntroTitle=get_the_title();
						echo '<section class="usa-section"><h3 class="usa-font-lead">';
						/* echo '<h2>' . $siteIntroTitle . '</h2>'; */
						echo get_the_content();
						echo '</h3></section>';
					endwhile;
				endif;
				wp_reset_query();
			?>
			</div><!-- Site introduction -->


			<!-- Portfolio -->
			<section class="usa-section bbg-portfolio">
				<div class="usa-grid">
					<h6 class="bbg-label"><a href="<?php echo get_category_link(get_cat_id('Portfolio')); ?>"><span class="usa-label-big">Portfolio</span></a></h6>

					<div class="usa-grid-full">
					<?php
						$qParams=array(
							'post_type' => array('post'),
							'posts_per_page' => 3,
							'orderby' => 'post_date',
							'order' => 'desc',
							'cat' => get_cat_id('Portfolio')
						);
						query_posts($qParams);

						if ( have_posts() ) :
							while ( have_posts() ) : the_post();
								$gridClass = "bbg-grid--1-3-3";
								get_template_part( 'template-parts/content-portfolio', get_post_format() );
							endwhile;
						endif;
						wp_reset_query();

					?>
					</div><!-- .usa-grid-full -->

					<a href="<?php echo get_category_link(get_cat_id('Portfolio')); ?>">Explore entire portfolio</a>

				</div><!-- .usa-grid -->
			</section><!-- .bbg-portfolio -->


			<!-- Recent posts -->
			<section class="usa-section">
				<div class="usa-grid">
					<h6 class="bbg-label"><a href="<?php echo get_permalink( get_page_by_path( 'blog' ) ) ?>"><span class="usa-label-big">Recent posts</span></a></h6>
				<?php
					/* NOTE: if there is a sticky post, we may wind up with an extra item.
					So we hardcode the display code to ignore anything after the 3rd item */
					$maxPostsToShow=3;
					$qParams=array(
						'post_type' => array('post'),
						'posts_per_page' => $maxPostsToShow,
						'orderby' => 'post_date',
						'order' => 'desc',
						'category__not_in' => (array(get_cat_id('Portfolio'),get_cat_id('Site Introduction')))
					);
					query_posts($qParams);

					if ( have_posts() ) :
						$counter=0;
						while ( have_posts() ) : the_post();
							$counter++;
							if ($counter == 1) {
								get_template_part( 'template-parts/content-excerpt-featured', get_post_format() );
							} 
							else if ($counter <= $maxPostsToShow) {
								$gridClass = "bbg-grid--1-2-2";
								get_template_part( 'template-parts/content-excerpt', get_post_format() );
							}
						endwhile;
					endif;
				?>

				</div>
			</section><!-- Recent posts -->


			<!-- Staff -->
			<section class="usa-section bbg-staff">
				<div class="usa-grid">
					<h6 class="bbg-label"><a href="<?php echo get_permalink( get_page_by_path( 'staff' ) ) ?>"><span class="usa-label-big">Our teams</span></a></h6>
					<div class="usa-grid-full">
						<div class="usa-intro">
							<h3 class="usa-font-lead">ODDI's teams of designers, developers and storytellers help drive USIM digital projects.</h3>
						</div>






						<?php
							
							/****** THE OLD WAY 
							//$args = array( 'include' => [11,10,19,13,24,9,3,1]); prod
							//$args = array( 'include' => [1,2,3,4,5]);
							//$args = array( 'include' => [2,8,12,10,9,11]);


							$featuredUserIDsStr=get_option( 'featuredUserIDs' );
							$featuredUserIDs = explode( ',', $featuredUserIDsStr );
							array_walk( $featuredUserIDs, 'intval' );
							$args = array( 'include' => $featuredUserIDs, 'orderby' => 'include');

							$blogusers = get_users($args);
							foreach ( $blogusers as $user ) {
								outputUser($user,"home");
							} 
							*****/

							/* 
							   we need a way to know which categories are owned by which user - create a quick data structure.
							   there is likely a more efficient way to do that but with <100 users, no harm 
							*/

							$categoryHeads=array();
							$blogusers = get_users();
							foreach ( $blogusers as $user ) {
								if ($user->headOfTeam != "") {
									$categoryHeads[$user->headOfTeam]=$user;
								} 
							}

							/** in general settings we've entered featured categoryIDs as a comma separated list which should be ones that are specified
							as teams and have users that are specified as their heads */
							$featuredCategoryIDsStr=get_option( 'featuredCategoryIDs' );
							$featuredCategoryIDs = explode( ',', $featuredCategoryIDsStr );
							array_walk( $featuredCategoryIDs, 'intval' );
							$args = array( 'include' => $featuredCategoryIDs, 'orderby' => 'include', 'hide_empty' => false);

							$categories = get_categories($args ); 
							foreach ( $categories as $category ) { 
								$iconName = "bbg-team__icon__".$category->category_nicename;
							?>
							<div class="bbg-team bbg-grid--1-1-1-2">

								<div class="bbg-avatar__container bbg-team__icon">
									<a href="#">
									<div class="bbg-avatar <?php echo $iconName ?>" style="display: block; width: 100%; height: 100%;"></div>
									</a>
								</div>

								<div class="bbg-team__text">

									<?php
										$user=$categoryHeads[$category->term_id];
										$authorPath = get_author_posts_url($user->ID);
										echo "<h2 style='clear: none;' class='bbg-team__name'><a href='" . get_category_link( $category->term_id ) . "'>".$category->name."</a></h2>";
										echo $category->description . " <span style='font-weight: bold;'>Project lead: </span><a href='" . $authorPath . "' class='bbg-staff__author-link'>$user->display_name</a></p>";
									?>
							</div><!-- .bbg-team__text -->
						</div>

							<?php } ?>


					</div>
					<a href="<?php echo site_url(); ?>/staff">Meet the full ODDI team</a>
				</div>
			</section><!-- Staff -->


		</main>
	</div><!-- #primary .content-area -->
	<div id="secondary" class="widget-area" role="complementary">
	</div><!-- #secondary .widget-area -->
</div><!-- #main .site-main -->

<?php //get_sidebar(); ?>
<?php get_footer(); ?>