<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Snappy PDF / Image Configuration
    |--------------------------------------------------------------------------
    |
    | This options array is passed directly to the wkhtmltopdf command
    | binary. For more details about these options, visit the WkHtmlToPdf
    | options documentation: https://wkhtmltopdf.org/usage/wkhtmltopdf.txt
    |
    */

    'pdf' => [
        'binary' => '/usr/local/bin/wkhtmltopdf',
        'timeout' => false,
        'options' => [
            'margin-top' => 0,
            'margin-right' => 0,
            'margin-bottom' => 0,
            'margin-left' => 0,
        ],
        'env'     => [],
    ],

    /*
    |--------------------------------------------------------------------------
    | Image Driver Configuration
    |--------------------------------------------------------------------------
    |
    | If you're using the `snappy` class to create images from PDFs, you can
    | set a global image driver here. This will be used when creating images
    | from PDFs and no explicit driver is specified.
    |
    | Supported: "gd", "imagick"
    |
    */

    'image' => [
        'driver' => 'imagick',
    ],

];
