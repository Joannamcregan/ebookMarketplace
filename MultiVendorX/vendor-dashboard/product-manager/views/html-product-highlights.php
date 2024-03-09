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
                    <strong class="editable-content"><?php echo isset($_POST['post_title']) ? wc_clean($_POST['post_title']) : htmlspecialchars($product_object->get_title( 'edit' )); ?></strong>
                    <?php if( (!$self->is_spmv() && $is_update) || !apply_filters('mvx_singleproductmultiseller_edit_product_title_disabled', true) ) : ?>
                    <button type="button" class="editable-content-button"><i class="mvx-font ico-edit-pencil-icon" title="<?php esc_attr_e('Edit', 'multivendorx'); ?>"></i> <!--span>edit</span--></button>
                    <?php endif; ?>
                    <span class="editing-content">
                        <label for="tomc--mvx--edit-product-post_title"><?php esc_html_e('Product Title', 'multivendorx'); ?>: </label>
                        <input type="text" class="form-control" name="post_title" id="tomc--mvx--edit-product-post_title" value="<?php echo htmlspecialchars($product_object->get_title( 'edit' )); ?>"<?php if ( $self->is_spmv() && apply_filters('mvx_singleproductmultiseller_edit_product_title_disabled', true) ) echo ' readonly="readonly"'; ?>>
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
                        <label for="tomc--mvx--gtin-select"><?php esc_html_e('GTIN', 'multivendorx'); ?>:</label>
                        <select id="tomc--mvx--gtin-select" class="form-control inline-input" name="_mvx_gtin_type">
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
            
            <?php do_action( 'mvx_frontend_dashboard_after_product_highlights_title_wrap', $post->ID, $product_object, $post ); ?> 
        </div>
    </div>
</div>