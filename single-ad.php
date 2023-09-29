<?php get_header();

?><div class="short-piece">
    
    <h1><?php the_title()?></h1>

    <?php wp_reset_postdata();
    $companyName = get_field('company_name');
    $adLink = get_field('ad_link');
    $callToAction = get_field('call_to_action');
    if ($companyName) {
        ?><h3>
            Check out <a class="gray-link" href="<?php echo esc_url( $adLink ); ?>" target="_blank" rel="noopener noreferrer"><?php echo $companyName; ?> </a>
        </h3>
    <?php } 

    ?><br>
    <div class="half-screen">
        <?php wp_reset_postdata();
        the_content(); ?>
    </div>
    <br><br><br>
    <p>At The Book Marketplace, we're committed to helping authors share (and make money from) their work, on their own terms.
    <?php if ($companyName && $adLink){
        ?><span>We're able to do that, in part, due to our partnership with <a href="<?php echo esc_url( $adLink ); ?>" target="_blank" rel="noopener noreferrer"><?php echo $companyName; ?></a>. </span>
    <?php } else if ($companyName) {
        ?><span>We're able to do that, in part, due to our partnership with <?php echo $companyName; ?>. </span>
    <?php } else {
        ?><span>We're able to do that, in part, due to our relationships with advertisers. </span>
    <?php }
    if ($callToAction){
        ?><span><?php echo $callToAction; ?></span>
    <?php }
?></div>

<?php get_footer(); ?>