<?php get_header();

?><div class="generic-content">
    
    <?php $isBook = true;
    $productCategories = get_the_terms( $post->ID, 'product_cat' );
    foreach($productCategories as $category){
        if ($category->term_id == 109/*gift card*/){
            $isBook = false;
        }
    }

    ?><h2><?php the_title()?></h2>

    <?php if ($isBook) {
        $bookAuthors = get_field('book_author');
        ?><h3>
        by
        <?php if ($bookAuthors) {
            foreach($bookAuthors as $author) {
                if (($author == $bookAuthors[count($bookAuthors)-2]) && count($bookAuthors) > 2) {
                    ?>
                        <span><a href="<?php echo get_the_permalink($author) ?>"><?php echo get_the_title($author) ?></a></span><span>, and </span>
                    <?php
                } else if (($author == $bookAuthors[count($bookAuthors)-2]) && count($bookAuthors) == 2) {
                    ?>
                        <span><a href="<?php echo get_the_permalink($author) ?>"><?php echo get_the_title($author) ?></a></span><span> and </span>
                    <?php
                } else if ($author != $bookAuthors[count($bookAuthors)-1]){
                    ?>
                        <span><a href="<?php echo get_the_permalink($author) ?>"><?php echo get_the_title($author) ?></a></span><span>, </span>
                    <?php
                } else {
                    ?>
                        <span><a href="<?php echo get_the_permalink($author) ?>"><?php echo get_the_title($author) ?></a></span>
                    <?php
                }
            }
        } else {
            ?> <span> Unknown or Anonymous Author(s) </span>
        <?php };
        ?> </h3>
    <?php }
    if ($isBook) {
        $ownVoicesCats = get_the_terms( $post->ID, 'pa_own-voices' );
    if ($ownVoicesCats) {
        echo '<div class="own-voices">';
            echo '<span>Own Voices: </span>';
        foreach($ownVoicesCats as $cat) {            
            echo '<span class="own-voices-cat"><i>';
            echo $cat->name; 
            echo '</i></span><span> </span>';
        }
        echo '</div>';
    }
}
?></div>

<div class="generic-content">
    <img class="book-cover--medium" src="<?php the_post_thumbnail_url('authorImage'); ?>"/>
    <div class="back-cover-description">
        <?php the_excerpt();?>
    </div>
</div>

<?php 

if ($bookAuthors) {
    ?><div class="about-author-container">
    <?php foreach($bookAuthors as $author) {
        echo '<div class="about-author-card">';
            echo '<div class="author-name">';
                echo '<h3><span>about ';
                echo get_the_title($author);
                echo '</span></h3>';
            echo '</div>';
            echo '<div class="author-bio">';
                ?><img src="<?php echo get_the_post_thumbnail_url($author); ?>"/>
                <?php the_excerpt($author);
            echo '</div>';
            echo '</div>';        
    }
    ?></div>
<?php };

get_footer(); ?>