<?php

    // State any problems with the code.
    //error_reporting(E_ERROR | E_WARNING | E_PARSE | E_NOTICE);

    /**
     * notice.php
     *
     * This file is used for setting up the notice-page.
     *
     * @package     Homepage
     * @author      Mats Richard Hellstrand
     * @copyright   Copyright (c) 2015-2025, Mats Richard Hellstrand
     * @license     TODO: http://
     * @link        TODO: http://
     * @since       July 18th, 2020 - Version 1.2
     */
    // ===========================================================================

    // Turn on the output buffering.
    ob_start();

    echo'
        <section id="notice" class="sections" data-sitemap="Empty | Error">
            <div class="container">
                <div class="containerColumn">
                    <div class="containerRow">
                        <h1>Notice - Browser support</h1>
                    </div><!-- containerRow ends -->
                    <div class="containerColumn">
                        <p>I am sorry, but your browser is incompatible with the current design.</p>
                        <p>Please update your browser or use another to access the full experience.</p>
                        <p>Kind regards,</p>
                        <p>Richard</p>
                        <p>If you wanna get in contact with me: <a href="mailto:public@hellstrand.org" target="_blank" title="Get in contact with me on my public e-mail address!">goldenmaza</a></p>
                    </div><!-- containerColumn ends -->
                </div><!-- containerColumn ends -->
            </div><!-- container ends -->
        </section><!-- section ends -->
    ';

    // Assign the variable the content of the buffer, which is used in the template, empty the buffer and turn off output buffering.
    $content                    =   ob_get_clean();

    // Include the template, which is used for creating the entire website.
    $title                      =   'goldenmaza - Software Developer';
    $date                       =   '2015 - ' . date('Y');
    $keywords                   =   'mats richard hellstrand, goldenmaza, maza, system developer, software developer, fullstack developer, web designer, webdesigner, webdesign, wed design, systemutvecklare, webbutvecklare, webbdesign, certified java programmer, certifierad java utvecklare';
    $description                =   'Software Developer that loves everything regarding software engineering!';
    $author                     =   'goldenmaza - Mats Richard Hellstrand';
    require_once('noticeTemplate.php');

?>
