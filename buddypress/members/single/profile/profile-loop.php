<?php
/**
 * BuddyPress - Members Profile Loop
 *
 * @package BuddyPress
 * @subpackage bp-legacy
 * @version 3.0.0
 */

/** This action is documented in bp-templates/bp-legacy/buddypress/members/single/profile/profile-wp.php */
?><div class="sub-banner">
	<h2 class="centered-text">About <?php echo bp_core_get_username(bp_displayed_user_id()); ?></h2>
</div>
<?php if (get_the_author_meta('description', bp_displayed_user_id())){
	?><div class="generic-content">
		<?php echo get_the_author_meta('description', bp_displayed_user_id());
	?></div>
<?php } else {
	?><div class="centered-text">
		<?php echo bp_core_get_username(bp_displayed_user_id()) . ' is a member of our community.';
	?></div>
<?php }

?><br/>
<br/>
<?php $tomc_userid = bp_displayed_user_id();
$bookshelves_table = $wpdb->prefix .  "tomc_member_bookshelves";
$bookshelf_products_table = $wpdb->prefix . "tomc_bookshelf_products";
$bookshelves = $wpdb->get_results("SELECT * from $bookshelves_table WHERE userid = $tomc_userid;");
if ($bookshelves){
	?><div class="third-screen">
		<div class="sub-banner">
			<h2 class="centered-text"><?php echo bp_core_get_username(bp_displayed_user_id()); ?>'s' Bookshelves</h2>
		</div>
		<?php foreach($bookshelves as $shelf){
			?><div class="page-accent-profile">
				<div class="tomc-bookshelves--shelf-name-section">
					<h3 class="left-text sans-text"><?php echo str_replace("\'", "'", $shelf->shelfname); ?></h3>
				</div>
				<?php $shelfproducts = $wpdb->get_results("SELECT productid, id from $bookshelf_products_table WHERE bookshelfid = $shelf->id;"); 
				if ($shelfproducts){
					?><div class="book-sections-container">
						<?php foreach($shelfproducts as $prod){
							?><div class="book-section--small">
								<a href="<?php the_permalink($prod->productid); ?>" aria-label="<?php the_title(); ?>"><img class="tomc-bookshelf--book-cover" src="<?php echo get_the_post_thumbnail_url($prod->productid); ?>"/></a>
							</div> 
						<?php }
					?></div>
				<?php }
			?></div>                 
		<?php }
	?></div>
<?php }

/** This action is documented in bp-templates/bp-legacy/buddypress/members/single/profile/profile-wp.php */
do_action( 'bp_profile_field_buttons' );

/** This action is documented in bp-templates/bp-legacy/buddypress/members/single/profile/profile-wp.php */
do_action( 'bp_after_profile_loop_content' );
