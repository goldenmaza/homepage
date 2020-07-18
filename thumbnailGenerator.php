<?php

    /**
     * thumbnailGenerator.php
     *
     * This file is used for generating the thumbnails used around the site.
     *
     * @package     Homepage
     * @author      Mats Richard Hellstrand
     * @copyright   Copyright (c) 2015-2025, Mats Richard Hellstrand
     * @license     TODO: http://
     * @link        TODO: http://
     * @since       July 18th, 2020 - Version 1.2
     */
    // ===========================================================================

    // Generate the thumbnails.
    const DEFAULT_THUMBNAIL_WIDTH = 300;
    $thumbnailArray = [];

    // Iterate the directory of sources and fetch all images without thumb prefix.
    $iterator = new RecursiveIteratorIterator(new RecursiveDirectoryIterator($sourcePath, RecursiveDirectoryIterator::SKIP_DOTS), RecursiveIteratorIterator::SELF_FIRST);
    foreach ($iterator as $path) {
        if ($path->isDir()) {
            $thumbnailArray[$path->__toString()] = null;
        } else {
            $filePath = $path->__toString();
            if (strpos($filePath, "thumb_") === false) {
                end($thumbnailArray);
                $thumbnailArray[key($thumbnailArray)][] = $filePath;
            }
        }
    }

    // Sort the files by name.
    foreach ($thumbnailArray as &$folderSortArray) {
        sort($folderSortArray);
    }

    // Iterate through the collection of fullsize images and create thumbnails.
    foreach ($thumbnailArray as $thumbnailKey => $folderArray) {
        foreach ($folderArray as $folderKey => $fileName) {
            $imageSource = imagecreatefrompng($fileName);
            $currentWidth = imagesx($imageSource);
            $currentHeight = imagesy($imageSource);
            $newWidth = DEFAULT_THUMBNAIL_WIDTH;
            $newHeight = floor($currentHeight * (DEFAULT_THUMBNAIL_WIDTH / $currentWidth));
            $newSource = imagecreatetruecolor($newWidth, $newHeight);
            imagecopyresized($newSource, $imageSource, 0, 0, 0, 0, $newWidth, $newHeight, $currentWidth, $currentHeight);
            imagepng($newSource, $thumbnailKey . "/thumb_" . basename($fileName));
        }
    }

?>
