<?php
/**
 * The template for displaying Author bios.
 *
 * @package bbginnovate
 */
?>
<?php

$curauth = (isset($_GET['author_name'])) ? get_user_by('slug', $author_name) : get_userdata(intval($author));

/**** BEGIN PREPARING AUTHOR vars ****/
$theAuthorID=$curauth->ID;
$website = $curauth->user_url;
$authorName=$curauth->display_name;
$authorEmail = $curauth->user_email;
$avatar=get_avatar( $theAuthorID , apply_filters( 'change_avatar_css', 100) );


$website = "";


$m=get_user_meta($theAuthorID);
$twitterHandle ="";
if (isset($m['twitterHandle'])) {
	$twitterHandle=$m['twitterHandle'][0];
} 

$occupation = "";
if (isset($m['occupation'])) {
	$occupation=$m['occupation'][0];
}
$description="";
if (isset($m['description'])) {
	$description=$m['description'][0];
}
/**** DONE PREPARING AUTHOR vars ****/


/**** BEGIN QUERYING PROJECTS THIS USER IS A PART OF ****/
$qParams=array(
	'post_type' => array('post'),
	'orderby' => 'post_date',
	'order' => 'desc',
	'cat' => get_cat_id('Portfolio')
);
query_posts($qParams);
$projects= array();
if ( have_posts() ) :
	while ( have_posts() ) :
		the_post();
		$usersInProjectStr=get_post_meta( get_the_ID(), 'users_in_project', true );
		$usersInProject = array_map('trim', explode(',', $usersInProjectStr));  //get rid of whitespace and turn it into array
		array_walk( $usersInProject, 'intval' );	
		//echo "project " . get_the_ID() . " has users " . $usersInProjectStr;
		if (in_array($theAuthorID,$usersInProject)) {
			$oneProjectPost=get_post(get_the_id());
			array_push($projects,$oneProjectPost);
		}
	endwhile;
endif;
wp_reset_query();
/**** DONE QUERYING PROJECTS THIS USER IS A PART OF ****/


?>

<div class="usa-section">
	<div class="usa-grid-full">


		<header class="page-header bbg-page__header">
			<div class="bbg-avatar__container bbg-team__icon">
				<?php echo $avatar; ?>
			</div>

			<div class="bbg-staff__author__text">
				<h1 class="bbg-staff__author-name"><?php echo $authorName; ?></h1>

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
							<?php echo $description; ?>
						</div>


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

					<div class='clearAll'></div>
				</div><!-- .author-description -->
			</div><!-- .bbg-author-text -->
		</header><!-- .bbg-page__header -->


	</div><!-- .usa-grid -->
</div> 