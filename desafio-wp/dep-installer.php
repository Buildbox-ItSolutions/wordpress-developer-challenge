<?php

require_once __DIR__ . '/dependency-installer/vendor/autoload.php';

WP_Dependency_Installer::instance(__DIR__)->run();

/**
 * Increase dismissable timeout from 7 to 14 days.
 */
add_filter(
    'wp_dependency_timeout',
    function ($timeout, $source) {
        $timeout = basename(__DIR__) !== $source ? $timeout : 14;
        return $timeout;
    },
    10,
    2
);

/**
 * Change dismissable label from [Dependency] to [Test Dependency Installer].
 */
add_filter(
    'wp_dependency_dismiss_label',
    function ($label, $source) {
        $label = basename(__DIR__) !== $source ? $label : __('Instalador de Dependências', 'test-dependency-installer');
        return $label;
    },
    10,
    2
);

// Sanity check for WPDI v3.0.0.
if (!method_exists('WP_Dependency_Installer', 'json_file_decode')) {
    add_action(
        'admin_notices',
        function () {
            $class   = 'notice notice-error is-dismissible';
            $label   = __('Test Dependency Installer', 'test-dependency-installer');
            $file    = (new ReflectionClass('WP_Dependency_Installer'))->getFilename();
            $message = __('Another theme or plugin is using a previous version of the WP Dependency Installer library, please update this file and try again:', 'group-plugin-installer');
            printf('<div class="%1$s"><p><strong>[%2$s]</strong> %3$s</p><pre>%4$s</pre></div>', esc_attr($class), esc_html($label), esc_html($message), esc_html($file));
        },
        1
    );
    return false; // Exit early.
}
