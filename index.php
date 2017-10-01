﻿<?php

	// State any problems with the code.
	error_reporting(E_ERROR | E_WARNING | E_PARSE | E_NOTICE);

	/**
	 * index.php
	 *
	 * This file is used for setting up the index-page.
	 * 
	 * @package				Homepage
	 * @author				Richard M. Hellstrand
	 * @copyright			Copyright (c) 2015-2017, Mats Richard Hellstrand
	 * @license				http://www.alpheria.com/about/license.html
	 * @link				http://www.alpheria.com
	 * @since				June 10th, 2017 - Version 1.1
	 */

	// ===========================================================================

	require_once("database/Process.php");
	$_SESSION["process"] 		= new Process();
	require_once("database/fetch.php");

	$title 						= "goldenmaza - Software Developer";
	$date 						= "2015 - " . date("Y");

	$anchorTags 				= ["edu", "car", "res", "exp", "cer", "dow", "awa", "tes"];
	$qualificationCategories	= ["Education", "Career", "Results", "Experience", "Certifications", "Download", "Awards", "Testimonials"];
	$qualificationQuantities	= [
									$alpha_degreeSize + $alpha_educationSize, $alpha_careerSize, $alpha_resultSize, $alpha_experienceSize,
									$alpha_certificationSize, $alpha_downloadSize, $alpha_awardSize, $alpha_testimonialSize
								];
	$sitemapKeyMatching			= [
									"abo" => "About pages", "por" => "Portfolio overview", "pro" => "Project pages", "qua" => "Qualification overview",
									"edu" => "Education overview", "deg" => "Degree pages", "insp" => "Institute overview", "insc" => "Course pages",
									"car" => "Career overview", "job" => "Career pages", "res" => "Result overview", "sco" => "Result pages",
									"exp" => "Experience overview", "cer" => "Certification overview", "rec" => "Certification pages", "dow" => "Download overview",
									"awa" => "Award overview", "rew" => "Award pages", "tes" => "Testimonial overview", "quo" => "Testimonial pages",
									"con" => "Contact me"
								];
	$sitemapGrouping			= ["por", "qua", "edu", "deg", "car", "res", "exp", "cer", "dow", "awa", "tes", "con"];

	$portfolioGrid	 			= 8;
	$defaultListGrid			= 5;
	$lessLimit	 				= 4;
	$tabIndex					= 6;

	$quaDefaultTitle			= "Go to the X pages!";
	$dlPortfolioPath			= "download/portfolio";
	$dlCertificationPath		= "download/certification";
	$dlAwardPath				= "download/award";
	$dlFilesPath				= "download/files";
	$imagePath					= "multimedia/image";
	$sourcePath					= $imagePath . "/source";
	$extensionPath				= $imagePath . "/extension";
	$certificationPath			= $imagePath . "/certification";
	$awardPath					= $imagePath . "/award";
	$pathAboutDummy 			= $imagePath . "/dummy_about_image.png";
	$pathThumbnailDummy 		= $imagePath . "/dummy_thumbnail_image.png";
	$pathAboutImage 			= $sourcePath . "/about/thumb_profile_image_X.png";
	$altAboutImage 				= "Profile image of the developer in question!";
	$altDummy 					= "Oh, it looks like one of my monkeys ran away with the description as well as the image!";

	$videoValues				= [
									"My own video presentation",
									"A video representing The Royalist Campaign &copy;"
								];

	// Turn on the output buffering.
	ob_start();

	// Generate the thumbnails if some/all are missing, run this script once a week.
	if (date("D") == "Mon") {
		require_once("thumbnail.php");
	}

	// Generate the pages.
	require_once("sections/abo.php");
	require_once("sections/por.php");
	require_once("sections/qua.php");
	require_once("sections/sen.php");

	// Generate the sitemap.xml and prepare the data for the map.php file.
	require_once("sitemap.php");
	require_once("sections/map.php");

	// Assign the variable the content of the buffer, which is used in the template.
	$content = ob_get_contents();

	// Empty the buffer and turn off output buffering.
	ob_end_clean();

	// Include the template, which is used for creating the entire website.
	require_once("template.php");

?>