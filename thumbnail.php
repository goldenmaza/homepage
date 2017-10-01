<?php

	/**
	 * thumbnail.php
	 *
	 * This file is used for generating the thumbnails used around the site.
	 * 
	 * @package				Homepage
	 * @author				Richard M. Hellstrand
	 * @copyright			Copyright (c) 2015-2017, Mats Richard Hellstrand
	 * @license				http://www.alpheria.com/about/license.html
	 * @link				http://www.alpheria.com
	 * @since				June 17th, 2017 - Version 1.0
	 */

	// ===========================================================================

	// Generate the thumbnails.
	$defaultThumbWidth = 300;
	$thumbnailArray = null;
	$iterator = new RecursiveIteratorIterator(new RecursiveDirectoryIterator($sourcePath, RecursiveDirectoryIterator::SKIP_DOTS), RecursiveIteratorIterator::SELF_FIRST);
	foreach ($iterator as $path) {
		if ($path->isDir()) {
			$thumbnailArray[$path->__toString()] = null;
		}
		else {
			$filePath = $path->__toString();
			if (strpos($filePath, "thumb_") === false) {
				end($thumbnailArray);
				$thumbnailArray[key($thumbnailArray)][] = $filePath;
			}
		}
	}

	foreach ($thumbnailArray as &$folderSortArray) {
		sort($folderSortArray);
	}

	foreach ($thumbnailArray as $thumbnailKey => $folderArray) {
		foreach ($folderArray as $folderKey => $fileName) {
			$imageSource = imagecreatefrompng($fileName);
			$currentWidth = imagesx($imageSource);
			$currentHeight = imagesy($imageSource);
			$newWidth = $defaultThumbWidth;
			$newHeight = floor($currentHeight * ($defaultThumbWidth / $currentWidth));
			$newSource = imagecreatetruecolor($newWidth, $newHeight);
			imagecopyresized($newSource, $imageSource, 0, 0, 0, 0, $newWidth, $newHeight, $currentWidth, $currentHeight);
			imagepng($newSource, $thumbnailKey . "/thumb_" . basename($fileName));
		}
	}

?>