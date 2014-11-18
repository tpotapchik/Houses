<?php
/**
 * The manifest of files that are local to specific environment.
 * This file returns a list of environments that the application
 * may be installed under. The returned data must be in the following
 * format:
 *
 * ```php
'example' => [
    'confs' => [
        'backend' => [
            'main' => 'main-local.php',
            'params' => 'params-local.php',
        ],
        'common' => [
            'main' => 'main-local.php',
            'params' => 'params-local.php',
        ],
        'console' => [
            'main' => 'main-local.php',
            'params' => 'params-local.php',
        ],
        'frontend' => [
            'main' => 'main-local.php',
            'params' => 'params-local.php',
        ],
    ],
    'index_files' => [
        'backend' => [
            'web' =>[
                'index.php', 'index-test.php'
            ]
        ],
        'frontend' => [
            'web' =>[
                'index.php', 'index-test.php'
            ]
        ],
    ],
    'setWritable' => [
        'backend/runtime',
        'backend/web/assets',
        'frontend/runtime',
        'frontend/web/assets',
        'nginx/logs'
    ],
    'setExecutable' => [
        'yii',
    ],
    'setCookieValidationKey' => [
        'backend/config/main-local.php',
        'frontend/config/main-local.php',
    ],
],
 * ```
 */
return [
    'base' => [
        'confs' => [
            'backend' => [
                'main' => 'main.php',
                'params' => 'params.php',
            ],
            'common' => [
                'main' => 'main.php',
                'params' => 'params.php',
            ],
            'console' => [
                'main' => 'main.php',
                'params' => 'params.php',
            ],
            'frontend' => [
                'main' => 'main.php',
                'params' => 'params.php',
            ],
        ]
    ],

    'production' => [
        'confs' => [
            'backend' => [
                'main' => 'main-local.php',
                'params' => 'params-local.php',
            ],
            'common' => [
                'main' => 'main-local.php',
                'params' => 'params-local.php',
            ],
            'console' => [
                'main' => 'main-local.php',
                'params' => 'params-local.php',
            ],
            'frontend' => [
                'main' => 'main-local.php',
                'params' => 'params-local.php',
            ],
        ],
        'index_files' => [
            'backend' => [
                'web' =>[
                    'index.php', 'index-test.php'
                ]
            ],
            'frontend' => [
                'web' =>[
                    'index.php', 'index-test.php'
                ]
            ],
        ],
        'setWritable' => [
            'backend/runtime',
            'backend/web/assets',
            'frontend/runtime',
            'frontend/web/assets',
            'nginx/logs'
        ],
        'setExecutable' => [
            'yii',
        ],
        'setCookieValidationKey' => [
            'backend/config/main-local.php',
            'frontend/config/main-local.php',
        ],
    ],

    'sahnovsky' => [
        'confs' => [
            'backend' => [
                'main' => 'main-local.php',
                'params' => 'params-local.php',
            ],
            'common' => [
                'main' => 'main-local.php',
                'params' => 'params-local.php',
            ],
            'console' => [
                'main' => 'main-local.php',
                'params' => 'params-local.php',
            ],
            'frontend' => [
                'main' => 'main-local.php',
                'params' => 'params-local.php',
            ],
        ],
        'index_files' => [
            'backend' => [
                'web' =>[
                    'index.php', 'index-test.php'
                ]
            ],
            'frontend' => [
                'web' =>[
                    'index.php', 'index-test.php'
                ]
            ],
        ],
        'setWritable' => [
            'backend/runtime',
            'backend/web/assets',
            'frontend/runtime',
            'frontend/web/assets',
            'nginx/logs'
        ],
        'setExecutable' => [
            'yii',
        ],
        'setCookieValidationKey' => [
            'backend/config/main-local.php',
            'frontend/config/main-local.php',
        ],
    ],
];
