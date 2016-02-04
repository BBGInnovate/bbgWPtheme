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
					<h6 class="bbg-label"><a href="<?php echo site_url(); ?>/category/Portfolio/"><span class="usa-label-big">Portfolio</span></a></h6>

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

					<a href="<?php echo site_url(); ?>/blog/category/portfolio/">Explore entire portfolio</a>

				</div><!-- .usa-grid -->
			</section><!-- .bbg-portfolio -->


			<!-- Recent posts -->
			<section class="usa-section">
				<div class="usa-grid">
					<h6 class="bbg-label"><a href="<?php echo site_url(); ?>/blog/"><span class="usa-label-big">Recent posts</span></a></h6>
				<?php
					/* NOTE: if there is a sticky post, we may wind up with an extra item.
					So we hardcode the display code to ignore anything after the 3rd item */
					$maxPostsToShow=7;
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
			<section class="bbg-staff usa-section usa-section-dark">
				<div class="usa-grid">
					<h6 class="bbg-label"><a href="<?php echo site_url(); ?>/staff"><span class="usa-label-big">Our team</span></a></h6>
					<div class="usa-grid-full">
					<div class="usa-intro">
						<h3 class="usa-font-lead">ODDI's team of designers, developers and storytellers help drive USIM digital projects.</h3>
					</div>
					<?php
						$args = array( 'include' => [11,10,19,13,24,9,3,1]);
						//$args = array( 'include' => [1,2,3,4,5]);
						$blogusers = get_users($args);
						// Loop through the users to create the staff profiles
						foreach ( $blogusers as $user ) {
							$authorPath = site_url() .'/blog/author/' . esc_html( $user->user_nicename );
							$authorName = esc_html( $user->display_name );
							$authorOccupation = esc_html( $user->occupation );
							$authorEmail = esc_html( $user->user_email );
							$authorTwitter = esc_html( $user->twitterHandle );
							$authorDescription = esc_html( $user->description );
							$theauthorid = esc_html( $user->ID );
							/*
							$count = 0;
							$number_of_posts = 3;
							*/
						?>
					<article id="" <?php post_class("bbg-grid--1-2-2  bbg-staff-profile "); ?>>
						<div class="bbg-staff-profile">
							<div class="bbg-avatar">
								<a href="<?php echo $authorPath ?>">
								<?php echo get_avatar( $user->user_email , apply_filters( 'change_avatar_css', 150) ); ?>
								</a>
							</div>
							<div class="bbg-author-text">
								<h1 class="bbg-author-name">
									<a href="<?php echo $authorPath ?>" class="bbg-staff-author-link"><?php echo $authorName; ?></a>
								</h1>

								<div class="bbg-author-description">
										<?php 
											/* ODDI CUSTOM: add twitter handle to bio */
											echo '<div class="bbg-author-occupation">' . $authorOccupation . '</div>';
											/*echo '<div class="bbg-author-contact"><a href="//www.twitter.com/' . $authorTwitter. '">@' . $authorTwitter . '</a> </div>';*/
										?>
									<div class="bbg-author-bio">
										<?php echo $authorDescription; ?>
									</div>
									<div class='clearAll'></div>
								</div>
								<!-- .author-description -->
							</div><!-- .bbg-author-text -->

						</div>
						</article>
					<?php 
							} 
					?>
					</div>
					<a href="<?php echo site_url(); ?>/staff">View All Staff</a>
				</div>
			</section><!-- Staff -->


		</main>
	</div><!-- #primary .content-area -->
	<div id="secondary" class="widget-area" role="complementary">
	</div><!-- #secondary .widget-area -->
</div><!-- #main .site-main -->

<?php //get_sidebar(); ?>
<?php get_footer(); ?>