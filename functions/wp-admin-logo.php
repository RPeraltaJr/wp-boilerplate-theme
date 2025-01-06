<?php

function my_login_logo()
{ ?>
    <style type="text/css">
        #login h1 a,
        .login h1 a {
            background-image: url(<?php echo esc_url(get_stylesheet_directory_uri() . '/assets/build/img/logos/logo.svg'); ?>);
            width: 250px;
            height: 75px;
            background-size: contain;
            background-repeat: no-repeat;
            padding-bottom: 0px;
        }
    </style>
<?php }
add_action('login_enqueue_scripts', 'my_login_logo');

function my_login_logo_url()
{
    return home_url();
}
add_filter('login_headerurl', 'my_login_logo_url');

function my_login_logo_url_title()
{
    return get_bloginfo('name');
}
add_filter('login_headertext', 'my_login_logo_url_title');
