<?php

    /**
     *
     * The following lines are used for loading data from the database,
     * by constructing an array with the neccessary information for each
     * table, and then sending this array through the loadingSession-method.
     *
     * @package     Homepage
     * @author      Mats Richard Hellstrand
     * @copyright   Copyright (c) 2015-2025, Mats Richard Hellstrand
     * @license     TODO: http://
     * @link        TODO: http://
     * @since       July 18th, 2020 - Version 1.5
     */
    // ===========================================================================

    require_once('configuration.php');
    require_once('DatabaseHandler.php');

    $handler                    = new DatabaseHandler($host, $account, $password, $dbname);
    $alpha_information          = NULL;
    $alpha_informationSize      = NULL;
    $alpha_project              = NULL;
    $alpha_projectSize          = NULL;
    $alpha_education            = NULL;
    $alpha_educationSize        = NULL;
    $alpha_degree               = NULL;
    $alpha_degreeSize           = NULL;
    $alpha_career               = NULL;
    $alpha_careerSize           = NULL;
    $alpha_result               = NULL;
    $alpha_resultSize           = NULL;
    $alpha_experience           = NULL;
    $alpha_experienceSize       = NULL;
    $alpha_certification        = NULL;
    $alpha_certificationSize    = NULL;
    $alpha_award                = NULL;
    $alpha_awardSize            = NULL;
    $alpha_testimonial          = NULL;
    $alpha_testimonialSize      = NULL;

    // Alpha_Information-table, which holds the paragraphs used for the About page.
    $fetchInformation = [
        'table'=>['alpha_information'],
        'column'=>[],
        'condition'=>[],
        'order'=>['id'],
        'sort'=>['ASC']
    ];
    if (!$handler->loadingSession($fetchInformation)) {
        // echo 'ERROR with loading Information';
    }

    // Alpha_Project-table, which holds the items listed under the Portfolio page(s).
    $fetchProject = [
        'table'=>['alpha_project'],
        'column'=>[],
        'condition'=>[],
        'order'=>['beginning'],
        'sort'=>['DESC']
    ];
    if (!$handler->loadingSession($fetchProject)) {
        // echo 'ERROR with loading Project';
    }

    // Alpha_Degree-table, which holds the degrees used for the Education - Degree page(s).
    $fetchDegree = [
        'table'=>['alpha_degree'],
        'column'=>[],
        'condition'=>[],
        'order'=>['name', 'graduation'],
        'sort'=>['ASC', 'ASC']
    ];
    if (!$handler->loadingSession($fetchDegree)) {
        // echo 'ERROR with loading Degree';
    }

    // Alpha_Education-table, which holds the courses used for the Education - Course page(s).
    $fetchEducation = [
        'table'=>['alpha_education'],
        'column'=>[],
        'condition'=>[],
        'order'=>['institution', 'graduation'],
        'sort'=>['ASC', 'ASC']
    ];
    if (!$handler->loadingSession($fetchEducation)) {
        // echo 'ERROR with loading Education';
    }

    // Alpha_Career-table, which holds the jobs listed under the Career page(s).
    $fetchCareer = [
        'table'=>['alpha_career'],
        'column'=>[],
        'condition'=>[],
        'order'=>['beginning'],
        'sort'=>['DESC']
    ];
    if (!$handler->loadingSession($fetchCareer)) {
        // echo 'ERROR with loading Career';
    }

    // Alpha_Result-table, which holds the scores listed under the Result page(s).
    $fetchResult = [
        'table'=>['alpha_result'],
        'column'=>[],
        'condition'=>[],
        'order'=>['beginning'],
        'sort'=>['DESC']
    ];
    if (!$handler->loadingSession($fetchResult)) {
        // echo 'ERROR with loading Result';
    }

    // Alpha_Experience-table, which holds the fields of knowledge under the Experience page(s).
    $fetchExperience = [
        'table'=>['alpha_experience'],
        'column'=>[],
        'condition'=>[],
        'order'=>[],
        'sort'=>[]
    ];
    if (!$handler->loadingSession($fetchExperience)) {
        // echo 'ERROR with loading Experience';
    }

    // Alpha_Certification-table, which holds the certifications listed under the Certification page(s).
    $fetchCertification = [
        'table'=>['alpha_certification'],
        'column'=>[],
        'condition'=>[],
        'order'=>[],
        'sort'=>[]
    ];
    if (!$handler->loadingSession($fetchCertification)) {
        // echo 'ERROR with loading Certification';
    }

    // Alpha_Award-table, which holds the awards listed under the Award page(s).
    $fetchAward = [
        'table'=>['alpha_award'],
        'column'=>[],
        'condition'=>[],
        'order'=>[],
        'sort'=>['']
    ];
    if (!$handler->loadingSession($fetchAward)) {
        // echo 'ERROR with loading Award';
    }

    // Alpha_Testimonial-table, which holds the quotes listed under the Testimonial page(s).
    $fetchTestimonial = [
        'table'=>['alpha_testimonial'],
        'column'=>[],
        'condition'=>[],
        'order'=>['company'],
        'sort'=>['DESC']
    ];
    if (!$handler->loadingSession($fetchTestimonial)) {
        // echo 'ERROR with loading Testimonial';
    }

    require_once('prepare.php');

?>
