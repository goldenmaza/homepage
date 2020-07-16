<?php

    echo'
        <h2 class="hidden">Portfolio\'s sections</h2>
    ';
    if (isset($alpha_projectSize)) {
        $currentFile = basename(__FILE__, '.php');
        $pages = ceil($alpha_projectSize / $portfolioGrid);
        $currentLimit = 0;
        for ($i = 0; $i < $pages; $i++) {
            $sectionId = 'por' . $i;
            $notAtStart = $i !== 0;
            $notAtEnd = $i !== $pages - 1;
            echo'
                <section id="' . $sectionId . '" class="sections" data-sitemap="Thumbnails - p. ' . ($i + 1) . '">
                    <div class="container">
                        <header>
                            <ul class="containerRow">
                                <li class="previousPage' . ($notAtStart ? '' : ' disabled') . '">
                                    <a' . ($notAtStart ? (' href="#por' . ($i - 1) . '"') : '') . ' title="Previous page, please!">
                                        <span>Prev</span>
                                    </a>
                                </li><!-- previousPage ends -->
                                <li class="nextPage' . ($notAtEnd ? '' : ' disabled') . '">
                                    <a' . ($notAtEnd ? (' href="#por' . ($i + 1) . '"') : '') . ' title="Next page, please!">
                                        <span>Next</span>
                                    </a>
                                </li><!-- nextPage ends -->
                            </ul><!-- containerRow ends -->
                        </header><!-- header ends -->
                        <div class="containerColumn">
                            <div class="containerRow">
                                <h3>Thumbnails</h3>
                            </div><!-- containerRow ends -->
                            <div class="containerSwap gridLayout">
            ';
            for ($j = $currentLimit; $j < $alpha_projectSize; $j++) {
                $filePathLocation = $sourcePath . '/' . $alpha_project[$j]->getDirectory() . '/' . $alpha_project[$j]->getDirectory() . '.png';
                $fileLocated = file_exists($filePathLocation);
                $imageSrc = $fileLocated ? $filePathLocation : $pathThumbnailDummy;
                $imageAlt = $fileLocated ? 'The thumbnail used for the ' . $alpha_project[$j]->getName() . ' project!' : $altDummy;
                echo'
                                <div class="displayPortfolioGroup">
                                    <a href="#pro' . $j . '" title="View the ' . $alpha_project[$j]->getName() . ' project details!">
                                        <img src="' . $imageSrc . '" alt="' . $imageAlt . '" aria-labelledby="' . $imageAlt . '" />
                                    </a>
                                    <p class="overlay">' . $alpha_project[$j]->getName() . '</p>
                                </div><!-- displayPortfolioGroup ends -->
                ';
                $currentLimit++;
                if ($currentLimit % $portfolioGrid === 0) {
                    break;
                }
            }
            echo'
                            </div><!-- containerSwap ends -->
                        </div><!-- containerColumn ends -->
                    </div><!-- container ends -->
                </section><!-- section ends -->
            ';
        }
        for ($i = 0; $i < $alpha_projectSize; $i++) {
            $sectionId = 'pro' . $i;
            $notAtStart = $i !== 0;
            $notAtEnd = $i !== $alpha_projectSize-1;
            $startDate = date_format(new DateTime($alpha_project[$i]->getBeginning()), 'M jS, Y');
            $endDate = $alpha_project[$i]->getEnding() === NULL ? 'UFN' : date_format(new DateTime($alpha_project[$i]->getEnding()), 'M jS, Y');
            $emptyLink = is_null($alpha_project[$i]->getWebsite());
            $anchorClass = $emptyLink ? 'disabled' : '';
            $hrefTag = $emptyLink ? '' : 'href="' . $alpha_project[$i]->getWebsite() . '"';
            echo'
                <section id="' . $sectionId . '" class="sections" data-sitemap="' . $alpha_project[$i]->getName() . '">
                    <div class="container">
                        <header>
                            <ul class="containerRow">
                                <li class="previousPage' . ($notAtStart ? '' : ' disabled') . '">
                                    <a' . ($notAtStart ? (' href="#pro' . ($i - 1) . '"') : '') . ' title="Previous page, please!">
                                        <span>Prev</span>
                                    </a>
                                </li><!-- previousPage ends -->
                                <li class="nextPage' . ($notAtEnd ? '' : ' disabled') . '">
                                    <a' . ($notAtEnd ? (' href="#pro' . ($i + 1) . '"') : '') . ' title="Next page, please!">
                                        <span>Next</span>
                                    </a>
                                </li><!-- nextPage ends -->
                            </ul><!-- containerRow ends -->
                        </header><!-- header ends -->
                        <div class="containerColumn">
                            <div class="containerRow">
                                <h3>
                                    <a href="#por0" title="Return to the Portfolio page!">' . $alpha_project[$i]->getName() . '</a>
                                </h3>
                            </div><!-- containerRow ends -->
                            <div class="containerColumn force-left">
                                <div class="containerSwap force-left">
                                    <div class="containerRow force-text-right">
                                        <span class="force-mini-right">Position: </span>
                                        <p>' . $alpha_project[$i]->getPosition() . '</p>
                                    </div><!-- containerRow ends -->
                                    <div class="containerRow">
                                        <span class="force-mini-left">Customer: </span>
                                        <p>' . $alpha_project[$i]->getCustomer() . '</p>
                                    </div><!-- containerRow ends -->
                                </div><!-- containerSwap ends -->
                                <div class="containerSwap force-left">
                                    <div class="containerRow force-text-right">
                                        <span class="force-mini-right">Date: </span>
                                        <p>' . $startDate . ' - ' . $endDate . '</p>
                                    </div><!-- containerRow ends -->
                                    <div class="containerRow">
                                        <span class="force-mini-left">Project: </span>
                                        <a class="' . $anchorClass . '" ' . $hrefTag . ' target="_blank" title="Visit the released ' . $alpha_project[$i]->getName() . ' project page!">' . $alpha_project[$i]->getName() . '</a>
                                    </div><!-- containerRow ends -->
                                </div><!-- containerSwap ends -->
                            </div><!-- containerColumn ends -->
                            <div class="containerSwap">
                                <div class="containerColumn">
                                    <div class="containerColumn">
                                        <p class="text-justify">' . htmlspecialchars_decode(str_replace('<br><br>', '</p>', $alpha_project[$i]->getDescription())) . '</p>
                                    </div><!-- containerColumn ends -->
                                    <div class="containerColumn">
                                        <p class="text-justify">Comprised of: ' . $alpha_project[$i]->getKeyword() . '</p>
                                    </div><!-- containerColumn ends -->
                                </div><!-- containerColumn ends -->
                                <div class="containerColumn">
                                    <div class="containerColumn portfolioMediaHolder iconsBar">
            ';
            $screensPathLocation = $sourcePath . '/' . $alpha_project[$i]->getDirectory() . '/';
            if (glob($screensPathLocation . '*.*') !== false) {
                $files = array_map('basename', glob($screensPathLocation . '*.*'));
                $filecount = count($files);
                for ($j = 1; $j < $filecount; $j++) {//skip the first image, as it is used by the Portfolio page...
                    if (strpos($files[$j], 'thumb_') === false) {//ignore thumbnails...
                        $imagePathThumb = $screensPathLocation . 'thumb_' . $files[$j];
                        $imagePathSrc = $screensPathLocation . $files[$j];
                        $downloadKeyMatching[$currentFile][$sectionId][0] = $alpha_project[$i]->getName();
                        $downloadKeyMatching[$currentFile][$sectionId][1][] = $imagePathSrc;
                        $qualificationKeyMatching['Download']++;
                        echo'
                                        <a href="' . $imagePathThumb . '" target="_blank" title="View the full image #' . ($j - 1) . ' of the ' . $alpha_project[$i]->getName() . ' project!">
                                            <img class="displayThumbnailImage expandingThumbnailImage" src="' . $imagePathThumb . '" alt="The thumbnail #' . $j . ' used for the ' . $alpha_project[$i]->getName() . ' project!" />
                                        </a>
                        ';
                    }
                }
            }
            echo'
                                    </div><!-- containerColumn ends -->
                                    <div class="containerColumn iconsBar">
            ';
            $downloadPathLocation = $dlPortfolioPath . '/' . $alpha_project[$i]->getDirectory() . '/';
            if (glob($downloadPathLocation . '*.*') !== false) {
                $files = array_map('basename', glob($downloadPathLocation . '*.*'));
                $filecount = count($files);
                for ($j = 0; $j < $filecount; $j++) {
                    $extension = pathinfo($files[$j], PATHINFO_EXTENSION);
                    $filePathLocation = $downloadPathLocation . $files[$j];
                    $downloadKeyMatching[$currentFile][$sectionId][1][] = $filePathLocation;
                    $qualificationKeyMatching['Download']++;
                    echo'
                                        <a class="expandingThumbnailIcon ' . $extension . '" href="' . $filePathLocation . '" target="_blank" title="Download ' . $files[$j] . '!"></a>
                    ';
                }
            }
            echo'
                                    </div><!-- containerColumn ends -->
                                </div><!-- containerColumn ends -->
                            </div><!-- containerSwap ends -->
                        </div><!-- containerColumn ends -->
                    </div><!-- container ends -->
                </section><!-- section ends -->
            ';
        }
    } else {
        echo'
            <section id="por0" class="sections" data-sitemap="Empty | Error">
                <div class="container">
                    <div class="containerColumn">
                        <h3>Unable to load data / no data to be loaded - regarding the Portfolio pages</h3>
                        <div class="containerRow">
                            <strong>Currently, this page was unable to load! Please, try again later!</strong>
                        </div><!-- containerRow ends -->
                    </div><!-- containerColumn ends -->
                </div><!-- container ends -->
            </section><!-- section ends -->
        ';
    }

?>
