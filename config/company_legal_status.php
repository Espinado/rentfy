<?php
return [
    /*
     * Show language selector
     *
     * @var bool
     */
    'status' => true,

    /*
     * Available languages
     *
     * Add the language code to the following array
     * The code must have the same name as in the languages folder
     * Make sure they're in alphabetical order.
     *
     * @var array
     */

    'legal_status' => [
        /*
         * Key is the Laravel locale code
         * Index 0 of sub-array is the Carbon locale code
         * Index 1 of sub-array is the PHP locale code for setlocale()
         * Index 2 of sub-array is true if the language uses RTL (right-to-left)
         * Index 3 of sub-array is the language name in the original language
         */
        0 => [
            'country_code' => 'LV',
            'status' => [
                'IK',
                'SIA',
                'A/S',
            ],
        ],
        1 => [
            'country_code' => 'EE',
            'status' => [
                'IK EE',
                'SIA EE',
                'A/S EE',
            ],
        ],
        2 => [
            'country_code' => 'LT',
            'status' => [
                 'IK LT',
                'SIA LT',
                'A/S LT',
            ],
        ],
    ],
];
