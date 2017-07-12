<?php

/**
 * @link              http://emailchef.com/
 * @since             1.0.0
 *
 * @wordpress-plugin
 * Plugin Name:       eMailChef
 * Plugin URI:        http://emailchef.com/
 * Description:       eMailChef: The simplest recipe to cook amazing newsletters. Automatically synchronize form submissions from Contact Form 7, Fast Secure Contact Form (FSCF) and Jetpack.
 * Version:           1.0.3
 * Author:            Nicola Moretti
 * Author URI:        http://nicolamoretti.com
 * License:           GPL-2.0+
 * License URI:       http://www.gnu.org/licenses/gpl-2.0.txt
 * Text Domain:       emailchef
 * Domain Path:       /languages
 */

// If this file is called directly, abort.
if (!defined('WPINC')) {
    die;
}

// Error logging
function emailchef_write_log($log)
{
    if (true === WP_DEBUG) {
        if (is_array($log) || is_object($log)) {
            error_log('eMailChef' . print_r($log, true));
        } else {
            error_log('eMailChef' . $log);
        }
    }
}

// Load eMailChef library
include plugin_dir_path(__FILE__) . 'lib/emailchef/vendor/autoload.php';

/**
 * The code that runs during plugin activation.
 * This action is documented in includes/class-emailchef-activator.php.
 */
function activate_emailchef()
{
    require_once plugin_dir_path(__FILE__) . 'includes/class-emailchef-activator.php';
    Emailchef_Activator::activate();
}

/**
 * The code that runs during plugin deactivation.
 * This action is documented in includes/class-emailchef-deactivator.php.
 */
function deactivate_emailchef()
{
    require_once plugin_dir_path(__FILE__) . 'includes/class-emailchef-deactivator.php';
    Emailchef_Deactivator::deactivate();
}

register_activation_hook(__FILE__, 'activate_emailchef');
register_deactivation_hook(__FILE__, 'deactivate_emailchef');

/**
 * The core plugin class that is used to define internationalization,
 * admin-specific hooks, and public-facing site hooks.
 */
require plugin_dir_path(__FILE__) . 'includes/class-emailchef.php';

/**
 * Begins execution of the plugin.
 *
 * Since everything within the plugin is registered via hooks,
 * then kicking off the plugin from this point in the file does
 * not affect the page life cycle.
 *
 * @since    1.0.0
 */
function run_emailchef()
{
    $plugin = new Emailchef();
    $plugin->run();
}

run_emailchef();
