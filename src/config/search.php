<?php

    /*
    |--------------------------------------------------------------------------
    | Search Engine configs
    |--------------------------------------------------------------------------
    |
    | This configuration file uses parameters out of the box.
    | You can adjust the parameters for yourself at any time.
    |
    */


    /*
    |--------------------------------------------------------------------------
    | Recommendations
    |--------------------------------------------------------------------------
    |
    | 1. Set short command: <alias search="php artisan search:shell">
    | 2. Set short command: <alias pal="php artisan">
    | 3. Check with <search version>
    |
    */


return [

    /*
    |--------------------------------------------------------------------------
    | Data aliases
    |--------------------------------------------------------------------------
    |
    | This array of class aliases will be registered when this application
    | is started. However, feel free to register as many as you wish as
    | the aliases are "lazy" loaded so they don't hinder performance.
    |
    */

    'aliases/data' => [
        //
    ],

    /*
    |--------------------------------------------------------------------------
    | Shell activity
    |--------------------------------------------------------------------------
    |
    | Enables or disables the use of the php artisan command shell for
    | convenient work with some library functions.
    |
    */

    'shell' => true,

    /*
    |--------------------------------------------------------------------------
    | Shell executes
    |--------------------------------------------------------------------------
    |
    | Here you can disable the available executions for php artisan shell.
    |
    */

    // Set the full path to the searchd executive file.
    'path' => '',

    // Set the full path to the Data sphinx or manticore executive directory.
    'sphinx/data' => '',


    /*
    |--------------------------------------------------------------------------
    | Searchd
    |--------------------------------------------------------------------------
    |
    | Here you can configure the searchd module. It is very important
    | for the operation of the entire system. You need to make sure that the
    | port and host are free. These values are the default values.
    |
    | host -> 127.0.0.1 (default)
    | port -> 9308 (default)
    |
    | I do not recommend changing these settings
    | if you do you should be sure of it.
    |
    */

    'host' => '127.0.0.1',

    'port' => 9308,

    /*
    |--------------------------------------------------------------------------
    | Engine
    |--------------------------------------------------------------------------
    |
    | Search engine settings. If you change the settings, be sure of it.
    | You can find more details on the Manticore website:
    | https://manual.manticoresearch.com/Introduction
    |
    */

    'engine' => [

        'ranker' => 'sph04',

        'query_count_limit' => 100000,

        'concat' => [
            '№',
            '-',
            '"',
            '!',
            '@',
            '#',
            '$',
            '%',
            '^',
            '&',
            '*',
            '(',
            ')',
            '_',
            '+',
            '{',
            '}',
            '|',
            ':',
            '"',
            '<',
            '>',
            '?',
            '[',
            ']',
            ';',
            "'",
            ',',
            '.',
            '/',
            '',
            '~',
            '`',
            '='
        ],

    ],

    /*
    |--------------------------------------------------------------------------
    | Search options
    |--------------------------------------------------------------------------
    |
    | These are the settings of the search interpreter. Detailed information:
    | https://manual.manticoresearch.com/Introduction
    |
    */

    'options' => [

        'expand_keywords' => '1',

        'index_exact_words' => '1',

        'morphology' => 'stem_enru',

        'min_word_len' => '3',

        'min_infix_len' => '2',

        'min_prefix_len' => '2',

        'dict' => 'keywords',

        'html_strip' => '1',

        'html_strip_mode' => 'strip',

        'wordforms' => [
            'wordforms.rtf'
        ],

    ],

    'v_PHP' => '8.0 letter',

    'v_engine' => '1.30',

    'v_manticore' => '6.2.0',

    'v_manticorePHP' => '3.0.1',

];