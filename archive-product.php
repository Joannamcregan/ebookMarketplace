<?php get_header();
?><body>
    <div class="product-collection">
    <?php if ( woocommerce_product_loop() ) {
        do_action( 'woocommerce_before_shop_loop' );
        woocommerce_product_loop_start(); 
            if ( wc_get_loop_prop( 'total' ) ) {          
                while ( have_posts() ) {
                    the_post();
                    do_action( 'woocommerce_shop_loop' );
                    wc_get_template_part( 'content', 'product' );
                }        
            }
            woocommerce_product_loop_end();
            do_action( 'woocommerce_after_shop_loop' );
    } else {
        do_action( 'woocommerce_no_products_found' );
    }
    ?></div>
</body>
<?php get_footer();
?>