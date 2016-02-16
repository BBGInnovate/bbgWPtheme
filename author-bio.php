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
$website = get_the_author_meta( 'user_url' );
$occupation = get_the_author_meta( 'occupation' );
$authorEmail = 	get_the_author_meta( 'user_email' );

?>

<div class="usa-section">
	<div class="usa-grid">


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