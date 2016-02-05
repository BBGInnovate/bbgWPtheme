<?php 
	function outputUser($user, $mode) {
		$authorPath = site_url() .'/blog/author/' . esc_html( $user->user_nicename );
		$authorName = esc_html( $user->display_name );
		$authorOccupation = esc_html( $user->occupation );
		$authorEmail = esc_html( $user->user_email );
		$twitterHandle = esc_html( $user->twitterHandle );
		$authorDescription = esc_html( $user->description );
		$theauthorid = esc_html( $user->ID );
		$website = esc_html( $user->user_url );

		$count = 0;
		$number_of_posts = 3;

	?>
	<div <?php post_class("bbg-grid--1-2-2  bbg-staff__author "); ?>>
		<a href="<?php echo $authorPath ?>">
			<?php echo get_avatar( $user->user_email , apply_filters( 'change_avatar_css', 150) ); ?>
		</a>

		<div class="bbg-staff__author__text">
			
			<h2 class="bbg-staff__author-name">
				<a href="<?php echo $authorPath ?>" class="bbg-staff__author-link"><?php echo $authorName; ?></a>
			</h2>
			
			<?php if ( $authorOccupation!="" ) { ?>
				<div class="bbg-staff__author-occupation"><?php echo $authorOccupation; ?></div>
			<?php } ?>

			<?php 

			if ($mode=="home") { 
?>
				<div class="bbg-staff__author-description">
					<?php 

						if ( $website && $website != '' ) {
							$website='<span class="sep"> | </span><a href="' . $website . '">' . $website . '</a>';
						}

						if ( $twitterHandle && $twitterHandle != '' ) {
							$twitterHandle=str_replace("@", "", $twitterHandle);
							echo '<div class="bbg-author-contact"><a href="mailto:'.$authorEmail.'" class="bbg-staff__author__contact-link email">'.$authorEmail .'</a><span class="sep"> | </span><a href="//www.twitter.com/' . $twitterHandle. '" class="bbg-staff__author__contact-link twitter">@' . $twitterHandle . '</a> ' . $website .'</div>';
						}
					?>
					<div class="bbg-staff__author-bio">
						<?php echo $authorDescription; ?>
					</div>
					<div class='clearAll'></div>
				</div>
<?php 
			} elseif ($mode=="staff") { 
?>
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
<?php			
			} 
?>
			<!-- .author-description -->
		</div><!-- .bbg-author-text -->
	</div>
<?php
	}


	