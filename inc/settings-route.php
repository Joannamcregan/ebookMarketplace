<?php

add_action('rest_api_init', 'tomcRegisterSettingsRoute');

function tomcRegisterSettingsRoute(){
    register_rest_route('tomcReaderSettings/v1', 'getContentWarnings', array(
        'methods' => 'GET',
        'callback' => 'getAllContentWarnings'
    ));
    register_rest_route('tomcReaderSettings/v1', 'getLanguages', array(
        'methods' => 'GET',
        'callback' => 'getAllLanguages'
    ));
}

function getAllContentWarnings(){
    global $wpdb;
    $cw_table = $wpdb->prefix .  "tomc_content_warnings";
    $query = 'select id, warning_name from %i';
    $results = $wpdb->get_results($wpdb->prepare($query, $cw_table), ARRAY_A);
    return $results;
}

function getAllLanguages(){
    global $wpdb;
    $languages_table = $wpdb->prefix .  "tomc_publication_languages";
    $query = 'select id, language_name from %i';
    $results = $wpdb->get_results($wpdb->prepare($query, $languages_table), ARRAY_A);
    return $results;
}