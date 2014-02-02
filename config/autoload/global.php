<?php
/**
 * Global Configuration Override
 *
 * You can use this file for overriding configuration values from modules, etc.
 * You would place values in here that are agnostic to the environment and not
 * sensitive to security.
 *
 * @NOTE: In practice, this file will typically be INCLUDED in your source
 * control, so do not include passwords or other sensitive information in this
 * file.
 */

return array(
    // Developer Tools Configuration
    'zenddevelopertools' => array(
        'profiler' => array(
            'enabled' => true,
            'strict' => false,
        ),
        'toolbar' => array(
            'enabled' => true,
            'auto_hide' => false,
            'position' => 'bottom',
            'version_check' => true,
        ),
    ),
);
