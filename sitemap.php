<?php

	/**
	 * siemap.php
	 *
	 * This file is used for generating the sitemap.xml file and to prepare
	 * the sitemap data used for the map.php file.
	 * 
	 * @package				Homepage
	 * @author				Richard M. Hellstrand
	 * @copyright			Copyright (c) 2015-2017, Mats Richard Hellstrand
	 * @license				http://www.alpheria.com/about/license.html
	 * @link				http://www.alpheria.com
	 * @since				June 28th, 2020 - Version 1.1
	 */

	// ===========================================================================

	$priorityArray = ["abo", "pro", "deg", "job", "rec", "quo"];
	$frequencyArray = ["pro", "deg", "rec"];
	$bufferArray = explode(PHP_EOL, ob_get_contents());
	$sectionArray = [];
	$attributeArray = [];
	$finalArray = [[]];
	$output = "";
	$sitemapXML = "";

	// Trim/remove empty rows and rows with no html tags...
	foreach ($bufferArray as &$row) {
		$row = ltrim($row);
	}
	$bufferArray = array_filter($bufferArray);

	// Find and save all section tags...
	foreach ($bufferArray as $row) {
		if (strpos($row, "<section id=") !== false) {
			$sectionArray[] = $row;
		}
	}

	// Take out the attributes and their data...
	foreach ($sectionArray as $sectionString) {
		preg_match_all('~"(.*?)"~', $sectionString, $output);
		$attributeArray[] = $output[1];
	}

	// Remove unwanted attributes...
	for ($i = 0; $i < count($attributeArray); $i++) {
		foreach ($attributeArray[$i] as $notUsed) {
			unset($attributeArray[$i][1]);
		}
		$attributeArray[$i] = array_values($attributeArray[$i]);
	}

	// Update the keys so they are now poiting to each type of pages instead of integers...
	foreach ($attributeArray as $attribute) {
		$finalArray[preg_replace('/[0-9]+/', '', $attribute[0])][] = $attribute;
	}
	unset($finalArray[0]);
	array_pop($finalArray);

	// Construct XML data and save to the sitemap.xml file but only during once a month.
	if (date("j") == "1") {
		$sitemapXML = '<?xml version="1.0" encoding="UTF-8"?>' . PHP_EOL;
		$sitemapXML .= '<urlset xmlns="http://www.sitemaps.org/schemas/sitemap/0.9">' . PHP_EOL;
		foreach ($finalArray as $finalKey => $pagesArray) {
			foreach ($pagesArray as $pagesKey => $pageArray) {
			   $sitemapXML .= "\t<url>" . PHP_EOL;
			   $sitemapXML .= "\t\t<loc>http://www.hellstrand.org/?#" . $pageArray[0] . "</loc>" . PHP_EOL;
			   $sitemapXML .= "\t\t<changefreq>" . (in_array($finalKey, $frequencyArray) ? "monthly" : "yearly") . "</changefreq>" . PHP_EOL;
			   $sitemapXML .= "\t\t<priority>" . (in_array($finalKey, $priorityArray) ? "1.0" : "0.5") . "</priority>" . PHP_EOL;
			   $sitemapXML .= "\t</url>" . PHP_EOL;
			}
		}
		$sitemapXML .= "</urlset>";
		file_put_contents('Sitemap.xml', $sitemapXML, LOCK_EX);
	}

?>