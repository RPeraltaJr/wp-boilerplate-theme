<?php

// Limit Login Attempts Functionality

if (!defined('ABSPATH')) {
    exit; // Exit if accessed directly
}

class Limit_Login_Attempts
{
    private $max_attempts = 3; // Maximum login attempts allowed
    private $lockout_duration = 15 * MINUTE_IN_SECONDS; // Lockout duration in seconds

    public function __construct()
    {
        add_action('wp_login_failed', [$this, 'handle_failed_login']);
        add_filter('authenticate', [$this, 'check_login_attempts'], 30, 3);
    }

    // Handle failed login attempt
    public function handle_failed_login($username)
    {
        $ip_address = $this->get_user_ip();
        $failed_attempts = get_transient("failed_attempts_$ip_address") ?: 0;
        $failed_attempts++;

        set_transient("failed_attempts_$ip_address", $failed_attempts, $this->lockout_duration);

        if ($failed_attempts >= $this->max_attempts) {
            set_transient("locked_out_$ip_address", true, $this->lockout_duration);
        }
    }

    // Check login attempts before authenticating
    public function check_login_attempts($user, $username, $password)
    {
        $ip_address = $this->get_user_ip();

        if (get_transient("locked_out_$ip_address")) {
            return new WP_Error('too_many_attempts', __('Too many login attempts. Please try again later.'));
        }

        return $user;
    }

    // Get user IP address
    private function get_user_ip()
    {
        return $_SERVER['REMOTE_ADDR'] ?? '0.0.0.0';
    }
}

// Initialize the class
new Limit_Login_Attempts();
