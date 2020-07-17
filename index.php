<?php

    // State any problems with the code.
    //error_reporting(E_ERROR | E_WARNING | E_PARSE | E_NOTICE);

    /**
     * index.php
     *
     * This file is used for setting up the index-page.
     *
     * @package     Homepage
     * @author      Mats Richard Hellstrand
     * @copyright   Copyright (c) 2015-2025, Mats Richard Hellstrand
     * @license     TODO: http://
     * @link        TODO: http://
     * @since       July 17th, 2020 - Version 1.5
     */
    // ===========================================================================

    // Prepare and fetch data from the MySQL database.
    require_once('database/Process.php');
    $_SESSION['process']        =   new Process();
    require_once('database/fetch.php');

    // Prepare the variables used throughout the scripts.
    $anchorKeyMatching          =   [
                                        'Education' => 'edu', 'Career' => 'car', 'Results' => 'res', 'Experience' => 'exp', 'Certifications' => 'cer',
                                        'Download' => 'dow', 'Awards' => 'awa', 'Testimonials' => 'tes'
                                    ];
    $qualificationKeyMatching   =   [
                                        'Education' => $alpha_degreeSize + $alpha_educationSize, 'Career' => $alpha_careerSize,
                                        'Testimonials' => $alpha_testimonialSize, 'Experience' => $alpha_experienceSize,
                                        'Certifications' => $alpha_certificationSize, 'Results' => $alpha_resultSize,
                                        'Awards' => $alpha_awardSize, 'Download' => '0'
                                    ];
    $sitemapKeyMatching         =   [
                                        'abo' => 'About pages', 'por' => 'Portfolio overview', 'pro' => 'Project pages', 'qua' => 'Qualification overview',
                                        'edu' => 'Education overview', 'deg' => 'Degree pages', 'insp' => 'Institute overview', 'insc' => 'Course pages',
                                        'car' => 'Career overview', 'job' => 'Career pages', 'res' => 'Result overview', 'sco' => 'Result pages',
                                        'exp' => 'Experience overview', 'cer' => 'Certification overview', 'rec' => 'Certification pages', 'dow' => 'Download overview',
                                        'awa' => 'Award overview', 'rew' => 'Award pages', 'tes' => 'Testimonial overview', 'quo' => 'Testimonial pages',
                                        'con' => 'Contact me'
                                    ];
    $sitemapGrouping            =   ['por', 'qua', 'edu', 'deg', 'car', 'res', 'exp', 'cer', 'dow', 'awa', 'tes', 'con'];
    $downloadKeyMatching        =   [];

    $portfolioGrid              =   8;
    $defaultListGrid            =   5;
    $lessLimit                  =   4;
    $tabIndex                   =   6;

    $quaDefaultTitle            =   'Go to the X pages!';
    $dlPortfolioPath            =   'download/portfolio';
    $dlCertificationPath        =   'download/certification';
    $dlAwardPath                =   'download/award';
    $dlFilesPath                =   'download/files';
    $imagePath                  =   'multimedia/image';
    $sourcePath                 =   $imagePath . '/source';
    $extensionPath              =   $imagePath . '/extension';
    $certificationPath          =   $imagePath . '/certification';
    $awardPath                  =   $imagePath . '/award';
    $pathAboutDummy             =   $imagePath . '/dummy_about_image.png';
    $pathThumbnailDummy         =   $imagePath . '/dummy_thumbnail_image.png';
    $pathAboutImage             =   $sourcePath . '/about/thumb_profile_image_X.png';
    $altAboutImage              =   'Profile image of the developer in question!';
    $altDummy                   =   'Oh, it looks like one of my monkeys ran away with the description as well as the image!';
    $videoValues                =   [
                                        'My own video presentation',
                                        'A video representing The Royalist Campaign &copy;'
                                    ];

    // Turn on the output buffering and start generating the content of the site.
    ob_start();

    // Generate the combined css style files and thumbnails if some/all are missing, run this script once a week.
    if (date('D') == 'Mon') {
        require_once('styling.php');
        require_once('thumbnail.php');
    }

    // Generate the pages.
    require_once('sections/abo.php');
    require_once('sections/por.php');

    // Assign the variable the content of the buffer, up until the Qualification pages, which is used in the template.
    $content = ob_get_clean();

    // Turn on the output buffering again and continue with the Qualification pages.
    ob_start();
    require_once('sections/qua.php');

    // Generate the contact form.
    require_once('sections/sen.php');

    // Generate the sitemap.xml and prepare the data for the map.php file.
    require_once('sitemap.php');
    require_once('sections/map.php');

    // Assign the content of the buffer, which is used in the template, then empty the buffer and turn off output buffering.
    $content .= ob_get_clean();

    // Include the template, which is used for creating the entire website with data from $content, and echo the meta data stated below.
    $title                      =   'goldenmaza - Software Developer';
    $date                       =   '2015 - ' . date('Y');
    $keywords                   =   'mats richard hellstrand, goldenmaza, maza, system developer, software developer, fullstack developer, web designer, webdesigner, webdesign, wed design, systemutvecklare, webbutvecklare, webbdesign, certified java programmer, certifierad java utvecklare';
    $description                =   'Software Developer that loves everything regarding software engineering!';
    $author                     =   'goldenmaza - Mats Richard Hellstrand';
    require_once('template.php');

?>
