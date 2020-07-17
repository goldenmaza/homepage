<?php

    /**
     * selectorBundler.php
     *
     * This file is used for combining several CSS files into one.
     * Default and unsupported/non-mandatory selectors will be separated.
     *
     * @package     Homepage
     * @author      Mats Richard Hellstrand
     * @copyright   Copyright (c) 2015-2025, Mats Richard Hellstrand
     * @license     TODO: http://
     * @link        TODO: http://
     * @since       July 17th, 2020 - Version 1.0
     */
    // ===========================================================================

    const DEFAULT_CSS_PATH = 'css/';
    const MANDATORY_INDEX = 0;
    const OTHER_INDEX = 1;
    const INPUT_KEY_MATCHING = [
        MANDATORY_INDEX => [
            'foundation_attributes.css',
            'section_attributes.css',
            'row_attributes.css'
        ],
        OTHER_INDEX => [
            'form_attributes.css',
            'responsive_columnFont.css',
            'responsive_adaptive.css',
            'unsupported_attributes.css'
        ]
    ];
    const REMOVE_STARTING_LINES = [
        MANDATORY_INDEX => [
            8,
            8,
            8
        ],
        OTHER_INDEX => [
            8,
            8,
            8,
            8
        ]
    ];
    const OUTPUT_KEY_MATCHING = [
        MANDATORY_INDEX => 'mandatory.css',
        OTHER_INDEX => 'other.css'
    ];
    $mandatoryContent = '';
    $otherContent = [];
    $current = basename(__FILE__);

    // The following is for the Mandatory file.
    // Prepare the template text and then adding it to the beginning of the CSS file.
    $ouput = DEFAULT_CSS_PATH . OUTPUT_KEY_MATCHING[MANDATORY_INDEX];
    $date = date('M jS, Y');
    $template = "
/*
    Filename:       $ouput
    Author:         Mats Richard Hellstrand (Sweden)
    Website:        www.hellstrand.org
    Date:           $date
    Language:       English
    Description:    This stylesheet contains selectors that are labled as mandatory and the file is dynamically generated with the $current script.
*/
    ";
    $mandatoryContent = $template;
    if (file_exists($ouput)) {
        unlink($ouput);
    }

    // Load old CSS files and prepare the content for processing.
    $files = count(INPUT_KEY_MATCHING[MANDATORY_INDEX]);
    for ($i = 0; $i < $files; $i++) {
        $input = file_get_contents(DEFAULT_CSS_PATH . INPUT_KEY_MATCHING[MANDATORY_INDEX][$i]);
        $array = explode("\r\n", $input);
        $array = array_slice($array, REMOVE_STARTING_LINES[MANDATORY_INDEX][$i]);
        $rows = count($array);
        for ($j = 0; $j < $rows; $j++) {
            $mandatoryContent .= $array[$j] . PHP_EOL;
        }
    }

    // Create the new CSS files as they are stored.
    file_put_contents($ouput, $mandatoryContent, LOCK_EX | FILE_APPEND);

    // The following is for the Other file.
    // Prepare the template text and then adding it to the beginning of the CSS file.
    $ouput = DEFAULT_CSS_PATH . OUTPUT_KEY_MATCHING[OTHER_INDEX];
    $template = "
/*
    Filename:       $ouput
    Author:         Mats Richard Hellstrand (Sweden)
    Website:        www.hellstrand.org
    Date:           $date
    Language:       English
    Description:    This stylesheet contains selectors that are labled as unsupported or non-mandatory and the file is dynamically generated with the $current script.
*/
    ";
    $otherContent = $template;
    if (file_exists($ouput)) {
        unlink($ouput);
    }

    // Load old CSS files and prepare the content for processing.
    $files = count(INPUT_KEY_MATCHING[OTHER_INDEX]);
    for ($i = 0; $i < $files; $i++) {
        $input = file_get_contents(DEFAULT_CSS_PATH . INPUT_KEY_MATCHING[OTHER_INDEX][$i]);
        $array = explode("\r\n", $input);
        $array = array_slice($array, REMOVE_STARTING_LINES[OTHER_INDEX][$i]);
        $rows = count($array);
        for ($j = 0; $j < $rows; $j++) {
            $otherContent .= $array[$j] . PHP_EOL;
        }
    }

    // Create the new CSS file with the unsupported or non-mandatory selectors.
    file_put_contents($ouput, $otherContent, LOCK_EX | FILE_APPEND);

?>
