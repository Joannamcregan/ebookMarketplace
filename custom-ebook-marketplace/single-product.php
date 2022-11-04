<?php
    $bookAuthors = get_field('book_author');
?>

<h2><?php the_title()?></h2>

<h3>
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
    ?> <span> by Unknown or Anonymous Author(s) </span>
<?php };
?> </h3>

<img src="<?php the_post_thumbnail() ?>"/>

<div>
    <?php the_content() ?>
</div>

<?php if ($bookAuthors) {
    ?><div>
    <?php foreach($bookAuthors as $author) {
        ?><div>
            <h4><span>About </span><span><?php echo get_the_title($author) ?></span></h4>
            <p><?php echo get_the_content($author) ?></p>
        </div>
    <?php }
    ?></div>
<?php };