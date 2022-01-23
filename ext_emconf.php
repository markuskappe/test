<?php

$EM_CONF[$_EXTKEY] = [
    'title' => 'Test',
    'description' => '',
    'category' => 'plugin',
    'author' => 'Markus Kappe',
    'author_email' => 'markus.kappe@dix.at',
    'state' => 'experimental',
    'clearCacheOnLoad' => 0,
    'version' => '1.0.0',
    'constraints' => [
        'depends' => [
            'typo3' => '10.4.0-10.4.99',
        ],
        'conflicts' => [],
        'suggests' => [],
    ],
];
