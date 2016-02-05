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


		if ( $user->isActive=="on" ) {

	?>
	<div <?php post_class("bbg-grid--1-2-2 bbg-staff__author "); ?>>

<?php 

			if ($mode=="home") { 
?>



				<?php 
					if ($user->headOfTeam != "") {
						$category = get_category($user->headOfTeam);
						$categoryUrl = "blog/category/".$category->category_nicename;
						echo "<h2><a href='$categoryUrl'>$category->name</a></h2> <p>$category->description</p>";
					}
				?>




		<div class="bbg-staff__author__text">
			
			<p class="bbg-staff__author-name"><strong>Project lead: </strong> 
				<a href="<?php echo $authorPath ?>" class="bbg-staff__author-link"><?php echo $authorName; ?></a>, <a href="mailto:'.$authorEmail.'" class="bbg-staff__author__contact-link email"><?php echo $authorEmail; ?></a>
			</p>





<?php 
			//if you wanted a different view for staff
			} elseif ($mode=="staff") { 
?>


<div class="bbg-avatar__container">
			<a href="<?php echo $authorPath ?>">
				<?php echo get_avatar( $user->user_email , apply_filters( 'change_avatar_css', 150) ); ?>
			</a>
		</div>

		<div class="bbg-staff__author__text">
			
			<h3 class="bbg-staff__author-name">
				<a href="<?php echo $authorPath ?>" class="bbg-staff__author-link"><?php echo $authorName; ?></a>
			</h3>
			
			<?php if ( $authorOccupation!="" ) { ?>
				<div class="bbg-staff__author-occupation"><?php echo $authorOccupation; ?></div>
			<?php } ?>


				<div class="bbg-staff__author-description">
					<?php 

						if ( $website && $website != '' ) {
							$website='<span class="sep"> | </span><a href="' . $website . '">' . $website . '</a>';
						}

						if ( $twitterHandle && $twitterHandle != '' ) {
							$twitterHandle=str_replace("@", "", $twitterHandle);
							echo '<div class="bbg-staff__author__contact"><a href="mailto:'.$authorEmail.'" class="bbg-staff__author__contact-link email">'.$authorEmail .'</a><span class="sep"> | </span><a href="//www.twitter.com/' . $twitterHandle. '" class="bbg-staff__author__contact-link twitter">@' . $twitterHandle . '</a> ' . $website .'</div>';
						}
					?>
					<div class="bbg-staff__author-bio">
						<?php echo $authorDescription; ?>
					</div>
					<div class='clearAll'></div>
				</div>


				<?php query_posts( 'author=' . $theauthorid ); ?>
					<?php if ( have_posts() ) { ?>
						<!--<h3>Blog posts</h3>-->
						<?php if ( have_posts() ) : while ( have_posts() && $count < $number_of_posts ) : the_post() ?>
							<!--<p><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a></p>-->
							<?php $count++; ?>
						<?php endwhile; endif; ?>
					<?php } ?>
				<?php
					}
				?>


			<!-- .author-description -->
		</div><!-- .bbg-author-text -->
	</div>
<?php
		}	
	}



	