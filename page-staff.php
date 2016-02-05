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
			<div class="usa-grid">
				<h1>STAFF</h1>
				<?php
					$blogusers = get_users();
					// Loop through the users to create the staff profiles
					foreach ( $blogusers as $user ) {
						outputUser($user,"staff");
					}
				?>
			</div><!-- .usa-grid -->
		</main>
	</div><!-- #primary .content-area -->

	<div id="secondary" class="widget-area" role="complementary"></div><!-- #secondary .widget-area -->

</div><!-- #main .site-main -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>
