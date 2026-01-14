<?php get_header();

?><main>
    <div class="two-thirds-screen">
    <?php while(have_posts()){
        the_post(); 
        ?><div class="right-text by-line">
            
        </div>
        <div class="padding-x-20">
            <h1 class="centered-text"><?php the_title(); ?></h1>
            <p class="centered-text post-by-line">Posted by <?php echo get_the_author_posts_link(); ?> on <?php the_time('n.j.y'); ?></p>
        </div>
        <div class="red-orange-line-break-60"></div>
        <div class="generic-content">
            <?php the_content(); ?>
        </div>
    <?php }
    ?></div>
    <?php global $wpdb;
        $author_id = get_the_author_meta('ID');
        $data_table = $wpdb->prefix . "bp_xprofile_data";
        $fields_table = $wpdb->prefix . "bp_xprofile_fields";
        $posts_table = $wpdb->prefix . "posts";
        $query = 'select data.value from %i data join %i fields
            on data.field_id = fields.id
            and data.user_id = %d
            and fields.name = %s';
        $results = $wpdb->get_results($wpdb->prepare($query, $data_table, $fields_table, $author_id, 'Newsletter Signup Link'), ARRAY_A);
        $penQuery = 'select posts.post_title
            from %i posts
            where posts.post_type = "author-profile"
            and posts.post_author = %d';
        $penResults = $wpdb->get_results($wpdb->prepare($penQuery, $posts_table, $author_id), ARRAY_A);
        if ((count($results) > 0) || (count($penResults) > 0)){
            ?><div class="purple-blue-line-break-60"></div>
        <?php }
        ?><h2 class="centered-text padding-x-20">More from this author</h2>
        <?php if ($results){
            ?><p class="centered-text padding-x-20 author-newsletter-link"><a href="<?php echo $results[0]['value'] ?>" target="_blank">Signup for <?php echo get_the_author(); ?>'s newlsetter</a></p>
        <?php }
        if ($penResults){
            ?><p class="centered-text padding-x-20 publishes-under-line"><?php echo get_the_author(); ?> publishes under the following name<?php echo count($penResults) > 1 ? 's:' : ':' ?></p>
            <?php for ($i = 0; $i < count($penResults); $i++){
                ?><p class="centered-text padding-x-20 post-author-pen-name"><a href="<?php echo esc_url(site_url('/written-by' . '/' . str_replace(" ", "-", $penResults[$i]['post_title'])));?>"><?php echo $penResults[$i]['post_title']; ?></a></p>
            <?php }
        }
    ?><div class="blue-purple-line-break-60"></div>
    <div class="padding-x-20">
        <h2 class="centered-text">Comments</h2>
        <!-- <?php get_template_part('template-parts/comments'); ?> -->
         <?php if ( comments_open() || get_comments_number() ) :
            comments_template();
        endif; ?>
    </div>
    <br>
    <p class="centered-text see-all-blog-posts"><a href="<?php echo esc_url(site_url('/blog'));?>">See all blog posts</a></p>
</main>

<?php get_footer(); ?>