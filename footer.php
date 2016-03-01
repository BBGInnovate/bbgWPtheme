<?php
/**
 * The template for displaying the footer.
 *
 * Contains the closing of the #content div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * US Web Design Standards (alpha) includes 3 footers alternatives.
 * @link https://playbook.cio.gov/designstandards/footers/
 *
 * @package bbginnovate
 */

?>

	</div><!-- #content -->

	<footer id="colophon" class="site-footer usa-footer usa-footer-big usa-bbg-footer-big usa-sans" role="contentinfo">
		<div class="usa-grid usa-footer-return-to-top">
			<a href="#">Return to top</a>
		</div>
		<div class="usa-footer-primary-section">
			<div class="usa-grid-full">
				<nav class="usa-footer-nav usa-width-two-thirds">
					<ul class="usa-unstyled-list usa-width-one-fourth usa-footer-primary-content">
						<h4 class="usa-footer-primary-link">Broadcasters</h4>
						<li><a href="http://www.voanews.com/" title="Voice of America">VOA</a></li>
						<li><a href="http://www.rferl.org/" title="Radio Free Europe / Radio Liberty">RFERL</a></li>
						<li><a href="http://www.martinoticias.com/" title="Office of Cuba Broadcasting">OCB</a></li>
						<li><a href="http://www.rfa.org/english/" title="Radio Free Asia">RFA</a></li>
						<li><a href="http://www.alhurra.com/" title="Middle East Broadcasting Networks">MBN</a></li>
					</ul>
					<ul class="usa-unstyled-list usa-width-one-fourth usa-footer-primary-content">
						<h4 class="usa-footer-primary-link">About</h4>
						<li><a href="http://www.bbg.gov/about-the-agency/">About the BBG</a></li>
						<li><a href="http://www.bbg.gov/about-the-agency/history/faqs/">FAQs</a></li>
						<li><a href="http://www.bbg.gov/about-the-agency/research-reports/foia/contact-us">Contact Us</a></li>
					</ul>
					<ul class="usa-unstyled-list usa-width-one-fourth usa-footer-primary-content">
						<h4 class="usa-footer-primary-link">Departments</h4>
						<li><a href="http://www.bbgstrategy.com/">Strategy</a></li>
						<li><a href="http://oddi.bbg.gov">Innovation</a></li>
						<li><a href="http://www.bbg.gov/blog/ceo_blog_post/">CEO's office</a></li>
					</ul>
					<ul class="usa-unstyled-list usa-width-one-fourth usa-footer-primary-content">
						<h4 class="usa-footer-primary-link">Resources</h4>
						<li><a href="http://www.bbg.gov/about-the-agency/research-reports/foia/privacy-policy">Privacy Policy</a></li>
						<li><a href="http://www.bbg.gov/about-the-agency/research-reports/foia/">FOIA</a></li>
						<li><a href="http://www.bbg.gov/sitemap">Sitemap</a></li>
						<li><a href="http://www.bbg.gov/open">Open Gov</a></li>
					</ul>
				</nav>
					<div class="usa-width-one-third usa-sign_up-block">
						<h3 class="usa-sign_up-header">Search</h3>
						<?php get_search_form ( $echo = true ) ?>
					</div>
			</div>
		</div>


		<div class="usa-footer-secondary_section usa-footer-big-secondary-section">
			<div class="usa-grid">
				<div class="usa-footer-logo usa-width-one-half">
					<img class="usa-footer-logo-img" src="<?php echo get_template_directory_uri() ?>/img/logo-agency.png" alt="Broadcasting Board of Governors logo">
					<h3 class="usa-footer-logo-heading">Broadcasting Board of Governors</h3>
				</div>

				<div class="usa-footer-contact-links usa-width-one-half">
					<div class="usa-social-links">
						<a href="https://www.facebook.com/BBGgov/">
							<svg width="26" height="39" role="img" aria-label="Facebook">
								<title>Facebook</title>
								<image xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="<?php echo get_template_directory_uri() ?>/img/social-icons/svg/facebook25.svg" src="<?php echo get_template_directory_uri() ?>/img/social-icons/png/facebook25.png" width="26" height="39"></image>
							</svg>
						</a>
						<a href="https://twitter.com/BBGgov">
							<svg width="26" height="39" role="img" aria-label="Twitter">
							<title>Twitter</title>
							<image xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="<?php echo get_template_directory_uri() ?>/img/social-icons/svg/twitter16.svg" src="<?php echo get_template_directory_uri() ?>/img/social-icons/png/twitter16.png" width="26" height="39"></image>
							</svg>
						</a>
						<a href="https://www.youtube.com/user/bbgtunein">
							<svg width="26" height="39" role="img" aria-label="YouTube">
								<title>YouTube</title>
								<image xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="<?php echo get_template_directory_uri() ?>/img/social-icons/svg/youtube15.svg" src="<?php echo get_template_directory_uri() ?>/img/social-icons/png/youtube15.png" width="26" height="39"></image>
							</svg>
						</a>
						<a href="#">
							<svg width="26" height="39" role="img" aria-label="RSS">
								<title>RSS</title>
								<image xmlns:xlink="http://www.w3.org/1999/xlink" xlink:href="<?php echo get_template_directory_uri() ?>/img/social-icons/svg/rss25.svg" src="<?php echo get_template_directory_uri() ?>/img/social-icons/png/rss25.png" width="26" height="39"></image>
							</svg>
						</a>
					</div>

					<address>
						<h3 class="usa-footer-contact-heading">Agency Contact Center</h3>
						<p>(202) 203-4400</p>
						<a href="mailto:publicaffairs@bbg.gov">publicaffairs@bbg.gov</a>
					</address>
				</div>
			</div><!-- .usa-grid -->
		</div><!-- .usa-secondary-section -->
	</footer><!-- #colophon -->
</div><!-- #page -->

<?php wp_footer(); ?>

</body>
</html>
