<?php

return [

    /*
     * Set the names of files you want to add to generated javascript.
     * Otherwise all the files will be included.
     *
     * 'messages' => [
     *     'validation',
     *     'forum/thread',
     * ],
     */
    'messages' => [
        'core',
        'incidents',
        'user_management',
        'rank_management',
        'join_us',
    ],

    /*
     * The default path to use for the generated javascript.
     */
    'path' => public_path('assets/js/localization.js'),
];
