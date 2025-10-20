<?php get_header();

?><div class="two-thirds-screen">
    <h2 class="centered-text">About <?php echo get_author_name(); ?></h2>
    <div class="image-text--container">
        <img class="image-text--image" src="<?php echo get_avatar_url(get_the_author_id(), ['size' => '300']); ?>"/>
        <div>
            <?php if (get_the_author_meta('description', get_the_author_id())) {
                echo get_the_author_meta('description', get_the_author_id());
            } else {
                echo get_author_name() . ' is a part of our community.';
            }
        ?></div>
    </div>

    <?php $wpdb;
        $author_id = get_the_author_meta('ID');
        $data_table = $wpdb->prefix . "bp_xprofile_data";
        $fields_table = $wpdb->prefix . "bp_xprofile_fields";
        $posts_table = $wpdb->prefix . "posts";
        $pen_names_table = $wpdb->prefix . "tomc_user_pen_names";
        $query = 'select data.value from %i data join %i fields
            on data.field_id = fields.id
            and data.user_id = %d
            and fields.name = %s';
        $results = $wpdb->get_results($wpdb->prepare($query, $data_table, $fields_table, $author_id, 'Newsletter Signup Link'), ARRAY_A);
        $penQuery = 'select posts.post_title
            from %i posts join %i pennames
            on posts.id = pennames.pennameid
            and posts.post_type = "author-profile"
            where pennames.userid = %d';
        $penResults = $wpdb->get_results($wpdb->prepare($penQuery, $posts_table, $pen_names_table, $author_id), ARRAY_A);
        if ($results || $penResults){
            ?><div class="purple-blue-line-break-60"></div>
        <?php }
        ?><h2 class="centered-text padding-x-20"><?php echo get_the_author(); ?> is an author</h2>
        <?php if ($results){
            ?><p class="centered-text padding-x-20"><a href="<?php echo $results[0]['value'] ?>" target="_blank">Signup for <?php echo get_the_author(); ?>'s newlsetter</a></p>
        <?php }
        if ($penResults){
            ?><p class="centered-text padding-x-20"><?php echo get_the_author(); ?> publishes under the following name:<?php echo count($penResults) > 1 ? 's' : '' ?></p>
            <?php for ($i = 0; $i < count($penResults); $i++){
                ?><p class="centered-text padding-x-20"><a href="<?php echo esc_url(site_url('/pen-name' . '/' . str_replace(" ", "-", $penResults[$i]['post_title'])));?>"><?php echo $penResults[$i]['post_title']; ?></a></p>
            <?php }
        }
    ?><div class="blue-purple-line-break-60"></div>
</div>

<?php get_footer(); ?>