<?php get_header();

    $featuredAsianId = 884;
    $featuredBlackId = 869;
    $featuredDisabledId = 915;
    $featuredIndigenousId = 933;
    $featuredLatinxId = 926;
    $featuredLgtbqiaId = 865;
    $featuredMiddleEasternId = 942;
    $featuredNeurodivergentId = 881;
    $featuredOceanicId = 921;
    $featuredPoorId = 903;

    ?><div class="banner"><h1 class="centered-text">Discover Books by Diverse Authors</h1></div>
    <br>
    <br>
    <div class="two-thirds-screen generic-content">
        <div class="genre-category subcategory page-accent-alt-1">
            <a href="<?php echo esc_url(site_url('/diverse-books/asian-voices'));?>"><h3>by Asian Authors</h3></a>
            <?php wp_reset_postdata();
            $featuredAsianBook = new WP_Query( array( 'post_type' => 'product', 'p' => $featuredAsianId ) );
            ?><div class="book-sections-container-1"> 
            <?php while ($featuredAsianBook -> have_posts()){
                $featuredAsianBook->the_post();
                ?><div class="book-section--small">
                    <a href="<?php the_permalink(); ?>"><img class="book-cover--small-1" src="<?php the_post_thumbnail_url(); ?>"/></a> 
                </div>     
                <?php $authors = get_field('book_author', $featuredAsianId);
                    if ($authors) {
                        ?><div class="small-author-feature-container">
                        <?php foreach($authors as $author) {
                           ?><img class="small-author-feature" src="<?php echo get_the_post_thumbnail_url($author); ?>"/>
                        <?php }
                        ?></div>
                    <?php }           
            } ?>
            </div>
        </div>
        <div class="genre-category subcategory page-accent-alt-1">
            <a href="<?php echo esc_url(site_url('/diverse-books/black-voices'));?>"><h3>by Black Authors</h3></a>
            <?php wp_reset_postdata();
            $featuredBlackBook = new WP_Query( array( 'post_type' => 'product', 'p' => $featuredBlackId ) );
            ?><div class="book-sections-container-1"> 
            <?php while ($featuredBlackBook -> have_posts()){
                $featuredBlackBook->the_post();
                ?><div class="book-section--small">
                    <a href="<?php the_permalink(); ?>"><img class="book-cover--small-1" src="<?php the_post_thumbnail_url(); ?>"/></a> 
                </div>         
                <?php $authors = get_field('book_author', $featuredBlackId);
                    if ($authors) {
                        ?><div class="small-author-feature-container">
                        <?php foreach($authors as $author) {
                           ?><img class="small-author-feature" src="<?php echo get_the_post_thumbnail_url($author); ?>"/>
                        <?php }
                        ?></div>
                    <?php }        
            } ?>
            </div>
        </div>
        <div class="genre-category subcategory page-accent-alt-1">
            <a href="<?php echo esc_url(site_url('/diverse-books/disabled-voices'));?>"><h3>by Chronically Ill and Disabled Authors</h3></a>
            <?php wp_reset_postdata();
            $featuredDisabledBook = new WP_Query( array( 'post_type' => 'product', 'p' => $featuredDisabledId ) );
            ?><div class="book-sections-container-1"> 
            <?php while ($featuredDisabledBook -> have_posts()){
                $featuredDisabledBook->the_post();
                ?><div class="book-section--small">
                    <a href="<?php the_permalink(); ?>"><img class="book-cover--small-1" src="<?php the_post_thumbnail_url(); ?>"/></a> 
                </div>      
                <?php $authors = get_field('book_author', $featuredDisabledId);
                    if ($authors) {
                        ?><div class="small-author-feature-container">
                        <?php foreach($authors as $author) {
                           ?><img class="small-author-feature" src="<?php echo get_the_post_thumbnail_url($author); ?>"/>
                        <?php }
                        ?></div>
                    <?php }           
            } ?>
            </div>
        </div>
        <div class="genre-category subcategory page-accent-alt-1">
            <a href="<?php echo esc_url(site_url('/diverse-books/indigenous-voices'));?>"><h3>by Indigenous Authors</h3></a>
            <?php wp_reset_postdata();
            $featuredIndigenousBook = new WP_Query( array( 'post_type' => 'product', 'p' => $featuredIndigenousId ) );
            ?><div class="book-sections-container-1"> 
            <?php while ($featuredIndigenousBook -> have_posts()){
                $featuredIndigenousBook->the_post();
                ?><div class="book-section--small">
                    <a href="<?php the_permalink(); ?>"><img class="book-cover--small-1" src="<?php the_post_thumbnail_url(); ?>"/></a> 
                </div>
                <?php $authors = get_field('book_author', $featuredIndigenousId);
                    if ($authors) {
                        ?><div class="small-author-feature-container">
                        <?php foreach($authors as $author) {
                           ?><img class="small-author-feature" src="<?php echo get_the_post_thumbnail_url($author); ?>"/>
                        <?php }
                        ?></div>
                    <?php }                   
            } ?>
            </div>
        </div>
        <div class="genre-category subcategory page-accent-alt-1">
            <a href="<?php echo esc_url(site_url('/diverse-books/latinx-voices'));?>"><h3>by Latine/Latinx Authors</h3></a>
            <?php wp_reset_postdata();
            $featuredLatinxBook = new WP_Query( array( 'post_type' => 'product', 'p' => $featuredLatinxId ) );
            ?><div class="book-sections-container-1"> 
            <?php while ($featuredLatinxBook -> have_posts()){
                $featuredLatinxBook->the_post();
                ?><div class="book-section--small">
                    <a href="<?php the_permalink(); ?>"><img class="book-cover--small-1" src="<?php the_post_thumbnail_url(); ?>"/></a> 
                </div>    
                <?php $authors = get_field('book_author', $featuredLatinxId);
                    if ($authors) {
                        ?><div class="small-author-feature-container">
                        <?php foreach($authors as $author) {
                           ?><img class="small-author-feature" src="<?php echo get_the_post_thumbnail_url($author); ?>"/>
                        <?php }
                        ?></div>
                    <?php }               
            } ?>
            </div>
        </div>
        <div class="genre-category subcategory page-accent-alt-1">
            <a href="<?php echo esc_url(site_url('/diverse-books/lgbtqia2s-voices'));?>"><h3>by LGBTQIA+ Authors</h3></a>
            <?php wp_reset_postdata();
            $featuredLgbtqiaBook = new WP_Query( array( 'post_type' => 'product', 'p' => $featuredLgtbqiaId ) );
            ?><div class="book-sections-container-1"> 
            <?php while ($featuredLgbtqiaBook -> have_posts()){
                $featuredLgbtqiaBook->the_post();
                ?><div class="book-section--small">
                    <a href="<?php the_permalink(); ?>"><img class="book-cover--small-1" src="<?php the_post_thumbnail_url(); ?>"/></a> 
                </div>       
                <?php $authors = get_field('book_author', $featuredLgtbqiaId);
                    if ($authors) {
                        ?><div class="small-author-feature-container">
                        <?php foreach($authors as $author) {
                           ?><img class="small-author-feature" src="<?php echo get_the_post_thumbnail_url($author); ?>"/>
                        <?php }
                        ?></div>
                    <?php }            
            } ?>
            </div>
        </div>
        <div class="genre-category subcategory page-accent-alt-1">
            <a href="<?php echo esc_url(site_url('/diverse-books/middle-eastern-voices'));?>"><h3>by Middle Eastern Authors</h3></a>
            <?php wp_reset_postdata();
            $featuredMiddleEasternBook = new WP_Query( array( 'post_type' => 'product', 'p' => $featuredMiddleEasternId ) );
            ?><div class="book-sections-container-1"> 
            <?php while ($featuredMiddleEasternBook -> have_posts()){
                $featuredMiddleEasternBook->the_post();
                ?><div class="book-section--small">
                    <a href="<?php the_permalink(); ?>"><img class="book-cover--small-1" src="<?php the_post_thumbnail_url(); ?>"/></a> 
                </div>        
                <?php $authors = get_field('book_author', $featuredMiddleEasternId);
                    if ($authors) {
                        ?><div class="small-author-feature-container">
                        <?php foreach($authors as $author) {
                           ?><img class="small-author-feature" src="<?php echo get_the_post_thumbnail_url($author); ?>"/>
                        <?php }
                        ?></div>
                    <?php }           
            } ?>
            </div>
        </div>
        <div class="genre-category subcategory page-accent-alt-1">
            <a href="<?php echo esc_url(site_url('/diverse-books/neurodivergent-voices'));?>"><h3>by Neurodivergent Authors</h3></a>
            <?php wp_reset_postdata();
            $featuredNeurodivergentBook = new WP_Query( array( 'post_type' => 'product', 'p' => $featuredNeurodivergentId ) );
            ?><div class="book-sections-container-1"> 
            <?php while ($featuredNeurodivergentBook -> have_posts()){
                $featuredNeurodivergentBook->the_post();
                ?><div class="book-section--small">
                    <a href="<?php the_permalink(); ?>"><img class="book-cover--small-1" src="<?php the_post_thumbnail_url(); ?>"/></a> 
                </div>   
                <?php $authors = get_field('book_author', $featuredNeurodivergentId);
                    if ($authors) {
                        ?><div class="small-author-feature-container">
                        <?php foreach($authors as $author) {
                           ?><img class="small-author-feature" src="<?php echo get_the_post_thumbnail_url($author); ?>"/>
                        <?php }
                        ?></div>
                    <?php }                
            } ?>
            </div>
        </div>
        <div class="genre-category subcategory page-accent-alt-1">
            <a href="<?php echo esc_url(site_url('/diverse-books/oceanic-and-pacific-islander-voices'));?>"><h3>by Oceanic and Pacific Islander Authors</h3></a>
            <?php wp_reset_postdata();
            $featuredOceanicBook = new WP_Query( array( 'post_type' => 'product', 'p' => $featuredOceanicId ) );
            ?><div class="book-sections-container-1"> 
            <?php while ($featuredOceanicBook -> have_posts()){
                $featuredOceanicBook->the_post();
                ?><div class="book-section--small">
                    <a href="<?php the_permalink(); ?>"><img class="book-cover--small-1" src="<?php the_post_thumbnail_url(); ?>"/></a> 
                </div>    
                <?php $authors = get_field('book_author', $featuredOceanicId);
                    if ($authors) {
                        ?><div class="small-author-feature-container">
                        <?php foreach($authors as $author) {
                           ?><img class="small-author-feature" src="<?php echo get_the_post_thumbnail_url($author); ?>"/>
                        <?php }
                        ?></div>
                    <?php }               
            } ?>
            </div>
        </div>
        <div class="genre-category subcategory page-accent-alt-1">
            <a href="<?php echo esc_url(site_url('/diverse-books/poor-and-working-class-voices'));?>"><h3>by Poor and Working Class Authors</h3></a>
            <?php wp_reset_postdata();
            $featuredPoorBook = new WP_Query( array( 'post_type' => 'product', 'p' => $featuredPoorId ) );
            ?><div class="book-sections-container-1"> 
            <?php while ($featuredPoorBook -> have_posts()){
                $featuredPoorBook->the_post();
                ?><div class="book-section--small">
                    <a href="<?php the_permalink(); ?>"><img class="book-cover--small-1" src="<?php the_post_thumbnail_url(); ?>"/></a> 
                </div>             
                <?php $authors = get_field('book_author', $featuredPoorId);
                    if ($authors) {
                        ?><div class="small-author-feature-container">
                        <?php foreach($authors as $author) {
                           ?><img class="small-author-feature" src="<?php echo get_the_post_thumbnail_url($author); ?>"/>
                        <?php }
                        ?></div>
                    <?php }      
            } ?>
            </div>
        </div>
    </div>

<?php get_footer();
?>