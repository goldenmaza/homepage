<?php

    echo'
        <h3 class="hidden">Career sections</h3>
    ';
    if (isset($alpha_careerSize)) {
        $pages = ceil($alpha_careerSize / $defaultListGrid);
        $currentLimit = 0;
        $n = 0;
        for ($i = 0; $i < $pages; $i++) {
            $sectionId = 'car' . $i;
            $notAtStart = $i !== 0;
            $notAtEnd = $i != $pages - 1;//TODO: bug that makes the strict comparison not work with pages
            $limit = 0;
            echo'
                <section id="' . $sectionId . '" class="sections" data-sitemap="List of Careers - p. ' . ($i + 1) . '">
                    <div class="container">
                        <header>
                            <ul class="containerRow">
                                <li class="previousPage' . ($notAtStart ? '' : ' disabled') . '">
                                    <a' . ($notAtStart ? (' href="#car' . ($i - 1) . '"') : '') . ' title="Previous page, please!">
                                        <span>Prev</span>
                                    </a>
                                </li><!-- previousPage ends -->
                                <li class="nextPage' . ($notAtEnd ? '' : ' disabled') . '">
                                    <a' . ($notAtEnd ? (' href="#car' . ($i + 1) . '"') : '') . ' title="Next page, please!">
                                        <span>Next</span>
                                    </a>
                                </li><!-- nextPage ends -->
                            </ul><!-- containerRow ends -->
                        </header><!-- header ends -->
                        <div class="containerColumn">
                            <div class="containerRow">
                                <h4>
                                    <a href="#qua" title="Return to the Qualification page!">List of Careers</a>
                                </h4>
                            </div><!-- containerRow ends -->
            ';
            for ($j = $n; $j < $alpha_careerSize && $defaultListGrid !== $limit; $j++) {
                $emptyLink = is_null($alpha_career[$j]->getWebsite());
                $anchorClass = $emptyLink ? 'disabled' : '';
                $hrefTag = $emptyLink ? '' : 'href="' . $alpha_career[$j]->getWebsite() . '"';
                $startDate = date_format(new DateTime($alpha_career[$j]->getBeginning()), 'Y');
                $endDate = $alpha_career[$j]->getEnding() === NULL ? 'UFN' : date_format(new DateTime($alpha_career[$j]->getEnding()), 'Y');
                echo'
                            <div class="containerColumn force-left">
                                <div class="containerSwap force-left">
                                    <div class="containerRow force-text-right">
                                        <span class="force-mini-left">Employeer: </span>
                                        <a class="' . $anchorClass . '" ' . $hrefTag . ' target="_blank" title="Visit the official company website!">' . $alpha_career[$j]->getCompany() . '</a>
                                    </div><!-- containerRow ends -->
                                    <div class="containerRow">
                                        <span class="force-mini-left">Position: </span>
                                        <a class="viewTarget" href="#job' . $j . '" title="Visit the page regarding the position!">' . $alpha_career[$j]->getPosition() . '</a>
                                    </div><!-- containerRow ends -->
                                </div><!-- containerSwap ends -->
                                <div class="containerSwap force-left">
                                    <div class="containerRow force-text-right">
                                        <span class="force-mini-left">Duration: </span>
                                        <p>' . $startDate . ' - ' . $endDate . '</p>
                                    </div><!-- containerRow ends -->
                                    <div class="containerRow">
                                        <span class="force-mini-left">Keywords: </span>
                                        <p>' . $alpha_career[$j]->getKeyword() . '</p>
                                    </div><!-- containerRow ends -->
                                </div><!-- containerSwap ends -->
                            </div><!-- containerColumn ends -->
                ';
                $n = $j + 1;
                $limit++;
            }
            echo'
                        </div><!-- containerColumn ends -->
                    </div><!-- container ends -->
                </section><!-- section ends -->
            ';
        }
        for ($i = 0; $i < $alpha_careerSize; $i++) {
            $sectionId = 'job' . $i;
            $notAtStart = $i !== 0;
            $notAtEnd = $i !== $alpha_careerSize - 1;
            $emptyLink = is_null($alpha_career[$i]->getWebsite());
            $anchorClass = $emptyLink ? 'disabled' : '';
            $hrefTag = $emptyLink ? '' : 'href="' . $alpha_career[$i]->getWebsite() . '"';
            $startDate = date_format(new DateTime($alpha_career[$i]->getBeginning()), 'Y');
            $endDate = $alpha_career[$i]->getEnding() === NULL ? 'UFN' : date_format(new DateTime($alpha_career[$i]->getEnding()), 'Y');
            echo'
                <section id="' . $sectionId . '" class="sections" data-sitemap="' . $alpha_career[$i]->getCompany() . '">
                    <div class="container">
                        <header>
                            <ul class="containerRow">
                                <li class="previousPage' . ($notAtStart ? '' : ' disabled') . '">
                                    <a' . ($notAtStart ? (' href="#job' . ($i - 1) . '"') : '') . ' title="Previous page, please!">
                                        <span>Prev</span>
                                    </a>
                                </li><!-- previousPage ends -->
                                <li class="nextPage' . ($notAtEnd ? '' : ' disabled') . '">
                                    <a' . ($notAtEnd ? (' href="#job' . ($i + 1) . '"') : '') . ' title="Next page, please!">
                                        <span>Next</span>
                                    </a>
                                </li><!-- nextPage ends -->
                            </ul><!-- containerRow ends -->
                        </header><!-- header ends -->
                        <div class="containerColumn">
                            <div class="containerRow">
                                <h4>
                                    <a href="#car0" title="Return to the Careers page!">' . $alpha_career[$i]->getPosition() . ' at ' . $alpha_career[$i]->getCompany() . '</a>
                                </h4>
                            </div><!-- containerRow ends -->
                            <div class="containerColumn force-left">
                                <div class="containerSwap force-left">
                                    <div class="containerRow force-text-right">
                                        <span class="force-mini-left">Employeer: </span>
                                        <a class="' . $anchorClass . '" ' . $hrefTag . ' target="_blank" title="Visit the official company website!">' . $alpha_career[$i]->getCompany() . '</a>
                                    </div><!-- containerRow ends -->
                                    <div class="containerRow">
                                        <span class="force-mini-left">Position: </span>
                                        <a class="viewTarget" href="#job' . $i . '" title="Visit the page regarding the position!">' . $alpha_career[$i]->getPosition() . '</a>
                                    </div><!-- containerRow ends -->
                                </div><!-- containerSwap ends -->
                                <div class="containerSwap force-left">
                                    <div class="containerRow force-text-right">
                                        <span class="force-mini-left">Duration: </span>
                                        <p>' . $startDate . ' - ' . $endDate . '</p>
                                    </div><!-- containerRow ends -->
                                    <div class="containerRow">
                                        <span class="force-mini-left">Type: </span>
                                        <p>' . $alpha_career[$i]->getEmployment() . '</p>
                                    </div><!-- containerRow ends -->
                                </div><!-- containerSwap ends -->
                            </div><!-- containerColumn ends -->
                            <div class="containerSwap">
                                <div class="containerColumn">
                                    <div class="containerColumn">
                                        <p class="text-justify">' . htmlspecialchars_decode($alpha_career[$i]->getDescription()) . '</p>
                                    </div><!-- containerColumn ends -->
                                    <div class="containerColumn">
                                        <p class="text-justify">Comprised of: ' . $alpha_career[$i]->getKeyword() . '</p>
                                    </div><!-- containerColumn ends -->
                                </div><!-- containerColumn ends -->
                                <div class="containerColumn">
                                    <div class="containerColumn">
                                    </div><!-- containerColumn ends -->
                                    <div class="containerColumn">
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
            <section id="car0" class="sections" data-sitemap="Empty | Error">
                <div class="container">
                    <div class="containerColumn">
                        <h4>Unable to load data / no data to be loaded - regarding the Career pages</h4>
                        <div class="containerRow">
                            <strong>Currently, this page was unable to load! Please, try again later!</strong>
                        </div><!-- containerRow ends -->
                    </div><!-- containerColumn ends -->
                </div><!-- container ends -->
            </section><!-- section ends -->
        ';
    }

?>
