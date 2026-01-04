<?php

/**
 * Product highlights template
 *
  * Override this template by copying it to yourtheme/MultiVendorX/vendor-dashboard/product-manager/views/html-product-highlights.php
 *
 * @author 		MultiVendorX
 * @package MultiVendorX/Templates
 * @version   3.3.0
 */
defined( 'ABSPATH' ) || exit;
global $MVX;
?>
<div class="cat-step3">
    <div class="panel-heading">
        <h1>
            <?php if( mvx_is_module_active('spmv') && get_mvx_vendor_settings('is_singleproductmultiseller', 'spmv_pages') && get_mvx_vendor_settings('category_pyramid_guide', 'settings_general') ) : ?>
            <span class="primary-color"><span><?php esc_html_e( 'Step 2 of', 'multivendorx' );?></span> <?php esc_html_e( '2:', 'multivendorx' );?></span> 
            <?php endif; ?>
            <?php esc_html_e( 'Add Product Details', 'multivendorx' );?>
        </h1>
        <?php if( get_transient( 'classified_product_terms_vendor'. get_current_user_id() ) || ($self->is_spmv() && $post) || $is_update ) : ?>
        <?php do_action( 'mvx_frontend_dashboard_before_product_highlights_category_wrap', $post->ID, $product_object, $post ); ?> 
        <div class="cat-breadcrumb-wrap">
        <?php 
            if( get_transient( 'classified_product_terms_vendor'. get_current_user_id() ) ){
                $classified_terms = get_transient( 'classified_product_terms_vendor' . get_current_user_id() );
                if( isset( $classified_terms['term_id'] ) && isset( $classified_terms['taxonomy'] ) ){
                    echo '<input type="hidden" name="_default_cat_hierarchy_term_id" id="_default_cat_hierarchy_term_id_' . esc_attr( $classified_terms['term_id'] ) . '" value="' . esc_attr( $classified_terms['term_id'] ) . '" data-label="' . esc_attr( $classified_terms['term_id'] ) . '" />';
                    mvx_generate_term_breadcrumb_html( array(
                        'term_id' => $classified_terms['term_id'], 
                        'taxonomy' => $classified_terms['taxonomy'],
                        'delimiter' => '',
                        'echo' => true) );

                    // save terms for post save handler 
                    $hierarchy = get_ancestors( $classified_terms['term_id'], $classified_terms['taxonomy'] );
                    $hierarchy[] = $classified_terms['term_id'];
                    foreach ( $hierarchy as $term_id ) {
                        echo '<input type="hidden" name="tax_input[' . $classified_terms['taxonomy'] . '][]" value="' . $term_id . '" />';
                    }
                }
            }elseif( ($self->is_spmv() && $post) || $is_update ){
                $term_tax = 'product_cat';
                $terms = wp_get_post_terms( $post->ID, $term_tax, array( 'fields' => 'ids' ) );
                $default_cat_hierarchy = get_post_meta( $post->ID, '_default_cat_hierarchy_term_id', true );
                $get_different_terms_hierarchy = get_mvx_different_terms_hierarchy( $terms );
                if( $get_different_terms_hierarchy ){
                    $nos_hierarchy = count( $get_different_terms_hierarchy );
                    $class = ( $nos_hierarchy > 1 ) ? "has-multiple-cat" : "";
                    $flag = 0;
                    foreach ( $get_different_terms_hierarchy as $term_id ) {
                        if( $flag >= 1 ) continue;
                        $term_id = ($default_cat_hierarchy) ? $default_cat_hierarchy : $term_id;
                        mvx_generate_term_breadcrumb_html( array(
                        'term_id' => $term_id, 
                        'taxonomy' => $term_tax,
                        'wrap_before' => '<ul class="mvx-breadcrumb breadcrumb '.$class.'">',
                        'delimiter' => '',
                        'echo' => true) );
                        $flag++;
                    }
                    // link to Add Book Info
                    if ($terms[0] != 53 /*services*/){
                        ?><br><p>
                            <?php echo '<span>Thank you for submitting your ';
                            switch($terms[0]){
                                case 84: //51 for dev, 84 for prod
                                    echo 'paperback! ' . '<a href="' . esc_url(site_url('/add-a-book')) . '">' . 'Add details to help readers find it' . '</a>' . ' or ' . '<a href="' . esc_url(site_url('/my-books')) . '">' . "link it to a book you've already published in another format. " . '</a>';
                                    break;
                                case 85: //50 for dev, 85 for prod
                                    echo 'hardcover! ' . '<a href="' . esc_url(site_url('/add-a-book')) . '">' . 'Add details to help readers find it' . '</a>' . ' or ' . '<a href="' . esc_url(site_url('/my-books')) . '">' . "link it to a book you've already published in another format. " . '</a>';
                                    break;
                                case 49: //48 for dev, 49 for prod
                                    echo 'ebook! ' . '<a href="' . esc_url(site_url('/add-a-book')) . '">' . 'Add details to help readers find it' . '</a>' . ' or ' . '<a href="' . esc_url(site_url('/my-books')) . '">' . "link it to a book you've already published in another format. " . '</a>';
                                    break;
                                case 50: //49 for dev, 50 for prod
                                    echo 'audiobook! ' . '<a href="' . esc_url(site_url('/add-a-book')) . '">' . 'Add details to help readers find it' . '</a>' . ' or ' . '<a href="' . esc_url(site_url('/my-books')) . '">' . "link it to a book you've already published in another format. " . '</a>';
                                    break;
                                case 75: //56 for dev, 75 for prod
                                    echo 'digital zine! ' . '<a href="' . esc_url(site_url('/add-a-book')) . '">' . 'Add details to help readers find it' . '</a>' . ' or ' . '<a href="' . esc_url(site_url('/my-books')) . '">' . "link it to a book you've already published in another format. " . '</a>';
                                    break;
                                case 86: //55 for dev, 86 for prod
                                    echo 'zine! ' . '<a href="' . esc_url(site_url('/add-a-book')) . '">' . 'Add details to help readers find it' . '</a>' . ' or ' . '<a href="' . esc_url(site_url('/my-books')) . '">' . "link it to a book you've already published in another format. " . '</a>';
                                    break;
                                default:
                                    echo 'creation! ' . '<a href="' . esc_url(site_url('/add-a-book')) . '">' . 'Add details to help readers find it' . '</a>' . ' or ' . '<a href="' . esc_url(site_url('/my-books')) . '">' . "link it to a book you've already published in another format. " . '</a>';
                                    break;
                            } 
                        echo '</span>';
                        global $wpdb;
                        $postmeta_table =  $wpdb->prefix . "postmeta";
                        $query = 'select nyp_status.post_id, nyp_status.meta_value as "nyp_status", nyp_min.meta_value as "nyp_min", nyp_max.meta_value as "nyp_max"
                        from %i nyp_status
                        left join %i nyp_min
                        on nyp_status.post_id = nyp_min.post_id
                        and nyp_min.meta_key = "_woonp_min"
                        left join %i nyp_max
                        on nyp_status.post_id = nyp_max.post_id
                        and nyp_max.meta_key = "_woonp_max"
                        where nyp_status.post_id = %d
                        and nyp_status.meta_key = "_woonp_status"';
                        $results = $wpdb->get_results($wpdb->prepare($query, $postmeta_table, $postmeta_table, $postmeta_table, $post->ID ), ARRAY_A);
                        if ($results){
                            if ($results[0]['nyp_status'] != 'overwrite'){
                                echo '<p>If you want to let readers decide how much to pay for your book, you can <span id="tomc-name-price-open-overlay" class="tomc-name-price-link" data-min="' . $results[0]['nyp_min'] . '" data-max="' . $results[0]['nyp_max'] . '" data-id="' . $results[0]['post_id'] . '" data-category="' . $terms[0] . '">enable the Name Your Price option.</span></p>';
                            } else {
                                echo '<p>You are currently letting readers decide how much they pay for your book. You can <span id="tomc-name-price-manage-overlay" class="tomc-name-price-link" data-min="' . $results[0]['nyp_min'] . '" data-max="' . $results[0]['nyp_max'] . '" data-id="' . $results[0]['post_id'] . '" data-category="' . $terms[0] . '">manage Name Your Price settings</span> or <span id="tomc-name-price-disable-overlay-link" class="tomc-name-price-link" data-id="' . $post->ID . '">disable the Name Your Price option</span>.</p>';
                            }
                        } else {
                            echo '<p>If you want to let readers decide how much to pay for your book, you can <span id="tomc-name-price-open-overlay" class="tomc-name-price-link" data-min="" data-max="" data-id="' . $post->ID . '" data-category="' . $terms[0] . '">enable the Name Your Price option.</span></p>';
                        }
                    }
                    // give option to set default terms hierarchy
                    if( $nos_hierarchy > 1 && ( get_mvx_vendor_settings('category_pyramid_guide', 'settings_general') ) ){ ?>
                    <p class="pull-right multiple-cat-hierarchy"><?php esc_html_e( 'Select a different category :', 'multivendorx' );?>
                        <strong id="multiple-cat-hierarchy-lbl" class="primary-color">
                            <button type="button" class="multi-cat-choose-dflt-btn editabble-button" data-toggle="collapse" data-target="#multi_cat_hierarchy_visiblity"><u><?php esc_html_e( 'Choose default', 'multivendorx' );?></u> <i class="mvx-font ico-downarrow-2-icon"></i></button>
                        </strong>
                    </p> 
                    <div id="multi_cat_hierarchy_visiblity" class="mvx-clps collapse dropdown-panel">
                        <div class="product-visibility-toggle-inner">
                            <?php 
                            foreach ( $get_different_terms_hierarchy as $term_id ) {
                                echo '<div class="form-group">' 
                                    . '<label>'
                                    . '<input type="radio" name="_default_cat_hierarchy_term_id" id="_default_cat_hierarchy_term_id_' . esc_attr( $term_id ) . '" value="' . esc_attr( $term_id ) . '" ' . checked( $default_cat_hierarchy, $term_id, false ) . ' data-label="' . esc_attr( $term_id ) . '" data-hierarchy="' . esc_attr(mvx_generate_term_breadcrumb_html( array( 'term_id' => $term_id, 
                                        'taxonomy' => $term_tax,
                                        'wrap_before'           => '',
                                        'wrap_after'            => '',
                                        'wrap_child_before'     => '<li>',
                                        'wrap_child_after'      => '</li>',
                                        'delimiter'             => ''
                                        ) )) . '" /> '
                                    . '<div for="_visibility_hierarchy_' . esc_attr( $term_id ) . '" class="selectit cat-breadcrumb">'.mvx_generate_term_breadcrumb_html( array( 'term_id' => $term_id, 
                                        'taxonomy' => $term_tax,
                                        'wrap_before'           => '',
                                        'wrap_after'            => '',
                                        'wrap_child_before'     => '',
                                        'wrap_child_after'      => '',
                                        ) ).'</div>' 
                                    . '</label>'
                                    . '</div>';
                            }
                            ?>
                            <div class="form-group mb-0">
                                <button type="button" class="btn btn-default btn-sm set-default-cat-hierarchy-btn" ><?php _e( 'Ok', 'multivendorx' ); ?></button>
                                <a href="javascript:void(0)" data-toggle="collapse" data-target="#multi_cat_hierarchy_visiblity"><?php _e( 'Cancel', 'multivendorx' ); ?></a>
                            </div>
                        </div>
                    </div>
                    <?php }
                    if( get_mvx_vendor_settings('category_pyramid_guide', 'settings_general') ) :
                    // save terms for post save handler 
                    if( $terms ){
                        foreach ( $terms as $term_id ) {
                            echo '<input type="hidden" name="tax_input[' . $term_tax . '][]" value="' . $term_id . '" />';
                        }
                    }
                    endif;
                }
            }
        ?>
        </div>
        <?php do_action( 'mvx_frontend_dashboard_after_product_highlights_category_wrap', $post->ID, $product_object, $post ); ?> 
        <?php endif; ?>
        <?php do_action( 'mvx_frontend_dashboard_before_product_highlights_title_wrap', $post->ID, $product_object, $post ); ?> 
        <div class="product-title-wrap <?php echo ( $self->is_spmv() || $is_update ) ? 'product-edit-mode' : 'product-add-mode'; ?>"> <!-- product-add-mode / product-edit-mode according to flow -->
            <div class="pull-left product-title-inner full-1080"> 
                <p class="pro-title">
                    <label><?php esc_html_e('Product Title', 'multivendorx'); ?>: </label>
                    <strong class="editable-content"><?php echo isset($_POST['post_title']) ? wc_clean($_POST['post_title']) : htmlspecialchars($product_object->get_title( 'edit' )); ?></strong>
                    <?php if( (!$self->is_spmv() && $is_update) || !apply_filters('mvx_singleproductmultiseller_edit_product_title_disabled', true) ) : ?>
                    <button type="button" class="editable-content-button"><i class="mvx-font ico-edit-pencil-icon" title="<?php esc_attr_e('Edit', 'multivendorx'); ?>"></i> <!--span>edit</span--></button>
                    <?php endif; ?>
                    <span class="editing-content">
                        <input type="text" class="form-control" name="post_title" id="post_title" value="<?php echo htmlspecialchars($product_object->get_title( 'edit' )); ?>"<?php if ( $self->is_spmv() && apply_filters('mvx_singleproductmultiseller_edit_product_title_disabled', true) ) echo ' readonly="readonly"'; ?>>
                        <input type="hidden" name="original_post_title" value="<?php echo htmlspecialchars($product_object->get_title( 'edit' )); ?>">
                        <input type="hidden" name="post_ID" value="<?php echo $self->get_the_id(); ?>">
                        <input type="hidden" name="is_update" value="<?php esc_attr( $is_update ); ?>">
                        <input type="hidden" name="original_post_status" value="<?php esc_attr( get_post_status( $post ) ); ?>">
                    </span> 
                </p>
                <?php if( $is_update ) : ?>
                <p class="pro-view"><?php echo mvx_get_post_permalink_html( $product_object->get_id() ); ?></p>
                <?php endif; ?>
                <?php if ( in_array( 'GTIN', get_mvx_global_settings('products_fields', array() ) ) ) : ?>
                <p class="gtin-field-wrap">
                    <?php if( $self->is_spmv() && !empty($self->get_gtin_no()) ) { ?>
                    <label><?php if( $self->get_gtin_term() ) echo $self->get_gtin_term()->name; else _e('GTIN', 'multivendorx'); ?>: </label>
                    <?php }elseif( $self->is_spmv() && empty($self->get_gtin_no()) ){ }elseif( $is_update ){ ?>
                    <label><?php if( $self->get_gtin_term() ) echo $self->get_gtin_term()->name; else _e('GTIN', 'multivendorx'); ?>: </label>
                    <?php } ?>
                    <strong class="editable-content"><?php echo $self->get_gtin_no(); ?></strong>
                    <?php if( !$self->is_spmv() && $is_update ) : ?>
                    <button type="button" class="editable-content-button"><i class="mvx-font ico-edit-pencil-icon" title="<?php esc_attr_e('Edit', 'multivendorx'); ?>"></i> <!--span>edit</span--></button>
                    <?php endif; ?>
                    <span class="editing-content">
                        <label><?php esc_html_e('GTIN', 'multivendorx'); ?>:</label>
                        <select class="form-control inline-input" name="_mvx_gtin_type">
                        <option value=""><?php esc_html_e( 'Select type', 'multivendorx' ); ?></option>  
                        <?php 
                        $gtin_types = apply_filters('mvx_add_product_default_gtin_types', $MVX->taxonomy->get_mvx_gtin_terms(array('fields' => 'id=>name', 'orderby' => 'id')), $post, $self);
                        foreach ($gtin_types as $term_id => $name) {
                            echo '<option value="'.$term_id.'">'.$name.'</option>'; 
                        }
                        ?>
                    </select>
                    <input type="text" class="form-control inline-input" name="_mvx_gtin_code" placeholder="<?php esc_attr_e( 'GTIN Code', 'multivendorx' );?>" value="<?php echo $self->get_gtin_no(); ?>">
                    </span> 
                </p>
                <?php endif; ?>
            </div>
            <div class="pull-right full-1080">
                <?php
                $current_visibility = $product_object->get_catalog_visibility();
                $current_featured   = wc_bool_to_string( $product_object->get_featured() );
                $visibility_options = wc_get_product_visibility_options();
                ?>
                <p class="cat-visiblity"><?php esc_html_e( 'Catalog visibility:', 'multivendorx' ); ?> 
                    <strong id="catalog-visibility-display" class="primary-color">
                        <?php

                        echo isset( $visibility_options[ $current_visibility ] ) ? esc_html( $visibility_options[ $current_visibility ] ) : esc_html( $current_visibility );

                        if ( 'yes' === $current_featured ) {
                                echo ', ' . esc_html__( 'Featured', 'multivendorx' );
                        }
                        ?>
                    </strong>
                    <button type="button" class="editabble-button" data-toggle="collapse" data-target="#product_visiblity"><i class="mvx-font ico-downarrow-2-icon" title="<?php _e('Edit', 'multivendorx'); ?>"></i> <!--span>edit</span--></button>
                </p> 
                <div id="product_visiblity" class="mvx-clps collapse dropdown-panel">
                    <input type="hidden" name="current_visibility" id="current_visibility" value="<?php echo esc_attr( $current_visibility ); ?>" />
                    <input type="hidden" name="current_featured" id="current_featured" value="<?php echo esc_attr( $current_featured ); ?>" />
                    <div class="product-visibility-toggle-inner">
                        <?php 
                        foreach ( $visibility_options as $name => $label ) {
                            echo '<div class="form-group"><label><input type="radio" name="_visibility" id="_visibility_' . esc_attr( $name ) . '" value="' . esc_attr( $name ) . '" ' . checked( $current_visibility, $name, false ) . ' data-label="' . esc_attr( $label ) . '" /> <span for="_visibility_' . esc_attr( $name ) . '" class="selectit">' . esc_html( $label ) . '</span></label></div>';
                        }
                        if( apply_filters( 'mvx_feature_product_is_enable', true ) ) {
                            echo '<hr><div class="form-group"><label><input type="checkbox" name="_featured" class="mt-0" id="_featured" ' . checked( $current_featured, 'yes', false ) . ' data-label="' . __( 'Featured', 'multivendorx' ) . '" /> <span for="_featured">' . esc_html__( 'This is a featured product', 'multivendorx' ) . '</label></label></div>';
                        }
                        ?>
                        <div class="form-group mt-15">
                            <button type="button" class="btn btn-default btn-sm catalog-visiblity-btn"><?php esc_html_e('Ok', 'multivendorx'); ?></button>
                            <a href="javascript:void(0)" class="btn btn-default btn-sm" data-toggle="collapse" data-target="#product_visiblity"><?php esc_html_e('Cancel', 'multivendorx'); ?></a>
                        </div>
                    </div>
                </div>
            </div>
            <?php do_action( 'mvx_frontend_dashboard_after_product_highlights_title_wrap', $post->ID, $product_object, $post ); ?> 
        </div>
    </div>
</div>