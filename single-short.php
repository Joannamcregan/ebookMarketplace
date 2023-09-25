<?php get_header();

?><div class="short-piece">
    
    <h1><?php the_title()?></h1>

    <?php wp_reset_postdata();
    $shortAuthor = get_field('short_author');
    ?><h3>
    by
    <?php if ($shortAuthor) {
        foreach($shortAuthor as $author) {
            if ($author != $shortAuthor[count($shortAuthor)-1]){
                ?>
                    <span><?php echo get_the_title($author) ?></span><span>, </span>
                <?php
            } else {
                ?>
                    <span><?php echo get_the_title($author) ?></span>
                <?php
            }
        }
    } else {
        ?> <span> Unknown or Anonymous Author(s) </span>
    <?php };
    ?> </h3>

    <?php wp_reset_postdata();
    $triggerWarning = get_field('book_trigger');
    if ($triggerWarning){
        ?><div class="shorts-trigger-warning shorts-wrapper">
            <p>This piece may be triggering for some readers.</p>
            <span>Click the arrow to see trigger warning(s)</span>
            <i class="fa-solid fa-caret-down arrow"></i>
            <div class="not-displayed category-children">
            <?php foreach($triggerWarning as $trigger){ ?>
                <p><?php echo get_the_title($trigger); ?></p>
            <?php } ?>
            </div>
        </div>
    <?php }
    
    wp_reset_postdata();
    $sponsoredMessage = get_field('sponsored_message');
    if ($sponsoredMessage){
        ?><div class="shorts-sponsored-wrapper shorts-wrapper">
            <h4 class="shorts-wrapper-heading">Ads like this one give authors time to write.</h4>
            <div class="shorts-sponsored-links shorts-link">
                <?php echo $sponsoredMessage ?>
            </div>
            <p class="shorts-wrapper-p"><em>Under late-stage capitalism, many people cannot afford to spend time on passions that don't earn them any money. If you can, please consider doing business with sponsors who support our authors.</em></p>
        </div>
    <?php }

    ?><br>
    <div>
        <?php wp_reset_postdata();
        the_content(); ?>
    </div>


    <?php wp_reset_postdata();
    $tipSection = get_field('tip_section');
    if ($tipSection){
        ?><div class="shorts-tip-wrapper shorts-wrapper">
            <h4 class="shorts-wrapper-heading">Tips help authors spend more time writing.</h4>
            <div class="shorts-tip-links shorts-link">
                <?php echo $tipSection; ?>
            </div>
            <p class="shorts-wrapper-p"><em>Under late-stage capitalism, many people cannot afford to spend time on passions that don't earn them any money. If you enjoyed reading this short piece, and you're able to do so, please consider tipping the author.</em></p>
        </div>
    <?php }

    wp_reset_postdata();
    $affiliateSection = get_field('affiliate_link');
    if ($affiliateSection){
        ?><div class="shorts-affiliate-wrapper shorts-wrapper">
            <h4 class="shorts-wrapper-heading">Affiliate income helps authors spend more time writing.</h4>
            <div class="shorts-affiliate-links shorts-link">
                <?php echo $affiliateSection; ?>
            </div>
            <p class="shorts-wrapper-p"><em>Under late-stage capitalism, many people cannot afford to spend time on passions that don't earn them any money. If you can, please consider doing business with the companies that do business with our authors.</em></p>
        </div>
    <?php }

    if ($shortAuthor) {
        ?><div class="about-author-container">
        <?php foreach($shortAuthor as $author) {
            echo '<div class="about-author-card">';
                echo '<div class="author-name">';
                    echo '<h3><span>about ';
                    ?><a href="<?php echo get_the_permalink($author) ?>"><?php echo get_the_title($author); ?></a>
                    <?php echo '</span></h3>';
                echo '</div>';
                echo '<div class="author-bio">';
                    ?><img src="<?php echo get_the_post_thumbnail_url($author); ?>"/>
                    <?php echo get_the_excerpt($author);
                echo '</div>';
            echo '</div>';        
        }
        ?></div>
    <?php };

?></div>

<?php get_footer(); ?>