<?php
/**
 * The custom home page for the Broadcasting Board of Governors.
 * It includes the mission, a portfolio of recent projects and recent blog posts.
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
		<main id="content" class="site-content" role="main">
			<?php
				if ( get_header_image() != "") { 
					/* Check if there's an image set. Ideally we'd tweak the design accorgingly. */
				}
			?>
			<section class="usa-bbg-banner" style="background-image:url(<?php echo get_header_image(); ?>)">
				<div class="usa-grid">
					<a href="<?php echo site_url(); ?>">
						<img class="usa-bbg-banner-site-logo-img" src="<?php echo get_template_directory_uri() ?>/img/logo-agency-square.png" alt="Logo image">
					</a>
					<div class="usa-bbg-banner-box">
						<h1 class="usa-bbg-banner-site-title"><?php bloginfo( 'name' ); ?></h1>
						<?php $description = get_bloginfo( 'description', 'display' );
						if ( $description || is_customize_preview() ) : ?>
							<h3 class="usa-bbg-banner-site-description"><?php echo $description; ?></h3>
						<?php endif; ?>
					</div>
				</div>
			</section>


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
						echo '<section class="usa-section usa-bbg-intro-large">';
						echo '<h2>' . $siteIntroTitle . '</h2>';
						the_content();
						echo '</section>';
					endwhile;
				endif;
				wp_reset_query();
			?>
			</div>

			<section class="usa-bbg-portfolio usa-section">
				<div class="usa-grid">
					<h2>Portfolio</h2>
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
								get_template_part( 'template-parts/content-portfolio', get_post_format() );
							endwhile;
						endif;
						wp_reset_query();

					?>
					</div>
					<a href="<?php echo site_url(); ?>/blog/category/portfolio/">Explore entire portfolio</a>

				</div>
			</section>



			<section class="usa-section">
				<div class="usa-grid">
				<h2>Recent posts</h2>
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
							if ($counter <= $maxPostsToShow) {
								get_template_part( 'template-parts/content-excerpt', get_post_format() );
							}
						endwhile;
					endif;
				?>
				</div>
			</section>

			<section class="usa-bbg-management usa-section">
				<div class="usa-grid">
					<h2>Management</h2>
					<div class="usa-grid-full">
					<?php
						$args = array( 'include' => [8,2,6]);
						$blogusers = get_users($args);
						// Loop through the users to create the staff profiles
						foreach ( $blogusers as $user ) {
							$authorPath = site_url() .'/blog/author/' . esc_html( $user->user_nicename );
							$authorEmail = esc_html( $user->user_email );
							$authorName = esc_html( $user->display_name );
							$theauthorid = esc_html( $user->ID );
							$count = 0;
							$number_of_posts = 3;
						?>
						<div class="bbg-staff-profile">
							<a href="<?php echo $authorPath ?>">
								<img src="<?php echo get_avatar_url( $user->user_email ); ?>" alt="<?php echo $authorName; ?>" class="bbg-staff-avatar usa-avatar"/>
							</a>
							<h2 class="bbg-staff-author">
								<a href="<?php echo $authorPath ?>" class="bbg-staff-author-link"><?php echo $authorName; ?></a>
							</h2>
						</div>
					<?php 
							} 
					?>
					</div>
					<a href="<?php echo site_url(); ?>/staff">View All Staff</a>
				</div>
			</section>
		</main>
	</div><!-- #primary .content-area -->
	<div id="secondary" class="widget-area" role="complementary">
	</div><!-- #secondary .widget-area -->
</div><!-- #main .site-main -->

<?php //get_sidebar(); ?>
<?php get_footer(); ?>