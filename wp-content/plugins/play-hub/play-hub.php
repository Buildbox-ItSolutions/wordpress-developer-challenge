<?php

/*
   Plugin name: Play Hub
   Plugin URI: https://webdevjo.github.io/
   Author: Jonas C Santos 
   Author URI: https://webdevjo.github.io
   Description: Plugin que facilita a configuração do Play Theme.
   Version: 1.0.0
   Requires PHP: 7.4
   Requires at least: 5.2
   Text Domain: play-hub
*/

use Src\Plugin\Activate;
use Src\Plugin\Deactivate;

define('PLUGIN_PATH', plugin_dir_path(__FILE__));
define('PLUGIN_URL', plugin_dir_url(__FILE__));

if (!defined('ABSPATH')) {
   die('Invalid request!');
}

if (file_exists(dirname(__FILE__) . '/vendor/autoload.php')) {
   require_once PLUGIN_PATH . 'vendor/autoload.php';
}

function activatePlugin()
{
   Activate::activate();
}

function deactivatePlugin()
{
   Deactivate::deactivate();
}

register_activation_hook(__FILE__, "activatePlugin");
register_deactivation_hook(__FILE__, "deactivatePlugin");

if (class_exists("Src\\Start")) {
   Src\Start::registerServices();
}
