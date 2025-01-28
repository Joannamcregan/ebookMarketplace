<?php

add_action('rest_api_init', 'tomcRegisterVendorRoute');

function tomcRegisterVendorRoute(){
    register_rest_route('tomcVendor/v1', 'assignVendorRole', array(
        'methods' => 'POST',
        'callback' => 'assignVendorRole'
    ));
}

function assignVendorRole(){
    $user = wp_get_current_user();
    if (is_user_logged_in()){
        $user->add_role( 'dc_vendor' );
        return 'success';
    } else {
        wp_safe_redirect(site_url('/my-account'));
        return 'fail';
    }
}