<?php
/**
 * The Template for displaying the staff.
 *
 * @package Independent Publisher
 * @since   Independent Publisher 1.0
 * template name: Staff
 */


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
		$authorPath = site_url() .'/blog/author/' . esc_html( $user->user_nicename );
		$authorEmail = esc_html( $user->user_email );
		$authorName = esc_html( $user->display_name );
		$theauthorid = esc_html( $user->ID );
		$count = 0;
		$number_of_posts = 3;
	?>
					<article id="" <?php post_class("bbg-staff__author bbg-grid--1-2-2"); ?>>

						<a href="<?php echo $authorPath ?>">
							<?php echo get_avatar( $user->user_email , apply_filters( 'change_avatar_css', 150) ); ?>
						</a>
						<div class="bbg-staff__author__text">

							<h2 class="bbg-staff__author-name">
								<a href="<?php echo $authorPath ?>" class="bbg-staff-author-link"><?php echo $authorName; ?></a>
							</h2>

							<?php if ( $user->occupation!="" ) { ?>
							<h5 class="bbg-staff__author-occupation"><?php echo esc_html( $user->occupation ); ?></h5>
							<?php } ?>

							<div class="bbg-staff__author__contact">
									<span class="bbg-staff__author__contact-link email"><a href="mailto:<?php echo $authorEmail; ?>">Email</a></span>

								<?php if ( $user->twitterHandle!="" ) { ?>
									<span class="bbg-staff__author__contact-link twitter"><a href="<?php echo  esc_html( $user->twitterHandle ); ?>"><?php echo '@' . esc_html( $user->twitterHandle ); ?></a></span>
								<?php } ?>

								<?php if ( $user->user_url!="" ) { ?>
									<span class="bbg-staff__author__contact-link website"><a href="<?php echo  esc_html( $user->user_url ); ?>">Website</a></span>
								<?php } ?>
							</div>

							<?php if ( $user->user_description!="" ) { ?>
							<p><?php echo esc_html( $user->user_description ); ?></p>
							<?php } ?>


							<h3>Blog posts</h3>
							<?php query_posts( 'author=' . $theauthorid ); ?>
							<?php if ( have_posts() ) : while ( have_posts() && $count < $number_of_posts ) : the_post() ?>
								<p><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></p>
								<?php $count++; ?>
							<?php endwhile; endif; ?>
						</div>
					</article>
				<?php } ?>
			</div><!-- .usa-grid -->
		</main>
	</div><!-- #primary .content-area -->

	<div id="secondary" class="widget-area" role="complementary"></div><!-- #secondary .widget-area -->

</div><!-- #main .site-main -->

<?php get_sidebar(); ?>
<?php get_footer(); ?>
