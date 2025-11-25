<?php

// Get only the approved comments
$args = array(
	'status' => 'approve',
);

// The comment Query
$comments_query = new WP_Comment_Query();
$comments       = $comments_query->query( $args );

// Comment Loop
if ( $comments ) {
	foreach ( $comments as $comment ) {
        echo '<div class="single-comment">';
        echo '<h3>' . $comment->comment_author . '</h3>';
        echo '<p>' . date('m', strtotime($comment->comment_date)) . '/' . date('d', strtotime($comment->comment_date)) . '/' . date('y', strtotime($comment->comment_date)) . '</p>';
		echo '<p>' . $comment->comment_content . '</p>';
        echo '</div>';
	}
} else {
	echo '<p class="centered-text">No comments found.</p>';
}

// Form
comment_form([
	'title_reply' => esc_html__( 'Leave a Reply', 'st-church' ),
	'comment_field' => '<label for="comment">Comment</label><textarea name="comment" id="comment" required="required"></textarea>',
	'label_submit' => esc_html__( 'Post Comment', 'st-church' )
]);

?>