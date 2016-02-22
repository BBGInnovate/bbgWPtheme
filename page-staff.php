<?php
/**
 * The Template for displaying the staff.
 *
 * @package Independent Publisher
 * @since   Independent Publisher 1.0
 * template name: Staff
 */

include_once("helperFunctions.php");
get_header();

?>
<div id="main" class="site-main">
	<div id="primary" class="content-area">
		<main id="content" class="site-content" role="main">
			<section class="usa-section usa-grid-full bbg-staff__roster">
				<header class="bbg-page__header usa-grid">
					<h1 class="bbg-page__header-title">STAFF</h1>
					<h3 class="bbg-page__header-description">ODDI's designers, developers and storytellers help drive USIM digital projects.</h3>
				</header>
				<div class="usa-grid">
					<?php
						$blogusers = get_users();
						$ids=array();
						foreach($blogusers as $user) {
							array_push($ids,$user->ID);
						}
						$postCounts=count_many_users_posts($ids);
						// Loop through the users to create the staff profiles
						foreach ( $blogusers as $user ) {
							outputUser($user,"staff",$postCounts);
						}
					?>
				</div><!-- .usa-grid -->
			</section>
		</main>
	</div><!-- #primary .content-area -->

	<div id="secondary" class="widget-area" role="complementary"></div><!-- #secondary .widget-area -->

</div><!-- #main .site-main -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>
