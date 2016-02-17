<?php
/**
 * The template for displaying Author bios.
 *
 * @package bbginnovate
 */
?>
<?php

/* ODDI CUSTOM: add twitter handle to bio */
$twitterHandle = get_the_author_meta( 'twitterHandle' );
$occupation = get_the_author_meta( 'occupation' );
$authorEmail = 	get_the_author_meta( 'user_email' );
$website = get_the_author_meta( 'user_url' );
$website = "";

$authorID=get_the_author_meta( 'ID');

$qParams=array(
	'post_type' => array('post'),
	'orderby' => 'post_date',
	'order' => 'desc',
	'cat' => get_cat_id('Portfolio')
);
query_posts($qParams);
$projects= array();
if ( have_posts() ) :
	while ( have_posts() ) : the_post();
		$usersInProjectStr="," . get_post_meta( get_the_ID(), 'users_in_project', true ) . ",";
		//echo "project " . get_the_ID() . " has users " . $usersInProjectStr;
		if (strpos($usersInProjectStr,",$authorID,")) {
			$oneProjectPost=get_post(get_the_id());
			array_push($projects,$oneProjectPost);
		}
	endwhile;
endif;
wp_reset_query();


?>

<div class="usa-section">
	<div class="usa-grid-full">


		<header class="page-header bbg-page__header">
			<div class="bbg-avatar__container bbg-team__icon">
				<?php echo get_avatar( get_the_author_meta( 'user_email' ) , apply_filters( 'change_avatar_css', 100) ); ?>
			</div>

			<div class="bbg-staff__author__text">
				<h1 class="bbg-staff__author-name"><?php printf( '%s', get_the_author() ); ?></h1>

				<div class="bbg-staff__author-description">

						<?php 
							echo '<div class="bbg-staff__author-occupation">' . $occupation . '</div>';

							if ( $website && $website != '' ) {
								$website='<span class="sep"> | </span><a href="' . $website . '">' . $website . '</a>';
							}

							if ( $twitterHandle && $twitterHandle != '' ) {
								$twitterHandle=str_replace("@", "", $twitterHandle);
								$twitterHandle='</span><a href="//www.twitter.com/' . $twitterHandle. '">@' . $twitterHandle . '</a> ';
							}
						?>

							<?php 
								if (count($projects)) {
									$maxProjectsToShow=5;
									echo '<h6 class="bbg-label">Projects:</h2>';
									echo '<ul>';
									for ($i=0; $i<min($maxProjectsToShow,count($projects)); $i++) {
										$p=$projects[$i];
										echo '<li><a href="' . get_permalink($p) . '">' . $p->post_title . '</a></li>';
									}
									echo '</ul>';
								}
							?>


							<div class="bbg-staff__author-contact">
								<a href="mailto:<?php echo $authorEmail ?>"><?php echo $authorEmail; ?></a>
								<?php echo $website; ?>
							</div>

						<div class="bbg-staff__author-bio">
							<?php if ( get_the_author_meta( 'description' ) ) : ?>
								<?php the_author_meta( 'description' ); ?>
							<?php endif; ?>
						</div>
					<div class='clearAll'></div>
				</div><!-- .author-description -->
			</div><!-- .bbg-author-text -->
		</header><!-- .bbg-page__header -->


	</div><!-- .usa-grid -->
</div> 