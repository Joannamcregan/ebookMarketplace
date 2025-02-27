<?php

add_action('rest_api_init', 'marketplaceRegisterSearch');

function marketplaceRegisterSearch() {
    register_rest_route('ebookMarketplace/v1', 'search', array(
        'methods' => 'GET',
        'callback' => 'marketplaceSearchResults'
    ));
    register_rest_route('ebookMarketplace/v1', 'searchWithoutLanguages', array(
        'methods' => 'GET',
        'callback' => 'searchWithoutLanguages'
    ));
}

function marketplaceSearchResults($data) {
    $resultsArr = [];
    $searchTerm = sanitize_text_field($data['searchterm']);
    $selectedLanguages = explode(',', trim(sanitize_text_field($data['languages']), '[]'));
    $selectedTriggers = explode(',', trim(sanitize_text_field($data['triggers']), '[]'));
    $hasTriggers = sanitize_text_field($data['hasTriggers']);
    $user = wp_get_current_user();
    global $wpdb;
    $books_table = $wpdb->prefix . "tomc_books";
    $book_genres_table = $wpdb->prefix .  "tomc_book_genres";
    $genres_table = $wpdb->prefix . "tomc_genres";
    $book_products_table = $wpdb->prefix . "tomc_book_products";
    $posts_table = $wpdb->prefix . "posts";
    $product_types_table = $wpdb->prefix . "tomc_product_types";
    $pen_names_table = $wpdb->prefix . "tomc_pen_names_books";
    $book_languages_table = $wpdb->prefix . "tomc_book_languages";
    $book_warnings_table = $wpdb->prefix . "tomc_book_warnings";
    $book_identities_table = $wpdb->prefix . "tomc_book_identities";
    $identities_table = $wpdb->prefix . "tomc_character_identities";
    $readalikes_table = $wpdb->prefix . "tomc_book_readalikes";

    //first, if the search term contains "by", check for a book with title and author name
    if (str_contains(strtoupper($searchTerm), 'BY')){
        if ($hasTriggers == 'yes'){
            $query = 'select distinct b.id, b.title, b.product_image_id, c.productid, f.post_title as pen_name, b.book_description, b.createdate, d.type_name, g.id as product_url, "book" as "resulttype"
            from %i b
            join %i c on b.id = c.bookid
            join %i d on c.typeid = d.id
            left join %i e on b.id = e.bookid
            left join %i f on e.pennameid = f.id
            join %i g on c.productid = g.id
            join %i h on b.id = h.bookid
            where h.languageid in (' . join(', ', $selectedLanguages) . ')
            and concat(b.title, " by ", f.post_title) like %s
            and b.id not in (select j.bookid from %i j where j.warningid in (' . join(', ', $selectedTriggers) . '))
            and b.islive = 1
            order by b.createdate desc
            limit 200';
            $booksResults = $wpdb->get_results($wpdb->prepare($query, $books_table, $book_products_table, $product_types_table, $pen_names_table, $posts_table, $posts_table, $book_languages_table, '%' . $wpdb->esc_like($searchTerm) . '%', $book_warnings_table), ARRAY_A);
        } else {
            $query = 'select distinct b.id, b.title, b.product_image_id, c.productid, f.post_title as pen_name, b.book_description, b.createdate, d.type_name, g.id as product_url, "book" as "resulttype"
            from %i b
            join %i c on b.id = c.bookid
            join %i d on c.typeid = d.id
            left join %i e on b.id = e.bookid
            left join %i f on e.pennameid = f.id
            join %i g on c.productid = g.id
            join %i h on b.id = h.bookid
            where h.languageid in (' . join(', ', $selectedLanguages) . ')
            and concat(b.title, " by ", f.post_title) like %s
            and b.islive = 1
            order by b.createdate desc
            limit 200';
            $booksResults = $wpdb->get_results($wpdb->prepare($query, $books_table, $book_products_table, $product_types_table, $pen_names_table, $posts_table, $posts_table, $book_languages_table, '%' . $wpdb->esc_like($searchTerm) . '%'), ARRAY_A);
        }
        for($index = 0; $index < count($booksResults); $index++){
            $booksResults[$index]['product_url'] = get_permalink($booksResults[$index]['product_url']);
            $booksResults[$index]['product_image_id'] = get_the_post_thumbnail_url($booksResults[$index]['product_image_id']);
        }
        array_push($resultsArr, ...$booksResults);
    }
    //checking for title
    if ($hasTriggers == 'yes'){
        $query = 'select distinct b.id, b.title, b.product_image_id, c.productid, f.post_title as pen_name, b.book_description, b.createdate, d.type_name, g.id as product_url, "book" as "resulttype"
        from %i b
        join %i c on b.id = c.bookid
        join %i d on c.typeid = d.id
        left join %i e on b.id = e.bookid
        left join %i f on e.pennameid = f.id
        join %i g on c.productid = g.id
        join %i h on b.id = h.bookid
        where h.languageid in (' . join(', ', $selectedLanguages) . ')
        and b.title = %s
        and b.id not in (select j.bookid from %i j where j.warningid in (' . join(', ', $selectedTriggers) . '))
        and b.islive = 1
        order by b.createdate desc
        limit 200';
        $booksResults = $wpdb->get_results($wpdb->prepare($query, $books_table, $book_products_table, $product_types_table, $pen_names_table, $posts_table, $posts_table, $book_languages_table, $searchTerm, $book_warnings_table), ARRAY_A);
    } else {
        $query = 'select distinct b.id, b.title, b.product_image_id, c.productid, f.post_title as pen_name, b.book_description, b.createdate, d.type_name, g.id as product_url, "book" as "resulttype"
        from %i b
        join %i c on b.id = c.bookid
        join %i d on c.typeid = d.id
        left join %i e on b.id = e.bookid
        left join %i f on e.pennameid = f.id
        join %i g on c.productid = g.id
        join %i h on b.id = h.bookid
        where h.languageid in (' . join(', ', $selectedLanguages) . ')
        and b.title = %s
        and b.islive = 1
        order by b.createdate desc
        limit 200';
        $booksResults = $wpdb->get_results($wpdb->prepare($query, $books_table, $book_products_table, $product_types_table, $pen_names_table, $posts_table, $posts_table, $book_languages_table, $searchTerm), ARRAY_A);
    }
    for($index = 0; $index < count($booksResults); $index++){
        $booksResults[$index]['product_url'] = get_permalink($booksResults[$index]['product_url']);
        $booksResults[$index]['product_image_id'] = get_the_post_thumbnail_url($booksResults[$index]['product_image_id']);
    }
    array_push($resultsArr, ...$booksResults);
    if ($hasTriggers == 'yes'){
        $query = 'select distinct b.id, b.title, b.product_image_id, c.productid, f.post_title as pen_name, b.book_description, b.createdate, d.type_name, g.id as product_url, "book" as "resulttype"
        from %i b
        join %i c on b.id = c.bookid
        join %i d on c.typeid = d.id
        left join %i e on b.id = e.bookid
        left join %i f on e.pennameid = f.id
        join %i g on c.productid = g.id
        join %i h on b.id = h.bookid
        where h.languageid in (' . join(', ', $selectedLanguages) . ')
        and b.title like %s
        and b.id not in (select j.bookid from %i j where j.warningid in (' . join(', ', $selectedTriggers) . '))
        and b.islive = 1
        order by b.createdate desc
        limit 200';
        $booksResults = $wpdb->get_results($wpdb->prepare($query, $books_table, $book_products_table, $product_types_table, $pen_names_table, $posts_table, $posts_table, $book_languages_table, '%' . $wpdb->esc_like($searchTerm) . '%', $book_warnings_table), ARRAY_A);
    } else {
        $query = 'select distinct b.id, b.title, b.product_image_id, c.productid, f.post_title as pen_name, b.book_description, b.createdate, d.type_name, g.id as product_url, "book" as "resulttype"
        from %i b
        join %i c on b.id = c.bookid
        join %i d on c.typeid = d.id
        left join %i e on b.id = e.bookid
        left join %i f on e.pennameid = f.id
        join %i g on c.productid = g.id
        join %i h on b.id = h.bookid
        where h.languageid in (' . join(', ', $selectedLanguages) . ')
        and b.title like %s
        and b.islive = 1
        order by b.createdate desc
        limit 200';
        $booksResults = $wpdb->get_results($wpdb->prepare($query, $books_table, $book_products_table, $product_types_table, $pen_names_table, $posts_table, $posts_table, $book_languages_table, '%' . $wpdb->esc_like($searchTerm) . '%'), ARRAY_A);
    }
    for($index = 0; $index < count($booksResults); $index++){
        $booksResults[$index]['product_url'] = get_permalink($booksResults[$index]['product_url']);
        $booksResults[$index]['product_image_id'] = get_the_post_thumbnail_url($booksResults[$index]['product_image_id']);
    }
    array_push($resultsArr, ...$booksResults);
    // //check again for books where the database title record is contained in the search term
    // $fuzzyTitle = 'concat("%", b.title, "%")';
    // if ($hasTriggers == 'yes'){
    //     $query = 'select distinct b.id, b.title, b.product_image_id, c.productid, f.post_title as pen_name, b.book_description, b.createdate, d.type_name, g.id as product_url, "book" as "resulttype"
    //     from %i b
    //     join %i c on b.id = c.bookid
    //     join %i d on c.typeid = d.id
    //     left join %i e on b.id = e.bookid
    //     left join %i f on e.pennameid = f.id
    //     join %i g on c.productid = g.id
    //     join %i h on b.id = h.bookid
    //     where h.languageid in (' . join(', ', $selectedLanguages) . ')
    //     and %s like concat("%%", b.title, "%%")
    //     and b.id not in (select j.bookid from %i j where j.warningid in (' . join(', ', $selectedTriggers) . '))
    //     and b.islive = 1
    //     order by b.createdate desc
    //     limit 200';
    //     $booksResults = $wpdb->get_results($wpdb->prepare($query, $books_table, $book_products_table, $product_types_table, $pen_names_table, $posts_table, $posts_table, $book_languages_table, $searchTerm, $book_warnings_table), ARRAY_A);
    // } else {
    //     $query = 'select distinct b.id, b.title, b.product_image_id, c.productid, f.post_title as pen_name, b.book_description, b.createdate, d.type_name, g.id as product_url, "book" as "resulttype"
    //     from %i b
    //     join %i c on b.id = c.bookid
    //     join %i d on c.typeid = d.id
    //     left join %i e on b.id = e.bookid
    //     left join %i f on e.pennameid = f.id
    //     join %i g on c.productid = g.id
    //     join %i h on b.id = h.bookid
    //     where h.languageid in (' . join(', ', $selectedLanguages) . ')
    //     and %s like concat("%%", b.title, "%%")
    //     and b.islive = 1
    //     order by b.createdate desc
    //     limit 200';
    //     $booksResults = $wpdb->get_results($wpdb->prepare($query, $books_table, $book_products_table, $product_types_table, $pen_names_table, $posts_table, $posts_table, $book_languages_table, $searchTerm), ARRAY_A);
    // }
    // for($index = 0; $index < count($booksResults); $index++){
    //     $booksResults[$index]['product_url'] = get_permalink($booksResults[$index]['product_url']);
    //     $booksResults[$index]['product_image_id'] = get_the_post_thumbnail_url($booksResults[$index]['product_image_id']);
    // }
    // array_push($resultsArr, ...$booksResults);

    //check for title matching search term minus format names
    $shortenedSearchTerm = str_ireplace(" audiobooks", "", $searchTerm);
    $shortenedSearchTerm = str_ireplace(" audiobook", "", $shortenedSearchTerm);
    $shortenedSearchTerm = str_ireplace(" ebooks", "", $shortenedSearchTerm);
    $shortenedSearchTerm = str_ireplace(" ebook", "", $shortenedSearchTerm);
    $shortenedSearchTerm = str_ireplace(" e-books", "", $shortenedSearchTerm);
    $shortenedSearchTerm = str_ireplace(" e-book", "", $shortenedSearchTerm);
    if ($hasTriggers == 'yes'){
        $query = 'select distinct b.id, b.title, b.product_image_id, c.productid, f.post_title as pen_name, b.book_description, b.createdate, d.type_name, g.id as product_url, "book" as "resulttype"
        from %i b
        join %i c on b.id = c.bookid
        join %i d on c.typeid = d.id
        left join %i e on b.id = e.bookid
        left join %i f on e.pennameid = f.id
        join %i g on c.productid = g.id
        join %i h on b.id = h.bookid
        where h.languageid in (' . join(', ', $selectedLanguages) . ')
        and b.title like %s
        and b.id not in (select j.bookid from %i j where j.warningid in (' . join(', ', $selectedTriggers) . '))
        and b.islive = 1
        order by b.createdate desc
        limit 200';
        $booksResults = $wpdb->get_results($wpdb->prepare($query, $books_table, $book_products_table, $product_types_table, $pen_names_table, $posts_table, $posts_table, $book_languages_table, '%' . $wpdb->esc_like($shortenedSearchTerm) . '%', $book_warnings_table), ARRAY_A);
    } else {
        $query = 'select distinct b.id, b.title, b.product_image_id, c.productid, f.post_title as pen_name, b.book_description, b.createdate, d.type_name, g.id as product_url, "book" as "resulttype"
        from %i b
        join %i c on b.id = c.bookid
        join %i d on c.typeid = d.id
        left join %i e on b.id = e.bookid
        left join %i f on e.pennameid = f.id
        join %i g on c.productid = g.id
        join %i h on b.id = h.bookid
        where h.languageid in (' . join(', ', $selectedLanguages) . ')
        and b.title like %s
        and b.islive = 1
        order by b.createdate desc
        limit 200';
        $booksResults = $wpdb->get_results($wpdb->prepare($query, $books_table, $book_products_table, $product_types_table, $pen_names_table, $posts_table, $posts_table, $book_languages_table, '%' . $wpdb->esc_like($shortenedSearchTerm) . '%'), ARRAY_A);
    }
    for($index = 0; $index < count($booksResults); $index++){
        $booksResults[$index]['product_url'] = get_permalink($booksResults[$index]['product_url']);
        $booksResults[$index]['product_image_id'] = get_the_post_thumbnail_url($booksResults[$index]['product_image_id']);
    }
    array_push($resultsArr, ...$booksResults);
    // //then check for books where the search term appears in the description
    if ($hasTriggers == 'yes'){
        $query = 'select distinct b.id, b.title, b.product_image_id, c.productid, f.post_title as pen_name, b.book_description, b.createdate, d.type_name, g.id as product_url, "book" as "resulttype"
        from %i b
        join %i c on b.id = c.bookid
        join %i d on c.typeid = d.id
        left join %i e on b.id = e.bookid
        left join %i f on e.pennameid = f.id
        join %i g on c.productid = g.id
        join %i h on b.id = h.bookid
        where h.languageid in (' . join(', ', $selectedLanguages) . ')
        and b.book_description like %s
        and b.id not in (select j.bookid from %i j where j.warningid in (' . join(', ', $selectedTriggers) . '))
        and b.islive = 1
        order by b.createdate desc
        limit 200';
        $booksResults = $wpdb->get_results($wpdb->prepare($query, $books_table, $book_products_table, $product_types_table, $pen_names_table, $posts_table, $posts_table, $book_languages_table, '%' . $wpdb->esc_like($searchTerm) . '%', $book_warnings_table), ARRAY_A);
    } else {
        $query = 'select distinct b.id, b.title, b.product_image_id, c.productid, f.post_title as pen_name, b.book_description, b.createdate, d.type_name, g.id as product_url, "book" as "resulttype"
        from %i b
        join %i c on b.id = c.bookid
        join %i d on c.typeid = d.id
        left join %i e on b.id = e.bookid
        left join %i f on e.pennameid = f.id
        join %i g on c.productid = g.id
        join %i h on b.id = h.bookid
        where h.languageid in (' . join(', ', $selectedLanguages) . ')
        and b.book_description like %s
        and b.islive = 1
        order by b.createdate desc
        limit 200';
        $booksResults = $wpdb->get_results($wpdb->prepare($query, $books_table, $book_products_table, $product_types_table, $pen_names_table, $posts_table, $posts_table, $book_languages_table, '%' . $wpdb->esc_like($searchTerm) . '%'), ARRAY_A);
    }
    for($index = 0; $index < count($booksResults); $index++){
        $booksResults[$index]['product_url'] = get_permalink($booksResults[$index]['product_url']);
        $booksResults[$index]['product_image_id'] = get_the_post_thumbnail_url($booksResults[$index]['product_image_id']);
    }
    array_push($resultsArr, ...$booksResults);
    // //then check for books where the search term appears in the excerpt
    if ($hasTriggers == 'yes'){
        $query = 'select distinct b.id, b.title, b.product_image_id, c.productid, f.post_title as pen_name, b.book_description, b.createdate, d.type_name, g.id as product_url, "book" as "resulttype"
        from %i b
        join %i c on b.id = c.bookid
        join %i d on c.typeid = d.id
        left join %i e on b.id = e.bookid
        left join %i f on e.pennameid = f.id
        join %i g on c.productid = g.id
        join %i h on b.id = h.bookid
        where h.languageid in (' . join(', ', $selectedLanguages) . ')
        and b.book_excerpt like %s
        and b.id not in (select j.bookid from %i j where j.warningid in (' . join(', ', $selectedTriggers) . '))
        and b.islive = 1
        order by b.createdate desc
        limit 200';
        $booksResults = $wpdb->get_results($wpdb->prepare($query, $books_table, $book_products_table, $product_types_table, $pen_names_table, $posts_table, $posts_table, $book_languages_table, '%' . $wpdb->esc_like($searchTerm) . '%', $book_warnings_table), ARRAY_A);
    } else {
        $query = 'select distinct b.id, b.title, b.product_image_id, c.productid, f.post_title as pen_name, b.book_description, b.createdate, d.type_name, g.id as product_url, "book" as "resulttype"
        from %i b
        join %i c on b.id = c.bookid
        join %i d on c.typeid = d.id
        left join %i e on b.id = e.bookid
        left join %i f on e.pennameid = f.id
        join %i g on c.productid = g.id
        join %i h on b.id = h.bookid
        where h.languageid in (' . join(', ', $selectedLanguages) . ')
        and b.book_excerpt like %s
        and b.islive = 1
        order by b.createdate desc
        limit 200';
        $booksResults = $wpdb->get_results($wpdb->prepare($query, $books_table, $book_products_table, $product_types_table, $pen_names_table, $posts_table, $posts_table, $book_languages_table, '%' . $wpdb->esc_like($searchTerm) . '%'), ARRAY_A);
    }
    for($index = 0; $index < count($booksResults); $index++){
        $booksResults[$index]['product_url'] = get_permalink($booksResults[$index]['product_url']);
        $booksResults[$index]['product_image_id'] = get_the_post_thumbnail_url($booksResults[$index]['product_image_id']);
    }
    array_push($resultsArr, ...$booksResults);

    $query = 'select distinct post.id, post.post_title as pen_name, post.id as author_url, "author" as "resulttype"
    from %i post
    where post.post_title like %s
    and post.post_status = "publish"
    and post.post_type = "author-profile"
    limit 100';
    $authorResults = $wpdb->get_results($wpdb->prepare($query, $posts_table, '%' . $wpdb->esc_like($searchTerm) . '%'), ARRAY_A);
    for($index = 0; $index < count($authorResults); $index++){
        $authorResults[$index]['author_url'] = get_permalink($authorResults[$index]['author_url']);
    }
    array_push($resultsArr, ...$authorResults);

    // //check again for author name where search term is like database pen name record
    // //and add JS to check for already-included authors

    //first check for genre books about identity?
    if (str_contains(strtoupper($searchTerm), 'ABOUT')){
        if ($hasTriggers == 'yes'){
            $query = 'select distinct b.id, b.title, b.product_image_id, c.productid, f.post_title as pen_name, b.book_description, b.createdate, d.type_name, g.id as product_url, "genreIdentity" as "resulttype", l.genre_name, zz.identity_name
            from %i b
            join %i c on b.id = c.bookid
            join %i d on c.typeid = d.id
            left join %i e on b.id = e.bookid
            left join %i f on e.pennameid = f.id
            join %i g on c.productid = g.id
            join %i h on b.id = h.bookid
            join %i z on b.id = z.bookid
            join %i zz on z.identityid = zz.id
            join %i k on b.id = k.bookid
            join %i l on k.genreid = l.id
            where h.languageid in (' . join(', ', $selectedLanguages) . ')
            and concat(l.genre_name, " about ", zz.identity_name) like %s
            and b.id not in (select j.bookid from %i j where j.warningid in (' . join(', ', $selectedTriggers) . '))
            and b.islive = 1
            order by b.createdate desc
            limit 50';
            $booksResults = $wpdb->get_results($wpdb->prepare($query, $books_table, $book_products_table, $product_types_table, $pen_names_table, $posts_table, $posts_table, $book_languages_table, $book_identities_table, $identities_table, $book_genres_table, $genres_table, '%' . $wpdb->esc_like($searchTerm) . '%', $book_warnings_table), ARRAY_A);
        } else {
            $query = 'select distinct b.id, b.title, b.product_image_id, c.productid, f.post_title as pen_name, b.book_description, b.createdate, d.type_name, g.id as product_url, "genreIdentity" as "resulttype", l.genre_name, zz.identity_name
            from %i b
            join %i c on b.id = c.bookid
            join %i d on c.typeid = d.id
            left join %i e on b.id = e.bookid
            left join %i f on e.pennameid = f.id
            join %i g on c.productid = g.id
            join %i h on b.id = h.bookid            
            join %i z on b.id = z.bookid
            join %i zz on z.identityid = zz.id
            join %i k on b.id = k.bookid
            join %i l on k.genreid = l.id
            where h.languageid in (' . join(', ', $selectedLanguages) . ')
            and concat(l.genre_name, " about ", zz.identity_name) like %s
            and b.islive = 1
            order by b.createdate desc
            limit 50';
            $booksResults = $wpdb->get_results($wpdb->prepare($query, $books_table, $book_products_table, $product_types_table, $pen_names_table, $posts_table, $posts_table, $book_languages_table, $book_identities_table, $identities_table, $book_genres_table, $genres_table, '%' . $wpdb->esc_like($searchTerm) . '%'), ARRAY_A);
        }
        for($index = 0; $index < count($booksResults); $index++){
            $booksResults[$index]['product_url'] = get_permalink($booksResults[$index]['product_url']);
            $booksResults[$index]['product_image_id'] = get_the_post_thumbnail_url($booksResults[$index]['product_image_id']);
        }
        array_push($resultsArr, ...$booksResults);
    }
    //genres
    if ($hasTriggers == 'yes'){
        $query = 'select distinct b.id, b.title, b.product_image_id, c.productid, f.post_title as pen_name, b.book_description, b.createdate, d.type_name, g.id as product_url, "genrebooks" as "resulttype"
        from %i b
        join %i c on b.id = c.bookid
        join %i d on c.typeid = d.id
        left join %i e on b.id = e.bookid
        left join %i f on e.pennameid = f.id
        join %i g on c.productid = g.id
        join %i h on b.id = h.bookid
        join %i k on b.id = k.bookid
        join %i l on k.genreid = l.id
        where h.languageid in (' . join(', ', $selectedLanguages) . ')
        and l.genre_name = %s
        and b.id not in (select j.bookid from %i j where j.warningid in (' . join(', ', $selectedTriggers) . '))
        and b.islive = 1
        order by b.createdate desc
        limit 20';
        $genreResults = $wpdb->get_results($wpdb->prepare($query, $books_table, $book_products_table, $product_types_table, $pen_names_table, $posts_table, $posts_table, $book_languages_table, $book_genres_table, $genres_table, $searchTerm, $book_warnings_table), ARRAY_A);
    } else {
        $query = 'select distinct b.id, b.title, b.product_image_id, c.productid, f.post_title as pen_name, b.book_description, b.createdate, d.type_name, g.id as product_url, "genrebooks" as "resulttype"
        from %i b
        join %i c on b.id = c.bookid
        join %i d on c.typeid = d.id
        left join %i e on b.id = e.bookid
        left join %i f on e.pennameid = f.id
        join %i g on c.productid = g.id
        join %i h on b.id = h.bookid
        join %i k on b.id = k.bookid
        join %i l on k.genreid = l.id
        where h.languageid in (' . join(', ', $selectedLanguages) . ')
        and l.genre_name = %s
        and b.islive = 1
        order by b.createdate desc
        limit 20';
        $genreResults = $wpdb->get_results($wpdb->prepare($query, $books_table, $book_products_table, $product_types_table, $pen_names_table, $posts_table, $posts_table, $book_languages_table, $book_genres_table, $genres_table, $searchTerm), ARRAY_A);
    }
    for($index = 0; $index < count($genreResults); $index++){
        $genreResults[$index]['product_url'] = get_permalink($genreResults[$index]['product_url']);
        $genreResults[$index]['product_image_id'] = get_the_post_thumbnail_url($genreResults[$index]['product_image_id']);
    }
    array_push($resultsArr, ...$genreResults);
//identities (exact match)
    if ($hasTriggers == 'yes'){
        $query = 'select distinct b.id, b.title, b.product_image_id, c.productid, f.post_title as pen_name, b.book_description, b.createdate, d.type_name, g.id as product_url, "identitybooks" as "resulttype", l.identity_name
        from %i b
        join %i c on b.id = c.bookid
        join %i d on c.typeid = d.id
        left join %i e on b.id = e.bookid
        left join %i f on e.pennameid = f.id
        join %i g on c.productid = g.id
        join %i h on b.id = h.bookid
        join %i k on b.id = k.bookid
        join %i l on k.identityid = l.id
        where h.languageid in (' . join(', ', $selectedLanguages) . ')
        and l.identity_name = %s
        and b.id not in (select j.bookid from %i j where j.warningid in (' . join(', ', $selectedTriggers) . '))
        and b.islive = 1
        order by b.createdate desc
        limit 20';
        $identityResults = $wpdb->get_results($wpdb->prepare($query, $books_table, $book_products_table, $product_types_table, $pen_names_table, $posts_table, $posts_table, $book_languages_table, $book_identities_table, $identities_table, $searchTerm, $book_warnings_table), ARRAY_A);
    } else {
        $query = 'select distinct b.id, b.title, b.product_image_id, c.productid, f.post_title as pen_name, b.book_description, b.createdate, d.type_name, g.id as product_url, "identitybooks" as "resulttype", l.identity_name
        from %i b
        join %i c on b.id = c.bookid
        join %i d on c.typeid = d.id
        left join %i e on b.id = e.bookid
        left join %i f on e.pennameid = f.id
        join %i g on c.productid = g.id
        join %i h on b.id = h.bookid
        join %i k on b.id = k.bookid
        join %i l on k.identityid = l.id
        where h.languageid in (' . join(', ', $selectedLanguages) . ')
        and l.identity_name = %s
        and b.islive = 1
        order by b.createdate desc
        limit 20';
        $identityResults = $wpdb->get_results($wpdb->prepare($query, $books_table, $book_products_table, $product_types_table, $pen_names_table, $posts_table, $posts_table, $book_languages_table, $book_identities_table, $identities_table, $searchTerm), ARRAY_A);
    }
    for($index = 0; $index < count($identityResults); $index++){
        $identityResults[$index]['product_url'] = get_permalink($identityResults[$index]['product_url']);
        $identityResults[$index]['product_image_id'] = get_the_post_thumbnail_url($identityResults[$index]['product_image_id']);
    }
    array_push($resultsArr, ...$identityResults);
    //identities (partial match)
    if ($hasTriggers == 'yes'){
        $query = 'select distinct b.id, b.title, b.product_image_id, c.productid, f.post_title as pen_name, b.book_description, b.createdate, d.type_name, g.id as product_url, "identitybooks" as "resulttype", l.identity_name
        from %i b
        join %i c on b.id = c.bookid
        join %i d on c.typeid = d.id
        left join %i e on b.id = e.bookid
        left join %i f on e.pennameid = f.id
        join %i g on c.productid = g.id
        join %i h on b.id = h.bookid
        join %i k on b.id = k.bookid
        join %i l on k.identityid = l.id
        where h.languageid in (' . join(', ', $selectedLanguages) . ')
        and l.identity_name like %s
        and b.id not in (select j.bookid from %i j where j.warningid in (' . join(', ', $selectedTriggers) . '))
        and b.islive = 1
        order by b.createdate desc
        limit 20';
        $identityResults = $wpdb->get_results($wpdb->prepare($query, $books_table, $book_products_table, $product_types_table, $pen_names_table, $posts_table, $posts_table, $book_languages_table, $book_identities_table, $identities_table, '%' . $wpdb->esc_like($searchTerm) . '%', $book_warnings_table), ARRAY_A);
    } else {
        $query = 'select distinct b.id, b.title, b.product_image_id, c.productid, f.post_title as pen_name, b.book_description, b.createdate, d.type_name, g.id as product_url, "identitybooks" as "resulttype", l.identity_name
        from %i b
        join %i c on b.id = c.bookid
        join %i d on c.typeid = d.id
        left join %i e on b.id = e.bookid
        left join %i f on e.pennameid = f.id
        join %i g on c.productid = g.id
        join %i h on b.id = h.bookid
        join %i k on b.id = k.bookid
        join %i l on k.identityid = l.id
        where h.languageid in (' . join(', ', $selectedLanguages) . ')
        and l.identity_name like %s
        and b.islive = 1
        order by b.createdate desc
        limit 20';
        $identityResults = $wpdb->get_results($wpdb->prepare($query, $books_table, $book_products_table, $product_types_table, $pen_names_table, $posts_table, $posts_table, $book_languages_table, $book_identities_table, $identities_table, '%' . $wpdb->esc_like($searchTerm) . '%'), ARRAY_A);
    }
    for($index = 0; $index < count($identityResults); $index++){
        $identityResults[$index]['product_url'] = get_permalink($identityResults[$index]['product_url']);
        $identityResults[$index]['product_image_id'] = get_the_post_thumbnail_url($identityResults[$index]['product_image_id']);
    }
    array_push($resultsArr, ...$identityResults);
    //readalikes
    if ($hasTriggers == 'yes'){
        $query = 'select distinct b.id, b.title, b.product_image_id, c.productid, f.post_title as pen_name, b.book_description, b.createdate, d.type_name, g.id as product_url, "readalikebooks" as "resulttype", k.readalike_author, k.readalike_title
        from %i b
        join %i c on b.id = c.bookid
        join %i d on c.typeid = d.id
        left join %i e on b.id = e.bookid
        left join %i f on e.pennameid = f.id
        join %i g on c.productid = g.id
        join %i h on b.id = h.bookid
        join %i k on b.id = k.bookid
        where h.languageid in (' . join(', ', $selectedLanguages) . ')
        and k.readalike_title like %s
        and b.id not in (select j.bookid from %i j where j.warningid in (' . join(', ', $selectedTriggers) . '))
        and b.islive = 1
        order by b.createdate desc
        limit 10';
        $readalikeResults = $wpdb->get_results($wpdb->prepare($query, $books_table, $book_products_table, $product_types_table, $pen_names_table, $posts_table, $posts_table, $book_languages_table, $readalikes_table, '%' . $wpdb->esc_like($searchTerm) . '%', $book_warnings_table), ARRAY_A);
    } else {
        $query = 'select distinct b.id, b.title, b.product_image_id, c.productid, f.post_title as pen_name, b.book_description, b.createdate, d.type_name, g.id as product_url, "readalikebooks" as "resulttype", k.readalike_author, k.readalike_title
        from %i b
        join %i c on b.id = c.bookid
        join %i d on c.typeid = d.id
        left join %i e on b.id = e.bookid
        left join %i f on e.pennameid = f.id
        join %i g on c.productid = g.id
        join %i h on b.id = h.bookid
        join %i k on b.id = k.bookid
        where h.languageid in (' . join(', ', $selectedLanguages) . ')
        and k.readalike_title like %s
        and b.islive = 1
        order by b.createdate desc
        limit 10';
        $readalikeResults = $wpdb->get_results($wpdb->prepare($query, $books_table, $book_products_table, $product_types_table, $pen_names_table, $posts_table, $posts_table, $book_languages_table, $readalikes_table, '%' . $wpdb->esc_like($searchTerm) . '%'), ARRAY_A);
    }
    for($index = 0; $index < count($readalikeResults); $index++){
        $readalikeResults[$index]['product_url'] = get_permalink($readalikeResults[$index]['product_url']);
        $readalikeResults[$index]['product_image_id'] = get_the_post_thumbnail_url($readalikeResults[$index]['product_image_id']);
    }
    array_push($resultsArr, ...$readalikeResults);
    //include a readalike check with title and author name split if the search term contains "by"
    if (str_contains(strtoupper($searchTerm), 'BY')){
        if ($hasTriggers == 'yes'){
            $query = 'select distinct b.id, b.title, b.product_image_id, c.productid, f.post_title as pen_name, b.book_description, b.createdate, d.type_name, g.id as product_url, "readalikebooks" as "resulttype", k.readalike_author, k.readalike_title
            from %i b
            join %i c on b.id = c.bookid
            join %i d on c.typeid = d.id
            left join %i e on b.id = e.bookid
            left join %i f on e.pennameid = f.id
            join %i g on c.productid = g.id
            join %i h on b.id = h.bookid
            join %i k on b.id = k.bookid
            where h.languageid in (' . join(', ', $selectedLanguages) . ')
            and concat(k.readalike_title, " by ", k.readalike_author) like %s
            and b.id not in (select j.bookid from %i j where j.warningid in (' . join(', ', $selectedTriggers) . '))
            and b.islive = 1
            order by b.createdate desc
            limit 20';
            $booksResults = $wpdb->get_results($wpdb->prepare($query, $books_table, $book_products_table, $product_types_table, $pen_names_table, $posts_table, $posts_table, $book_languages_table, $readalikes_table, '%' . $wpdb->esc_like($searchTerm) . '%', $book_warnings_table), ARRAY_A);
        } else {
            $query = 'select distinct b.id, b.title, b.product_image_id, c.productid, f.post_title as pen_name, b.book_description, b.createdate, d.type_name, g.id as product_url, "readalikebooks" as "resulttype", k.readalike_author, k.readalike_title
            from %i b
            join %i c on b.id = c.bookid
            join %i d on c.typeid = d.id
            left join %i e on b.id = e.bookid
            left join %i f on e.pennameid = f.id
            join %i g on c.productid = g.id
            join %i h on b.id = h.bookid         
            join %i k on b.id = k.bookid
            where h.languageid in (' . join(', ', $selectedLanguages) . ')
            and concat(k.readalike_title, " by ", k.readalike_author) like %s
            and b.islive = 1
            order by b.createdate desc
            limit 20';
            $booksResults = $wpdb->get_results($wpdb->prepare($query, $books_table, $book_products_table, $product_types_table, $pen_names_table, $posts_table, $posts_table, $book_languages_table, $readalikes_table, '%' . $wpdb->esc_like($searchTerm) . '%'), ARRAY_A);
        }
        for($index = 0; $index < count($booksResults); $index++){
            $booksResults[$index]['product_url'] = get_permalink($booksResults[$index]['product_url']);
            $booksResults[$index]['product_image_id'] = get_the_post_thumbnail_url($booksResults[$index]['product_image_id']);
        }
        array_push($resultsArr, ...$booksResults);
    }
    return $resultsArr;
    // return $wpdb->prepare($query, $books_table, $book_products_table, $product_types_table, $pen_names_table, $posts_table, $posts_table, $book_languages_table, $readalikes_table, '%' . $wpdb->esc_like($searchTerm) . '%', $book_warnings_table);
}

function searchWithoutLanguages($data) {
    $resultsArr = [];
    $searchTerm = sanitize_text_field($data['searchterm']);
    $selectedTriggers = explode(',', trim(sanitize_text_field($data['triggers']), '[]'));
    $hasTriggers = sanitize_text_field($data['hasTriggers']);
    $user = wp_get_current_user();
    global $wpdb;
    $books_table = $wpdb->prefix . "tomc_books";
    $book_genres_table = $wpdb->prefix .  "tomc_book_genres";
    $genres_table = $wpdb->prefix . "tomc_genres";
    $book_products_table = $wpdb->prefix . "tomc_book_products";
    $posts_table = $wpdb->prefix . "posts";
    $product_types_table = $wpdb->prefix . "tomc_product_types";
    $pen_names_table = $wpdb->prefix . "tomc_pen_names_books";
    $book_languages_table = $wpdb->prefix . "tomc_book_languages";
    $book_warnings_table = $wpdb->prefix . "tomc_book_warnings";
    $book_identities_table = $wpdb->prefix . "tomc_book_identities";
    $identities_table = $wpdb->prefix . "tomc_character_identities";
    $readalikes_table = $wpdb->prefix . "tomc_book_readalikes";

    //first, if the search term contains "by", check for a book with title and author name
    if (str_contains(strtoupper($searchTerm), 'BY')){
        if ($hasTriggers == 'yes'){
            $query = 'select distinct b.id, b.title, b.product_image_id, c.productid, f.post_title as pen_name, b.book_description, b.createdate, d.type_name, g.id as product_url, "book" as "resulttype"
            from %i b
            join %i c on b.id = c.bookid
            join %i d on c.typeid = d.id
            left join %i e on b.id = e.bookid
            left join %i f on e.pennameid = f.id
            join %i g on c.productid = g.id
            where concat(b.title, " by ", f.post_title) like %s
            and b.id not in (select j.bookid from %i j where j.warningid in (' . join(', ', $selectedTriggers) . '))
            and b.islive = 1
            order by b.createdate desc
            limit 200';
            $booksResults = $wpdb->get_results($wpdb->prepare($query, $books_table, $book_products_table, $product_types_table, $pen_names_table, $posts_table, $posts_table, '%' . $wpdb->esc_like($searchTerm) . '%', $book_warnings_table), ARRAY_A);
        } else {
            $query = 'select distinct b.id, b.title, b.product_image_id, c.productid, f.post_title as pen_name, b.book_description, b.createdate, d.type_name, g.id as product_url, "book" as "resulttype"
            from %i b
            join %i c on b.id = c.bookid
            join %i d on c.typeid = d.id
            left join %i e on b.id = e.bookid
            left join %i f on e.pennameid = f.id
            join %i g on c.productid = g.id
            where concat(b.title, " by ", f.post_title) like %s
            and b.islive = 1
            order by b.createdate desc
            limit 200';
            $booksResults = $wpdb->get_results($wpdb->prepare($query, $books_table, $book_products_table, $product_types_table, $pen_names_table, $posts_table, $posts_table, '%' . $wpdb->esc_like($searchTerm) . '%'), ARRAY_A);
        }
        for($index = 0; $index < count($booksResults); $index++){
            $booksResults[$index]['product_url'] = get_permalink($booksResults[$index]['product_url']);
            $booksResults[$index]['product_image_id'] = get_the_post_thumbnail_url($booksResults[$index]['product_image_id']);
        }
        array_push($resultsArr, ...$booksResults);
    }
    //checking for title
    if ($hasTriggers == 'yes'){
        $query = 'select distinct b.id, b.title, b.product_image_id, c.productid, f.post_title as pen_name, b.book_description, b.createdate, d.type_name, g.id as product_url, "book" as "resulttype"
        from %i b
        join %i c on b.id = c.bookid
        join %i d on c.typeid = d.id
        left join %i e on b.id = e.bookid
        left join %i f on e.pennameid = f.id
        join %i g on c.productid = g.id
        where b.title like %s
        and b.id not in (select j.bookid from %i j where j.warningid in (' . join(', ', $selectedTriggers) . '))
        and b.islive = 1
        order by b.createdate desc
        limit 200';
        $booksResults = $wpdb->get_results($wpdb->prepare($query, $books_table, $book_products_table, $product_types_table, $pen_names_table, $posts_table, $posts_table, '%' . $wpdb->esc_like($searchTerm) . '%', $book_warnings_table), ARRAY_A);
    } else {
        $query = 'select distinct b.id, b.title, b.product_image_id, c.productid, f.post_title as pen_name, b.book_description, b.createdate, d.type_name, g.id as product_url, "book" as "resulttype"
        from %i b
        join %i c on b.id = c.bookid
        join %i d on c.typeid = d.id
        left join %i e on b.id = e.bookid
        left join %i f on e.pennameid = f.id
        join %i g on c.productid = g.id
        where b.title like %s
        and b.islive = 1
        order by b.createdate desc
        limit 200';
        $booksResults = $wpdb->get_results($wpdb->prepare($query, $books_table, $book_products_table, $product_types_table, $pen_names_table, $posts_table, $posts_table, '%' . $wpdb->esc_like($searchTerm) . '%'), ARRAY_A);
    }
    for($index = 0; $index < count($booksResults); $index++){
        $booksResults[$index]['product_url'] = get_permalink($booksResults[$index]['product_url']);
        $booksResults[$index]['product_image_id'] = get_the_post_thumbnail_url($booksResults[$index]['product_image_id']);
    }
    array_push($resultsArr, ...$booksResults);
    // //check again for books where the database title record is contained in the search term
    // $fuzzyTitle = 'concat("%", b.title, "%")';
    // if ($hasTriggers == 'yes'){
    //     $query = 'select distinct b.id, b.title, b.product_image_id, c.productid, f.post_title as pen_name, b.book_description, b.createdate, d.type_name, g.id as product_url, "book" as "resulttype"
    //     from %i b
    //     join %i c on b.id = c.bookid
    //     join %i d on c.typeid = d.id
    //     left join %i e on b.id = e.bookid
    //     left join %i f on e.pennameid = f.id
    //     join %i g on c.productid = g.id
    //     where %s like concat("%%", b.title, "%%")
    //     and b.id not in (select j.bookid from %i j where j.warningid in (' . join(', ', $selectedTriggers) . '))
    //     and b.islive = 1
    //     order by b.createdate desc
    //     limit 200';
    //     $booksResults = $wpdb->get_results($wpdb->prepare($query, $books_table, $book_products_table, $product_types_table, $pen_names_table, $posts_table, $posts_table, $searchTerm, $book_warnings_table), ARRAY_A);
    // } else {
    //     $query = 'select distinct b.id, b.title, b.product_image_id, c.productid, f.post_title as pen_name, b.book_description, b.createdate, d.type_name, g.id as product_url, "book" as "resulttype"
    //     from %i b
    //     join %i c on b.id = c.bookid
    //     join %i d on c.typeid = d.id
    //     left join %i e on b.id = e.bookid
    //     left join %i f on e.pennameid = f.id
    //     join %i g on c.productid = g.id
    //     where %s like concat("%%", b.title, "%%")
    //     and b.islive = 1
    //     order by b.createdate desc
    //     limit 200';
    //     $booksResults = $wpdb->get_results($wpdb->prepare($query, $books_table, $book_products_table, $product_types_table, $pen_names_table, $posts_table, $posts_table, $searchTerm), ARRAY_A);
    // }
    // for($index = 0; $index < count($booksResults); $index++){
    //     $booksResults[$index]['product_url'] = get_permalink($booksResults[$index]['product_url']);
    //     $booksResults[$index]['product_image_id'] = get_the_post_thumbnail_url($booksResults[$index]['product_image_id']);
    // }
    // array_push($resultsArr, ...$booksResults);

    //check for title matching search term minus format names
    $shortenedSearchTerm = str_ireplace(" audiobooks", "", $searchTerm);
    $shortenedSearchTerm = str_ireplace(" audiobook", "", $shortenedSearchTerm);
    $shortenedSearchTerm = str_ireplace(" ebooks", "", $shortenedSearchTerm);
    $shortenedSearchTerm = str_ireplace(" ebook", "", $shortenedSearchTerm);
    $shortenedSearchTerm = str_ireplace(" e-books", "", $shortenedSearchTerm);
    $shortenedSearchTerm = str_ireplace(" e-book", "", $shortenedSearchTerm);
    if ($hasTriggers == 'yes'){
        $query = 'select distinct b.id, b.title, b.product_image_id, c.productid, f.post_title as pen_name, b.book_description, b.createdate, d.type_name, g.id as product_url, "book" as "resulttype"
        from %i b
        join %i c on b.id = c.bookid
        join %i d on c.typeid = d.id
        left join %i e on b.id = e.bookid
        left join %i f on e.pennameid = f.id
        join %i g on c.productid = g.id
        where b.title like %s
        and b.id not in (select j.bookid from %i j where j.warningid in (' . join(', ', $selectedTriggers) . '))
        and b.islive = 1
        order by b.createdate desc
        limit 200';
        $booksResults = $wpdb->get_results($wpdb->prepare($query, $books_table, $book_products_table, $product_types_table, $pen_names_table, $posts_table, $posts_table, '%' . $wpdb->esc_like($shortenedSearchTerm) . '%', $book_warnings_table), ARRAY_A);
    } else {
        $query = 'select distinct b.id, b.title, b.product_image_id, c.productid, f.post_title as pen_name, b.book_description, b.createdate, d.type_name, g.id as product_url, "book" as "resulttype"
        from %i b
        join %i c on b.id = c.bookid
        join %i d on c.typeid = d.id
        left join %i e on b.id = e.bookid
        left join %i f on e.pennameid = f.id
        join %i g on c.productid = g.id
        where b.title like %s
        and b.islive = 1
        order by b.createdate desc
        limit 200';
        $booksResults = $wpdb->get_results($wpdb->prepare($query, $books_table, $book_products_table, $product_types_table, $pen_names_table, $posts_table, $posts_table, '%' . $wpdb->esc_like($shortenedSearchTerm) . '%'), ARRAY_A);
    }
    for($index = 0; $index < count($booksResults); $index++){
        $booksResults[$index]['product_url'] = get_permalink($booksResults[$index]['product_url']);
        $booksResults[$index]['product_image_id'] = get_the_post_thumbnail_url($booksResults[$index]['product_image_id']);
    }
    array_push($resultsArr, ...$booksResults);
    // //then check for books where the search term appears in the description
    if ($hasTriggers == 'yes'){
        $query = 'select distinct b.id, b.title, b.product_image_id, c.productid, f.post_title as pen_name, b.book_description, b.createdate, d.type_name, g.id as product_url, "book" as "resulttype"
        from %i b
        join %i c on b.id = c.bookid
        join %i d on c.typeid = d.id
        left join %i e on b.id = e.bookid
        left join %i f on e.pennameid = f.id
        join %i g on c.productid = g.id
        where b.book_description like %s
        and b.id not in (select j.bookid from %i j where j.warningid in (' . join(', ', $selectedTriggers) . '))
        and b.islive = 1
        order by b.createdate desc
        limit 200';
        $booksResults = $wpdb->get_results($wpdb->prepare($query, $books_table, $book_products_table, $product_types_table, $pen_names_table, $posts_table, $posts_table, '%' . $wpdb->esc_like($searchTerm) . '%', $book_warnings_table), ARRAY_A);
    } else {
        $query = 'select distinct b.id, b.title, b.product_image_id, c.productid, f.post_title as pen_name, b.book_description, b.createdate, d.type_name, g.id as product_url, "book" as "resulttype"
        from %i b
        join %i c on b.id = c.bookid
        join %i d on c.typeid = d.id
        left join %i e on b.id = e.bookid
        left join %i f on e.pennameid = f.id
        join %i g on c.productid = g.id
        where b.book_description like %s
        and b.islive = 1
        order by b.createdate desc
        limit 200';
        $booksResults = $wpdb->get_results($wpdb->prepare($query, $books_table, $book_products_table, $product_types_table, $pen_names_table, $posts_table, $posts_table, '%' . $wpdb->esc_like($searchTerm) . '%'), ARRAY_A);
    }
    for($index = 0; $index < count($booksResults); $index++){
        $booksResults[$index]['product_url'] = get_permalink($booksResults[$index]['product_url']);
        $booksResults[$index]['product_image_id'] = get_the_post_thumbnail_url($booksResults[$index]['product_image_id']);
    }
    array_push($resultsArr, ...$booksResults);
    // //then check for books where the search term appears in the excerpt
    if ($hasTriggers == 'yes'){
        $query = 'select distinct b.id, b.title, b.product_image_id, c.productid, f.post_title as pen_name, b.book_description, b.createdate, d.type_name, g.id as product_url, "book" as "resulttype"
        from %i b
        join %i c on b.id = c.bookid
        join %i d on c.typeid = d.id
        left join %i e on b.id = e.bookid
        left join %i f on e.pennameid = f.id
        join %i g on c.productid = g.id
        where b.book_excerpt like %s
        and b.id not in (select j.bookid from %i j where j.warningid in (' . join(', ', $selectedTriggers) . '))
        and b.islive = 1
        order by b.createdate desc
        limit 200';
        $booksResults = $wpdb->get_results($wpdb->prepare($query, $books_table, $book_products_table, $product_types_table, $pen_names_table, $posts_table, $posts_table, '%' . $wpdb->esc_like($searchTerm) . '%', $book_warnings_table), ARRAY_A);
    } else {
        $query = 'select distinct b.id, b.title, b.product_image_id, c.productid, f.post_title as pen_name, b.book_description, b.createdate, d.type_name, g.id as product_url, "book" as "resulttype"
        from %i b
        join %i c on b.id = c.bookid
        join %i d on c.typeid = d.id
        left join %i e on b.id = e.bookid
        left join %i f on e.pennameid = f.id
        join %i g on c.productid = g.id
        where b.book_excerpt like %s
        and b.islive = 1
        order by b.createdate desc
        limit 200';
        $booksResults = $wpdb->get_results($wpdb->prepare($query, $books_table, $book_products_table, $product_types_table, $pen_names_table, $posts_table, $posts_table, '%' . $wpdb->esc_like($searchTerm) . '%'), ARRAY_A);
    }
    for($index = 0; $index < count($booksResults); $index++){
        $booksResults[$index]['product_url'] = get_permalink($booksResults[$index]['product_url']);
        $booksResults[$index]['product_image_id'] = get_the_post_thumbnail_url($booksResults[$index]['product_image_id']);
    }
    array_push($resultsArr, ...$booksResults);

    $query = 'select distinct post.id, post.post_title as pen_name, post.id as author_url, "author" as "resulttype"
    from %i post
    where post.post_title like %s
    and post.post_status = "publish"
    and post.post_type = "author-profile"
    limit 100';
    $authorResults = $wpdb->get_results($wpdb->prepare($query, $posts_table, '%' . $wpdb->esc_like($searchTerm) . '%'), ARRAY_A);
    for($index = 0; $index < count($authorResults); $index++){
        $authorResults[$index]['author_url'] = get_permalink($authorResults[$index]['author_url']);
    }
    array_push($resultsArr, ...$authorResults);

    // //check again for author name where search term is like database pen name record
    // //and add JS to check for already-included authors

    //first check for genre books about identity?
    if (str_contains(strtoupper($searchTerm), 'ABOUT')){
        if ($hasTriggers == 'yes'){
            $query = 'select distinct b.id, b.title, b.product_image_id, c.productid, f.post_title as pen_name, b.book_description, b.createdate, d.type_name, g.id as product_url, "genreIdentity" as "resulttype", l.genre_name, zz.identity_name
            from %i b
            join %i c on b.id = c.bookid
            join %i d on c.typeid = d.id
            left join %i e on b.id = e.bookid
            left join %i f on e.pennameid = f.id
            join %i g on c.productid = g.id
            join %i z on b.id = z.bookid
            join %i zz on z.identityid = zz.id
            join %i k on b.id = k.bookid
            join %i l on k.genreid = l.id
            where concat(l.genre_name, " about ", zz.identity_name) like %s
            and b.id not in (select j.bookid from %i j where j.warningid in (' . join(', ', $selectedTriggers) . '))
            and b.islive = 1
            order by b.createdate desc
            limit 50';
            $booksResults = $wpdb->get_results($wpdb->prepare($query, $books_table, $book_products_table, $product_types_table, $pen_names_table, $posts_table, $posts_table, $book_identities_table, $identities_table, $book_genres_table, $genres_table, '%' . $wpdb->esc_like($searchTerm) . '%', $book_warnings_table), ARRAY_A);
        } else {
            $query = 'select distinct b.id, b.title, b.product_image_id, c.productid, f.post_title as pen_name, b.book_description, b.createdate, d.type_name, g.id as product_url, "genreIdentity" as "resulttype", l.genre_name, zz.identity_name
            from %i b
            join %i c on b.id = c.bookid
            join %i d on c.typeid = d.id
            left join %i e on b.id = e.bookid
            left join %i f on e.pennameid = f.id
            join %i g on c.productid = g.id        
            join %i z on b.id = z.bookid
            join %i zz on z.identityid = zz.id
            join %i k on b.id = k.bookid
            join %i l on k.genreid = l.id
            where concat(l.genre_name, " about ", zz.identity_name) like %s
            and b.islive = 1
            order by b.createdate desc
            limit 50';
            $booksResults = $wpdb->get_results($wpdb->prepare($query, $books_table, $book_products_table, $product_types_table, $pen_names_table, $posts_table, $posts_table, $book_identities_table, $identities_table, $book_genres_table, $genres_table, '%' . $wpdb->esc_like($searchTerm) . '%'), ARRAY_A);
        }
        for($index = 0; $index < count($booksResults); $index++){
            $booksResults[$index]['product_url'] = get_permalink($booksResults[$index]['product_url']);
            $booksResults[$index]['product_image_id'] = get_the_post_thumbnail_url($booksResults[$index]['product_image_id']);
        }
        array_push($resultsArr, ...$booksResults);
    }
    //genres
    if ($hasTriggers == 'yes'){
        $query = 'select distinct b.id, b.title, b.product_image_id, c.productid, f.post_title as pen_name, b.book_description, b.createdate, d.type_name, g.id as product_url, "genrebooks" as "resulttype"
        from %i b
        join %i c on b.id = c.bookid
        join %i d on c.typeid = d.id
        left join %i e on b.id = e.bookid
        left join %i f on e.pennameid = f.id
        join %i g on c.productid = g.id
        join %i k on b.id = k.bookid
        join %i l on k.genreid = l.id
        where l.genre_name = %s
        and b.id not in (select j.bookid from %i j where j.warningid in (' . join(', ', $selectedTriggers) . '))
        and b.islive = 1
        order by b.createdate desc
        limit 20';
        $genreResults = $wpdb->get_results($wpdb->prepare($query, $books_table, $book_products_table, $product_types_table, $pen_names_table, $posts_table, $posts_table, $book_genres_table, $genres_table, $searchTerm, $book_warnings_table), ARRAY_A);
    } else {
        $query = 'select distinct b.id, b.title, b.product_image_id, c.productid, f.post_title as pen_name, b.book_description, b.createdate, d.type_name, g.id as product_url, "genrebooks" as "resulttype"
        from %i b
        join %i c on b.id = c.bookid
        join %i d on c.typeid = d.id
        left join %i e on b.id = e.bookid
        left join %i f on e.pennameid = f.id
        join %i g on c.productid = g.id
        join %i k on b.id = k.bookid
        join %i l on k.genreid = l.id
        where l.genre_name = %s
        and b.islive = 1
        order by b.createdate desc
        limit 20';
        $genreResults = $wpdb->get_results($wpdb->prepare($query, $books_table, $book_products_table, $product_types_table, $pen_names_table, $posts_table, $posts_table, $book_genres_table, $genres_table, $searchTerm), ARRAY_A);
    }
    for($index = 0; $index < count($genreResults); $index++){
        $genreResults[$index]['product_url'] = get_permalink($genreResults[$index]['product_url']);
        $genreResults[$index]['product_image_id'] = get_the_post_thumbnail_url($genreResults[$index]['product_image_id']);
    }
    array_push($resultsArr, ...$genreResults);
//identities (exact match)
    if ($hasTriggers == 'yes'){
        $query = 'select distinct b.id, b.title, b.product_image_id, c.productid, f.post_title as pen_name, b.book_description, b.createdate, d.type_name, g.id as product_url, "identitybooks" as "resulttype", l.identity_name
        from %i b
        join %i c on b.id = c.bookid
        join %i d on c.typeid = d.id
        left join %i e on b.id = e.bookid
        left join %i f on e.pennameid = f.id
        join %i g on c.productid = g.id
        join %i k on b.id = k.bookid
        join %i l on k.identityid = l.id
        where l.identity_name = %s
        and b.id not in (select j.bookid from %i j where j.warningid in (' . join(', ', $selectedTriggers) . '))
        and b.islive = 1
        order by b.createdate desc
        limit 20';
        $identityResults = $wpdb->get_results($wpdb->prepare($query, $books_table, $book_products_table, $product_types_table, $pen_names_table, $posts_table, $posts_table, $book_identities_table, $identities_table, $searchTerm, $book_warnings_table), ARRAY_A);
    } else {
        $query = 'select distinct b.id, b.title, b.product_image_id, c.productid, f.post_title as pen_name, b.book_description, b.createdate, d.type_name, g.id as product_url, "identitybooks" as "resulttype", l.identity_name
        from %i b
        join %i c on b.id = c.bookid
        join %i d on c.typeid = d.id
        left join %i e on b.id = e.bookid
        left join %i f on e.pennameid = f.id
        join %i g on c.productid = g.id
        join %i k on b.id = k.bookid
        join %i l on k.identityid = l.id
        where l.identity_name = %s
        and b.islive = 1
        order by b.createdate desc
        limit 20';
        $identityResults = $wpdb->get_results($wpdb->prepare($query, $books_table, $book_products_table, $product_types_table, $pen_names_table, $posts_table, $posts_table, $book_identities_table, $identities_table, $searchTerm), ARRAY_A);
    }
    for($index = 0; $index < count($identityResults); $index++){
        $identityResults[$index]['product_url'] = get_permalink($identityResults[$index]['product_url']);
        $identityResults[$index]['product_image_id'] = get_the_post_thumbnail_url($identityResults[$index]['product_image_id']);
    }
    array_push($resultsArr, ...$identityResults);
    //identities (partial match)
    if ($hasTriggers == 'yes'){
        $query = 'select distinct b.id, b.title, b.product_image_id, c.productid, f.post_title as pen_name, b.book_description, b.createdate, d.type_name, g.id as product_url, "identitybooks" as "resulttype", l.identity_name
        from %i b
        join %i c on b.id = c.bookid
        join %i d on c.typeid = d.id
        left join %i e on b.id = e.bookid
        left join %i f on e.pennameid = f.id
        join %i g on c.productid = g.id
        join %i k on b.id = k.bookid
        join %i l on k.identityid = l.id
        where l.identity_name like %s
        and b.id not in (select j.bookid from %i j where j.warningid in (' . join(', ', $selectedTriggers) . '))
        and b.islive = 1
        order by b.createdate desc
        limit 20';
        $identityResults = $wpdb->get_results($wpdb->prepare($query, $books_table, $book_products_table, $product_types_table, $pen_names_table, $posts_table, $posts_table, $book_identities_table, $identities_table, '%' . $wpdb->esc_like($searchTerm) . '%', $book_warnings_table), ARRAY_A);
    } else {
        $query = 'select distinct b.id, b.title, b.product_image_id, c.productid, f.post_title as pen_name, b.book_description, b.createdate, d.type_name, g.id as product_url, "identitybooks" as "resulttype", l.identity_name
        from %i b
        join %i c on b.id = c.bookid
        join %i d on c.typeid = d.id
        left join %i e on b.id = e.bookid
        left join %i f on e.pennameid = f.id
        join %i g on c.productid = g.id
        join %i k on b.id = k.bookid
        join %i l on k.identityid = l.id
        where l.identity_name like %s
        and b.islive = 1
        order by b.createdate desc
        limit 20';
        $identityResults = $wpdb->get_results($wpdb->prepare($query, $books_table, $book_products_table, $product_types_table, $pen_names_table, $posts_table, $posts_table, $book_identities_table, $identities_table, '%' . $wpdb->esc_like($searchTerm) . '%'), ARRAY_A);
    }
    for($index = 0; $index < count($identityResults); $index++){
        $identityResults[$index]['product_url'] = get_permalink($identityResults[$index]['product_url']);
        $identityResults[$index]['product_image_id'] = get_the_post_thumbnail_url($identityResults[$index]['product_image_id']);
    }
    array_push($resultsArr, ...$identityResults);
    //readalikes
    if ($hasTriggers == 'yes'){
        $query = 'select distinct b.id, b.title, b.product_image_id, c.productid, f.post_title as pen_name, b.book_description, b.createdate, d.type_name, g.id as product_url, "readalikebooks" as "resulttype", k.readalike_author, k.readalike_title
        from %i b
        join %i c on b.id = c.bookid
        join %i d on c.typeid = d.id
        left join %i e on b.id = e.bookid
        left join %i f on e.pennameid = f.id
        join %i g on c.productid = g.id
        join %i k on b.id = k.bookid
        where k.readalike_title like %s
        and b.id not in (select j.bookid from %i j where j.warningid in (' . join(', ', $selectedTriggers) . '))
        and b.islive = 1
        order by b.createdate desc
        limit 10';
        $readalikeResults = $wpdb->get_results($wpdb->prepare($query, $books_table, $book_products_table, $product_types_table, $pen_names_table, $posts_table, $posts_table, $readalikes_table, '%' . $wpdb->esc_like($searchTerm) . '%', $book_warnings_table), ARRAY_A);
    } else {
        $query = 'select distinct b.id, b.title, b.product_image_id, c.productid, f.post_title as pen_name, b.book_description, b.createdate, d.type_name, g.id as product_url, "readalikebooks" as "resulttype", k.readalike_author, k.readalike_title
        from %i b
        join %i c on b.id = c.bookid
        join %i d on c.typeid = d.id
        left join %i e on b.id = e.bookid
        left join %i f on e.pennameid = f.id
        join %i g on c.productid = g.id
        join %i k on b.id = k.bookid
        where k.readalike_title like %s
        and b.islive = 1
        order by b.createdate desc
        limit 10';
        $readalikeResults = $wpdb->get_results($wpdb->prepare($query, $books_table, $book_products_table, $product_types_table, $pen_names_table, $posts_table, $posts_table, $readalikes_table, '%' . $wpdb->esc_like($searchTerm) . '%'), ARRAY_A);
    }
    for($index = 0; $index < count($readalikeResults); $index++){
        $readalikeResults[$index]['product_url'] = get_permalink($readalikeResults[$index]['product_url']);
        $readalikeResults[$index]['product_image_id'] = get_the_post_thumbnail_url($readalikeResults[$index]['product_image_id']);
    }
    array_push($resultsArr, ...$readalikeResults);
    //include a readalike check with title and author name split if the search term contains "by"
    if (str_contains(strtoupper($searchTerm), 'BY')){
        if ($hasTriggers == 'yes'){
            $query = 'select distinct b.id, b.title, b.product_image_id, c.productid, f.post_title as pen_name, b.book_description, b.createdate, d.type_name, g.id as product_url, "readalikebooks" as "resulttype", k.readalike_author, k.readalike_title
            from %i b
            join %i c on b.id = c.bookid
            join %i d on c.typeid = d.id
            left join %i e on b.id = e.bookid
            left join %i f on e.pennameid = f.id
            join %i g on c.productid = g.id
            join %i k on b.id = k.bookid
            where concat(k.readalike_title, " by ", k.readalike_author) like %s
            and b.id not in (select j.bookid from %i j where j.warningid in (' . join(', ', $selectedTriggers) . '))
            and b.islive = 1
            order by b.createdate desc
            limit 20';
            $booksResults = $wpdb->get_results($wpdb->prepare($query, $books_table, $book_products_table, $product_types_table, $pen_names_table, $posts_table, $posts_table, $readalikes_table, '%' . $wpdb->esc_like($searchTerm) . '%', $book_warnings_table), ARRAY_A);
        } else {
            $query = 'select distinct b.id, b.title, b.product_image_id, c.productid, f.post_title as pen_name, b.book_description, b.createdate, d.type_name, g.id as product_url, "readalikebooks" as "resulttype", k.readalike_author, k.readalike_title
            from %i b
            join %i c on b.id = c.bookid
            join %i d on c.typeid = d.id
            left join %i e on b.id = e.bookid
            left join %i f on e.pennameid = f.id
            join %i g on c.productid = g.id      
            join %i k on b.id = k.bookid
            where concat(k.readalike_title, " by ", k.readalike_author) like %s
            and b.islive = 1
            order by b.createdate desc
            limit 20';
            $booksResults = $wpdb->get_results($wpdb->prepare($query, $books_table, $book_products_table, $product_types_table, $pen_names_table, $posts_table, $posts_table, $readalikes_table, '%' . $wpdb->esc_like($searchTerm) . '%'), ARRAY_A);
        }
        for($index = 0; $index < count($booksResults); $index++){
            $booksResults[$index]['product_url'] = get_permalink($booksResults[$index]['product_url']);
            $booksResults[$index]['product_image_id'] = get_the_post_thumbnail_url($booksResults[$index]['product_image_id']);
        }
        array_push($resultsArr, ...$booksResults);
    }
    return $resultsArr;
    // return $wpdb->prepare($query, $books_table, $book_products_table, $product_types_table, $pen_names_table, $posts_table, $posts_table, $book_languages_table, $readalikes_table, '%' . $wpdb->esc_like($searchTerm) . '%', $book_warnings_table);
}