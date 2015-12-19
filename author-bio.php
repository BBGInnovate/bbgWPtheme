<?php
/**
 * The template for displaying Author bios.
 *
 * @package bbginnovate
 */
?>
<section class="usa-section">
	<div class="usa-grid usa-bbg-author">
		<div class="usa-bbg-avatar">
			<?php echo get_avatar( get_the_author_meta( 'user_email' ) , apply_filters( 'change_avatar_css', 100) ); ?>
		</div>
		<div class="usa-bbg-author-text">
			<h1 class="usa-bbg-author-name"><?php printf( '%s', get_the_author() ); ?></h1>

			<div class="usa-bbg-author-description">
					<?php 
						/* ODDI CUSTOM: add twitter handle to bio */
						$twitterHandle = get_the_author_meta( 'twitterHandle' );
						$website = get_the_author_meta( 'user_url' );

						if ( $website && $website != '' ) {
							$website='<span class="sep"> | </span><a href="' . $website . '">' . $website . '</a>';
						}

						if ( $twitterHandle && $twitterHandle != '' ) {
							$twitterHandle=str_replace("@", "", $twitterHandle);
							echo '<div id="authorContact"><a href="//www.twitter.com/' . $twitterHandle. '">@' . $twitterHandle . '</a> ' . $website .'</div>';
						}
					?>
				<p class="usa-bbg-author-bio">
					<?php if ( get_the_author_meta( 'description' ) ) : ?>
						<?php the_author_meta( 'description' ); ?>
					<?php endif; ?>
				</p>
				<div class='clearAll'></div>
			</div>
			<!-- .author-description -->
		</div><!-- .usa-bbg-author -->
	</div>
</section> 