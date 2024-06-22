<?php
/**
 * The template for displaying archive vendor info
 *
 * Override this template by copying it to yourtheme/MultiVendorX/archive-vendor-info.php
 *
 * @author 		MultiVendorX
 * @package MultiVendorX/Templates
 * @version     3.7
 */
global $MVX;
$vendor = get_mvx_vendor($vendor_id);
$vendor_hide_email = apply_filters('mvx_vendor_store_header_hide_store_email', get_user_meta($vendor_id, '_vendor_hide_email', true), $vendor->id);
$vendor_hide_description = apply_filters('mvx_vendor_store_header_hide_description', get_user_meta($vendor_id, '_vendor_hide_description', true), $vendor->id);

if (!$vendor_hide_description && !empty($description)) { ?>                
    <div class="description_data text-16"> 
        <?php echo wp_kses_post(htmlspecialchars_decode( wpautop( $description ), ENT_QUOTES )); ?>
    </div>
<?php }

if (!empty($email) && $vendor_hide_email != 'Enable') { ?>
    <p class="text-16"><span>To contact <?php woocommerce_page_title(); ?> please email </span><a href="mailto:<?php echo apply_filters('vendor_shop_page_email', $email, $vendor_id); ?>" class="gray-link"><?php echo esc_html(apply_filters('vendor_shop_page_email', $email, $vendor_id)); ?></a></p>
<?php }
