<?php
/**
 * BuddyPress - Members Profile Loop
 *
 * @package BuddyPress
 * @subpackage bp-legacy
 * @version 3.0.0
 */

/** This action is documented in bp-templates/bp-legacy/buddypress/members/single/profile/profile-wp.php */
do_action( 'bp_before_profile_loop_content' ); ?>

<?php if ( bp_has_profile() ) : ?>

	<?php while ( bp_profile_groups() ) : bp_the_profile_group(); ?>

	<?php
		/** This action is documented in bp-templates/bp-legacy/buddypress/members/single/profile/profile-wp.php */
		do_action( 'bp_before_profile_field_content' ); ?>

		<div class="bp-widget <?php bp_the_profile_group_slug(); ?>">

			<h2 class="centered-text">About <?php echo bp_core_get_username(bp_displayed_user_id()); ?></h2>
			<?php if (get_the_author_meta('description', bp_displayed_user_id())){
				?><div class="generic-content">
					<?php echo get_the_author_meta('description', bp_displayed_user_id());
				?></div>
			<?php } else {
				?><div class="centered-text">
					<?php echo bp_core_get_username(bp_displayed_user_id()) . 'is a member of our community.';
				?></div>
			<?php }
			

		?></div>
		<br/>
		<br/>

		<?php wp_reset_postdata();
		$args = array(
			'post_type' => 'curations',
			'author'        =>  bp_displayed_user_id(),
			'orderby'       =>  'post_date',
			'order'         =>  'ASC',
			'posts_per_page' => -1
		);

		$contributorCurations = get_posts($args);

		if ($contributorCurations) {
			?><h2 class="centered-text"><?php echo bp_core_get_username(bp_displayed_user_id()); ?>'s Bookshelves</h2>
			<?php foreach ($contributorCurations as $curation) {
				?><div class="page-accent-profile">
					<a class="gray-link" href="<?php echo get_the_permalink($curation); ?>"><h3 class="left-text sans-text"><?php echo get_the_title($curation); ?></h3></a>
					<?php $books = get_field('curated_books', $curation->ID);
					if ($books){
						?><div class="book-sections-container">
						<?php foreach ($books as $book){
							?><div class="book-section--small">
								<a href="<?php the_permalink($book->ID); ?>"><img class="book-cover--small" src="<?php echo get_the_post_thumbnail_url($book->ID); ?>"/></a> 
							</div>     
					<?php }
					}
					?></div>
				</div>
			<?php } ?>
		<?php }

		?><br/><br/>
		
		<?php wp_reset_postdata();
		$contributorServices = new WP_Query( 
			array( 
				'post_type' => 'product', 
				'orderby' => 'date', 
				'posts_per_page' => 20, 
				'author' =>  bp_displayed_user_id(),
				'tax_query' => array( 
					array(
						'taxonomy' => 'product_cat', 
						'field' => 'slug', 
						'terms' => 'services'
					)
				) 
			) 
		);

		if ($contributorServices->have_posts()){
			?><h2 class="centered-text"><?php echo bp_core_get_username(bp_displayed_user_id()); ?>'s Services</h2>
			<?php while ($contributorServices -> have_posts()){
				$contributorServices->the_post();
				?><div class="page-accent-blue">
					<a class="gray-link" href="<?php echo get_the_permalink(); ?>"><h3 class="centered-text"><?php the_title(); ?></h3></a>
					<div class="page-accent-blue-container">						
						<div class="image-text--container-alt">
							<a href="<?php the_permalink(); ?>" aria-label="<?php the_title(); ?>"><img class="image-text--image-alt" src="<?php the_post_thumbnail_url(); ?>" alt="<?php get_post_meta(get_post_thumbnail_id(), '_wp_attachment_image_alt', TRUE) ?>" /></a> 
							<p class="image-text--description"><?php the_excerpt(); ?></p>  
						</div>
					</div>
				</div>   
			<?php }
		}

		?><br/><br/>

		<?php wp_reset_postdata();
		$contributorEvents = new WP_Query(array(
            'posts_per_page' => -1,
            'post_type' => 'event',
            'orderby' => 'date',
            'meta_query' => array(
            array(
                'key' => 'event_host',
                'compare' => 'LIKE',
                'value' => '"' . bp_displayed_user_id() . '"'
            )
            ),
            'order' => 'ASC'
        ));

		if ($contributorEvents->have_posts()){
			?><h2 class="centered-text"><?php echo bp_core_get_username(bp_displayed_user_id()); ?>'s Events</h2>
			
				<?php while ($contributorEvents -> have_posts()){
					$contributorEvents->the_post();
					?><div class="page-accent-orange">
						<a class="gray-link" href="<?php echo get_the_permalink(); ?>"><h3 class="centered-text"><?php the_title(); ?></h3></a>
						<div class="page-accent-orange-container">							
							<div class="image-text--container-alt">
								<a href="<?php the_permalink(); ?>" aria-label="<?php the_title(); ?>"><img class="image-text--image-alt" src="<?php the_post_thumbnail_url(); ?>" alt="<?php get_post_meta(get_post_thumbnail_id(), '_wp_attachment_image_alt', TRUE) ?>" /></a> 
								<p class="image-text--description"><?php the_excerpt(); ?></p>
								<p><em>Event date: <?php echo get_field('event_date'); ?> EST.</em></p>
							</div>
						</div>  
					</div>
				<?php }
		}

		wp_reset_postdata();

		/** This action is documented in bp-templates/bp-legacy/buddypress/members/single/profile/profile-wp.php */
		do_action( 'bp_after_profile_field_content' ); ?>

		<?php endwhile; ?>

		<?php

		/** This action is documented in bp-templates/bp-legacy/buddypress/members/single/profile/profile-wp.php */
		do_action( 'bp_profile_field_buttons' ); ?>

<?php endif; ?>

<?php

/** This action is documented in bp-templates/bp-legacy/buddypress/members/single/profile/profile-wp.php */
do_action( 'bp_after_profile_loop_content' );
