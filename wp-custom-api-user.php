<?php
    add_action('rest_api_init', function(){
        register_rest_route('wp/v2', 'users/register', array(
            'method' =>  WP_REST_Server::CREATABLE,
            'callback' => 'handle_route_users_register',
            'args'  => array(
            'username' => array(
                'description' => __('Login name for the user.'),
                'type' => 'string',
                'required' => true,
            ),
            'password' => array(
                'description' => __('Password for the user (never included).'),
                'type' => 'string',
                'required' => true,
            ),
            'nickname' => array(
                'description' => __('The nickname for user.'),
                'type' => 'string',
                'required' => false,
            ),
            'email' => array(
                'description' => __('The email address for user.'),
                'type' => 'email',
                'required' => true,
            ),
            )
        ));
    });

    function lnt_check_user_password($value){
        $password = (string) $value;

        if(empty($password)){
            return new WP_Error(
                'rest_user_invalid_password',
                __('Password cannot be empty'),
                array('status' => 400)
            );
        }

        if(false !== strpos($password, '\\')){
            return new WP_Error(
                'rest_user_invalid_password',
                __('Password cannot contain the "\\" character.'),
                array('status' => 400)
            );
        }

        if(false !== strpos($password, ' ')){
            return new WP_Error(
                'rest_user_invalid_password',
                __('Password cannot contain the space character.'),
                array('status' => 400)
            );
        }

        return $password;
    }

    function lnt_check_user_name($value){
        $username = (string) $value;

        if(!validate_username($username)){
            return new WP_Error(
                'rest_user_invalid_username',
                __('Username contains invalid characters.'),
                array('status' => 400)
            );
        }
        if(false !== strpos($username, ' ')){
            return new WP_Error(
                'rest_user_invalid_username',
                __('Username cannot contain the space character.'),
                array('status' => 400)
            );
        }

        return $username;
    }

    function lnt_check_nickname($value, $default_value){
        $nickname = (string) $value;

        if(empty($nickname)){
            return $default_value;
        }

        return $nickname;
    }

    function handle_route_users_register($request){
        $user_can_register = (boolean) get_option('user_can_register');

        if($user_can_register === false){
            return new WP_Error(
                'rest_user_cannot_register',
                __('User cannot register'),
                array('status' => 400)
            );
        }


        $email      = $request->get_param('email');
        $username   = lnt_check_user_name($request      ->get_param('username'));
        $password   = lnt_check_user_password($request  ->get_param('password'));
        $nickname   = lnt_check_nickname($request       ->get_param('nickname'), $username);

        if($password instanceof WP_Error) return $password;
        if($username instanceof WP_Error) return $username;

        $status = 200;
        $data   = array(
            'email'     => $email,
            'password'  => $password,
            'username'  => $username,
            'nickname'  => $nickname
        );

        $userIdResult = wp_insert_user(
            array(
                'user_email'    => $email,
                'user_password' => $password,
                'user_login'    => $username,
                'nickname'      => $nickname 
            )
        );

        if($userIdResult instanceof WP_Error){
            return $userIdResult;
        }

        $response = new WP_REST_Response(array(
            'author' => $userIdResult,
            'status' => 201,
        ), 201);

        return $response;
    }

    
?>