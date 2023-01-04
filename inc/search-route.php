<?php

add_action('rest_api_init', 'universityRegisterSearch');

function universityRegisterSearch() {
    register_rest_route('ebookMarketplace/v1', 'search', array(
        'methods' => WP_REST_SERVER::READABLE,
        'callback' => 'marketplaceSearchResults'
    ));
}

function marketplaceSearchResults($data) {
    $bookQuery = new WP_Query(array(
        'post_type' => 'product',
        's' => sanitize_text_field($data['term'])
    ));

    $results = array();

    if ($bookQuery->posts) {
        foreach($bookQuery->posts as $key => $queryItem) {
            array_push($results, array(
                'posttype' => get_post_type($queryItem),
                'title' => get_the_title($queryItem),
                'permalink' => get_the_permalink($queryItem),
                'thumbnail' => get_the_post_thumbnail_url($queryItem)
            ));
        }
    }

    $authorQuery = new WP_Query(array(
        'post_type' => 'member-author',
        's' => sanitize_text_field($data['term'])
    ));

    if ($authorQuery->posts) {
        foreach($authorQuery->posts as $key => $queryItem) {
            array_push($results, array(
                'posttype' => get_post_type($queryItem),
                'title' => get_the_title($queryItem),
                'permalink' => get_the_permalink($queryItem),
                'thumbnail' => get_the_post_thumbnail_url($queryItem)
            ));
        }
    }

    $shelfQuery = new WP_Query(array(
        'post_type' => 'curations',
        's' => sanitize_text_field($data['term'])
    ));

    if ($shelfQuery->posts) {
        foreach($shelfQuery->posts as $key => $queryItem) {
            array_push($results, array(
                'posttype' => get_post_type($queryItem),
                'title' => get_the_title($queryItem),
                'permalink' => get_the_permalink($queryItem),
                'curator' => get_the_author($queryItem),
                'thumbnail' => get_the_post_thumbnail_url($queryItem)
            ));
        }
    }

    return $results;
}