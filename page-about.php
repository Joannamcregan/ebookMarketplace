<?php get_header();

    ?><div class="banner"><h1 class="centered-text"><?php echo get_the_title(); ?></div>
    <br>
    <br>
    <div class="generic-content two-thirds-screen">
        <?php wp_reset_postdata();
        the_content(); ?>
        <div class="page-accent-alt-1">
		<h2 class="centered-text">How to read our ebooks</h2>
		<p>Our ebooks can be read on many free e-reading apps.</p>
		<h4>For Android Phones and Tablets with the Google Play Store</h4>
		<p><a href= "https://play.google.com/store/apps/details?id=org.readera&hl=en" target="_blank">Readera</a> is a great, ad-free e-reading app for Android devices. <a href="https://play.google.com/store/apps/details?id=com.lenntt.evoicereader" target="_blank">Evie</a> is a speech-to-text app for Android that can read our ebooks aloud to you.</p>
		<h4>For iPhones and iPads</h4>
		<p><a href="https://apps.apple.com/us/app/epub-reader-read-epub-chm-txt/id1296870631" target="_blank">Epub Reader</a> is a great option for reading our ebooks on iPhones and iPads. <a href="https://apps.apple.com/app/voice-aloud-reader/id1446876360" target="_blank">Voice Aloud Reader</a> can read our books out loud from an iPhone or iPad.</p>
		<h4>For Kindle Tablets</h4>
		<p>Reading epub format ebooks, such as ours, on Kindle tablets requires a few extra steps. Luckily, Joe Fedewa at How-To Geek has written <a href="https://www.howtogeek.com/798894/how-to-transfer-epub-to-kindle/" target="_blank">this helpful guide</a>, which makes the process easy.</p>
	</div>

    <?php wp_reset_postdata();
    $args = array(
        'role__in' => array('contributor', 'editor', 'administrator'),
        'orderby' => 'user_nicename',
        'order'   => 'DESC'
    );
    
    $user_query = new WP_User_Query( $args );
    
    ?><br><h3 class="centered-text">Meet our team</h3>
    <div class="contributors">
        <?php if ( ! empty( $user_query->get_results() ) ) {
            foreach ( $user_query->get_results() as $user ) {
                ?><a href="<?php echo get_author_posts_url($user->id); ?>">
                <div class="contributor"> 
                    <img src="<?php echo get_avatar_url($user->id, ['size' => '80']); ?>"/>
                    <p><?php echo $user->display_name;?></p>
                </div></a>
            <?php }
        }
    ?></div>
    </div>

<?php get_footer();
?>