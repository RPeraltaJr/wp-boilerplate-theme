<?php

/**
 * ACF Options Page
 */
if (function_exists('acf_add_options_page')) {

    $args = array(

        /* (string) The title displayed on the options page. Required. */
        'page_title' => 'Theme Options',

        /* (string) The title displayed in the wp-admin sidebar. Defaults to page_title */
        'menu_title' => '',

        /* (string) The URL slug used to uniquely identify this options page. 
        Defaults to a url friendly version of menu_title */
        'menu_slug' => '',

        /* (string) The capability required for this menu to be displayed to the user. Defaults to edit_posts.
        Read more about capability here: http://codex.wordpress.org/Roles_and_Capabilities */
        'capability' => 'edit_posts',

        /* (int|string) The position in the menu order this menu should appear. 
        WARNING: if two menu items use the same position attribute, one of the items may be overwritten so that only one item displays!
        Risk of conflict can be reduced by using decimal instead of integer values, e.g. '63.3' instead of 63 (must use quotes).
        Defaults to bottom of utility menu items */
        'position' => false,

        /* (string) The slug of another WP admin page. if set, this will become a child page. */
        'parent_slug' => '',

        /* (string) The icon class for this menu. Defaults to default WordPress gear.
        Read more about dashicons here: https://developer.wordpress.org/resource/dashicons/ */
        'icon_url' => false,

        /* (boolean) If set to true, this options page will redirect to the first child page (if a child page exists). 
        If set to false, this parent page will appear alongside any child pages. Defaults to true */
        'redirect' => true,

        /* (int|string) The '$post_id' to save/load data to/from. Can be set to a numeric post ID (123), or a string ('user_2'). 
        Defaults to 'options'. Added in v5.2.7 */
        'post_id' => 'options',

        /* (boolean)  Whether to load the option (values saved from this options page) when WordPress starts up. 
        Defaults to false. Added in v5.2.8. */
        'autoload' => false,

        /* (string) The update button text. Added in v5.3.7. */
        'update_button'        => __('Update', 'acf'),

        /* (string) The message shown above the form on submit. Added in v5.6.0. */
        'updated_message'    => __("Options Updated", 'acf'),

    );

    acf_add_options_page($args);
}
