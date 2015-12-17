<?php
/**
 * The template for displaying Author bios.
 *
 * @package bbginnovate
 */
?>
<section class="usa-section">
	<div class="usa-grid">
		<div class="author-avatar">
			<?php echo get_avatar( get_the_author_meta( 'user_email' ), apply_filters( '', 100 ) ); ?>
		</div>
		
		<h1 class="archive-title"><?php printf( '%s', '<span class="vcard"><a class="url fn n" href="' . esc_url( get_author_posts_url( get_the_author_meta( 'ID' ) ) ) . '" title="' . esc_attr( get_the_author() ) . '" rel="me">' . get_the_author() . '</a></span>' ); ?></h1>

		<div class="author-description">
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
			<p class="author-bio">
				<?php if ( get_the_author_meta( 'description' ) ) : ?>
					<?php the_author_meta( 'description' ); ?>
				<?php endif; ?>
			</p>
			<div class='clearAll'></div>
		</div>
		<!-- .author-description -->
	</div>
</section> 