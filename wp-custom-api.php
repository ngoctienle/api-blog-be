<?php
    add_action('rest_api_init', function(){
        /* Get Thumbnail by featured_meida_url */
        register_rest_field('post', 'featured_media_url', array(
            'get_callback' => 'get_rest_featured_media_url'
        ));
        register_rest_field('post', 'author_data', array(
            'get_callback' => 'get_rest_post_author_data'
        ));
        register_rest_field('post', 'view_count', array(
            'get_callback' => 'get_rest_post_view_count'
        ));
    });

    function get_rest_featured_media_url($post, $field_name, $request){
        $post_id      = $post['id'];

        if($post_id){
            $url      = get_the_post_thumbnail_url($post_id);
            return $url;
        }
        
        return '';
    }

    function get_rest_post_author_data($post, $field_name, $request){
       $author_id   = $post['author'];
        if($author_id){
            return array(
             'nickname'      => get_the_author_meta('nickname', $author_id),
             'avatar'        => get_user_meta($author_id, 'simple_local_avatar')[0]['full']
            );
        }
        
        return array(
            'nickname' => '',
            'avatar'   => ''
        );
    }

    function get_rest_post_view_count($post, $field_name, $request){
        $post_id = $post['id'];

        if(function_exists('pvc_get_post_views')){
            $view_count = pvc_get_post_views($post_id);
            return $view_count;
        }

        return 0;
    }

    add_filter('rest_endpoints', function($routes){
        array_push($routes['/wp/v2/posts'][0]['args']['orderby']['enum'], 'post_views');

        return $routes;
    });
?>