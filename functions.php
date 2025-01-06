<?php

// * wp admin logo
// include 'functions/wp-admin-logo.php';

// * wp admin page template column
include 'functions/wp-admin-page-template-column.php';

// * ACF options page
include 'functions/acf-options.php';

// * custom post types
// include 'functions/post-types.php';

// * database table setup
// include 'functions/setup.php';

// * send weekly reports
// include 'functions/send-report.php';

// * global variables
function get_img_path()
{
    return get_template_directory_uri() . "/assets/img";
}

// * enable widgets
if (function_exists('register_sidebar'))
    register_sidebar();
