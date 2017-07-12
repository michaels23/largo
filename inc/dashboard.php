<?php
/**
 * Various customizations for the admin dashboard
 *
 * @package Largo
 * @since 0.1
 */

function largo_dashboard_quick_links() {
	echo '
		<div class="list-widget">
			<p>If you\'re having trouble with your site, want to request a new feature or are just interested in learning more about Project Largo, here are a few helpful links:</p>
			<ul>
				<li><a href="http://largoproject.org/">Largo Project Website</a></li>
				<li><a href="http://largo.readthedocs.io/">Largo Documentation</a></li>
				<li><a href="http://support.largoproject.org">Help Desk</a></li>
				<li><a href="http://support.largoproject.org/support/solutions">Knowledge Base</a></li>
				<li><a href="mailto:support@largoproject.org">Contact Us</a></li>
			</ul>
			<p>Developers can also log issues on <a href="https://github.com/INN/Largo">our public github repository</a> and if you would like to be included in our Largo users\' group, <a href="http://inn.us1.list-manage1.com/subscribe?u=81670c9d1b5fbeba1c29f2865&id=913028b23c">sign up here</a>.</p>
		</div>
	';
}

// add a credit line to the admin footer
function largo_admin_footer_text( $default_text ) {
	return '<span id="footer-thankyou">This website powered by <a href="http://largoproject.org">Project Largo</a> from <a href="http://inn.org">INN</a> and <a href="http://wordpress.org">WordPress</a>.</span>';
}
add_filter( 'admin_footer_text', 'largo_admin_footer_text' );

// remove the links menu item and the media options
function largo_admin_menu() {
	remove_menu_page( 'link-manager.php' );
	remove_menu_page( 'options-media.php' );
}
add_action( 'admin_menu', 'largo_admin_menu' );
