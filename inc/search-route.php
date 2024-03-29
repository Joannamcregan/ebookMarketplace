<?php

add_action('rest_api_init', 'marketplaceRegisterSearch');

function marketplaceRegisterSearch() {
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
            $authors = '';
            $postId = url_to_postid( get_the_permalink($queryItem));
            $authorsField = get_field('book_author', $postId);
            if ($authorsField) {
                $fieldCounter = 0;
                while ($fieldCounter <= count($authorsField)) {
                    $authors .= $authorsField[$fieldCounter]->post_title;
                    if (count($authorsField) > 1 && $fieldCounter < count($authorsField) -1) {
                        $authors .= ', ';
                    }
                    $fieldCounter = $fieldCounter + 1;
                }
            } else {
                $authors = 'Unknown or Anonymous Author';
            }
            
            array_push($results, array(
                'posttype' => 'product',
                'title' => get_the_title($queryItem),
                'permalink' => get_the_permalink($queryItem),
                'thumbnail' => get_the_post_thumbnail_url($queryItem),
                'productauthor' => $authors,
                'excerpt' => get_the_excerpt($postId)
            ));
        }
    }

    $authorQuery = new WP_Query(array(
        'post_type' => 'author-profile',
        's' => sanitize_text_field($data['term'])
    ));

    if ($authorQuery->posts) {
        foreach($authorQuery->posts as $key => $queryItem) {
            array_push($results, array(
                'posttype' => 'author-profile',
                'title' => get_the_title($queryItem),
                'permalink' => get_the_permalink($queryItem)//,
                // 'thumbnail' => get_the_post_thumbnail_url($queryItem)
            ));
        }
    }

    // $shortQuery = new WP_Query(array(
    //     'post_type' => 'short',
    //     's' => sanitize_text_field($data['term'])
    // ));

    // if ($shortQuery->posts) {
    //     foreach($shortQuery->posts as $key => $queryItem) {
    //         $authors = '';
    //         $postId = url_to_postid( get_the_permalink($queryItem));
    //         $authorsField = get_field('short_author', $postId);
    //         if ($authorsField) {
    //             $fieldCounter = 0;
    //             while ($fieldCounter <= count($authorsField)) {
    //                 $authors .= $authorsField[$fieldCounter]->post_title;
    //                 if (count($authorsField) > 1 && $fieldCounter < count($authorsField) -1) {
    //                     $authors .= ', ';
    //                 }
    //                 $fieldCounter = $fieldCounter + 1;
    //             }
    //         } else {
    //             $authors = 'Unknown or Anonymous Author';
    //         }
            
    //         array_push($results, array(
    //             'posttype' => 'short',
    //             'title' => get_the_title($queryItem),
    //             'permalink' => get_the_permalink($queryItem),
    //             'thumbnail' => get_the_post_thumbnail_url($queryItem),
    //             'shortauthor' => $authors,
    //             'excerpt' => get_the_excerpt($postId)
    //         ));
    //     }
    // }

    return $results;
}