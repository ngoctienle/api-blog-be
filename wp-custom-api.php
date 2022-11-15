<?php
  require_once(ABSPATH . 'wp-custom-api-user.php');

  add_action( 'rest_api_init', function () {
    // Get Image Thumbnail by featured_media id
    register_rest_field('post',
      'featured_media_url', // Vi tri nay tren tuy chon
      array(
        'get_callback'  => 'get_rest_featured_media_url' // Ten ham
      )
    );

    register_rest_field(array('post', 'comment'),
      'author_data',
      array(
        'get_callback'  => 'get_rest_author_post_data'
      )
    );

    register_rest_field('post',
      'view_count',
      array(
        'get_callback'  => 'get_rest_post_view_count'
      )
    );

    register_rest_field('post',
      'comment_count', // total parent + total reply
      array(
        'get_callback'  => 'get_rest_post_comment_count'
      )
    );

    register_rest_field('comment',
      'comment_reply_count', // total parent + total reply
      array(
        'get_callback'  => 'get_rest_post_comment_reply_count'
      )
    );

  });

  function get_rest_featured_media_url($post, $field_name, $request) {
    $post_id = $post['id'];

    if ($post_id) {
      $url = get_the_post_thumbnail_url($post_id);
      return $url;
    }

    return '';
  }

  function get_rest_author_post_data($post, $field_name, $request) {
    $author_id = $post['author'];

    if ($author_id) {
      return array(
        'nickname' => get_the_author_meta( 'nickname', $author_id ),
        'description' => get_the_author_meta( 'description', $author_id ),
        'avatar' => get_user_meta( $author_id, 'simple_local_avatar' )[0]['full']
      );
    }
    
    return array(
      'nickname' => '',
      'avatar' => '',
      'description' => '',
    );
  }

  function get_rest_post_view_count($post, $field_name, $request) {
    $post_id = $post['id'];

    if ( function_exists( 'pvc_get_post_views' ) ) {
      $view_count = pvc_get_post_views( $post_id );
      return $view_count;
    }

    return 0;
  }
  function get_rest_post_comment_count($post, $field_name, $request) {
    $post_id = $post['id'];

    $comment_count = get_comments_number( $post_id );

    // return intval($comment_count);
    return (int)$comment_count;
  }
  
  function get_rest_post_comment_reply_count($comment, $field_name, $request) {
    $post_id = $comment['post'];
    $comment_parent_id = $comment['id'];

    if ($comment['parent'] === 0) {
      global $wpdb;
      $query = "SELECT COUNT(comment_ID) AS reply_count FROM $wpdb->comments 
      WHERE `comment_post_ID` = $post_id AND `comment_approved` = 1 AND `comment_parent` = $comment_parent_id";
      $data = $wpdb->get_row($query);
      return (int)$data->reply_count;
    }

    return 0;
  }

  add_filter('rest_endpoints', function ($routes) {
    if ( !$routes['/wp/v2/posts'][0]['args']['orderby']['enum'] ) {
      return $routes;
    }

    array_push( $routes['/wp/v2/posts'][0]['args']['orderby']['enum'], 'post_views' );
    return $routes;
  });

?>