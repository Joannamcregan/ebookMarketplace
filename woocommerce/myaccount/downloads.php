<h1 class="centered-text">My Downloads</h1>
<br>
<br>
<!-- <div class="two-thirds-screen generic-content"> -->

<?php if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$downloads     = WC()->customer->get_downloadable_products();
$has_downloads = (bool) $downloads;

do_action( 'woocommerce_before_account_downloads', $has_downloads ); ?>

<?php if ( $has_downloads ) : ?>

	<?php do_action( 'woocommerce_before_available_downloads' ); ?>

	<?php do_action( 'woocommerce_available_downloads', $downloads ); ?>

	<?php do_action( 'woocommerce_after_available_downloads' ); ?>

	<div class="page-accent-alt-1">
		<h2>How to read our e-books</h2>
		<p>Our e-books can be read on many free e-reading apps.</p>
		<h4>For Android Phones and Tablets with the Google Play Store</h4>
		<p><a href= "https://play.google.com/store/apps/details?id=org.readera&hl=en" target="_blank">Readera</a> is a great, ad-free e-reading app for Android devices. <a href="https://play.google.com/store/apps/details?id=com.lenntt.evoicereader" target="_blank">Evie</a> is a speech-to-text app for Android that can read our e-books aloud to you.</p>
		<h4>For iPhones and iPads</h4>
		<p><a href="https://apps.apple.com/us/app/epub-reader-read-epub-chm-txt/id1296870631" target="_blank">Epub Reader</a> is a great option for reading our e-books on iPhones and iPads. <a href="https://apps.apple.com/app/voice-aloud-reader/id1446876360" target="_blank">Voice Aloud Reader</a> can read our books out loud from an iPhone or iPad.</p>
		<h4>For Kindle Tablets</h4>
		<p>Reading epub format e-books, such as ours, on Kindle tablets requires a few extra steps. Luckily, Joe Fedewa at How-To Geek has written <a href="https://www.howtogeek.com/798894/how-to-transfer-epub-to-kindle/" target="_blank">this helpful guide</a>, which makes the process easy.</p>
	</div>

<?php else : ?>
	<div class="woocommerce-Message woocommerce-Message--info woocommerce-info">
		<a class="woocommerce-Button button" href="<?php echo esc_url( apply_filters( 'woocommerce_return_to_shop_redirect', wc_get_page_permalink( 'shop' ) ) ); ?>">
			<?php esc_html_e( 'Browse products', 'woocommerce' ); ?>
		</a>
		<?php esc_html_e( 'No downloads available yet.', 'woocommerce' ); ?>
	</div>
<?php endif; ?>

<?php do_action( 'woocommerce_after_account_downloads', $has_downloads ); ?>
<!-- </div> -->