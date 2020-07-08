<?php

    echo'
        <h3 class="hidden">Result sections</h3>
    ';
    if (isset($alpha_resultSize)) {
        $pages = ceil($alpha_resultSize / $defaultListGrid);
        $currentLimit = 0;
        $n = 0;
        for ($i = 0; $i < $pages; $i++) {
            $sectionId = 'res' . $i;
            $notAtStart = $i !== 0;
            $notAtEnd = $i != $pages - 1;//TODO: bug that makes the strict comparison not work with pages
            $limit = 0;
            echo'
                <section id="' . $sectionId . '" class="sections" data-sitemap="List of Results - p. ' . ($i + 1) . '">
                    <div class="container">
                        <header>
                            <ul class="containerRow">
                                <li class="previousPage' . ($notAtStart ? '' : ' disabled') . '">
                                    <a' . ($notAtStart ? (' href="#res' . ($i - 1) . '"') : '') . ' title="Previous page, please!">
                                        <span>Prev</span>
                                    </a>
                                </li><!-- previousPage ends -->
                                <li class="nextPage' . ($notAtEnd ? '' : ' disabled') . '">
                                    <a' . ($notAtEnd ? (' href="#res' . ($i + 1) . '"') : '') . ' title="Next page, please!">
                                        <span>Next</span>
                                    </a>
                                </li><!-- nextPage ends -->
                            </ul><!-- containerRow ends -->
                        </header><!-- header ends -->
                        <div class="containerColumn">
                            <div class="containerRow">
                                <h4>
                                    <a href="#qua" title="Return to the Qualification page!">List of Results</a>
                                </h4>
                            </div><!-- containerRow ends -->
            ';
            for ($j = $n; $j < $alpha_resultSize && $defaultListGrid !== $limit; $j++) {
                $emptyLink = is_null($alpha_result[$j]->getWebsite());
                $anchorClass = $emptyLink ? 'disabled' : '';
                $hrefTag = $emptyLink ? '' : 'href="' . $alpha_result[$j]->getWebsite() . '"';
                $startDate = date_format(new DateTime($alpha_result[$j]->getBeginning()), 'M jS, Y');
                $endDate = $alpha_result[$j]->getEnding() === NULL ? 'UFN' : date_format(new DateTime($alpha_result[$j]->getEnding()), 'M jS, Y');
                echo'
                            <div class="containerColumn force-left">
                                <div class="containerSwap force-left">
                                    <div class="containerRow force-text-right">
                                        <span class="force-mini-left">Agent: </span>
                                        <a class="' . $anchorClass . '" ' . $hrefTag . ' target="_blank" title="Visit the official website of the testing agent!">' . $alpha_result[$j]->getAgent() . '</a>
                                    </div><!-- containerRow ends -->
                                    <div class="containerRow">
                                        <span class="force-mini-left">Test: </span>
                                        <a class="viewTarget" href="#sco' . $j . '" title="Visit the page regarding the test results!">' . $alpha_result[$j]->getName() . '</a>
                                    </div><!-- containerRow ends -->
                                </div><!-- containerSwap ends -->
                                <div class="containerSwap force-left">
                                    <div class="containerRow force-text-right">
                                        <span class="force-mini-left">Date: </span>
                                        <p>' . $startDate . ' - ' . $endDate . '</p>
                                    </div><!-- containerRow ends -->
                                    <div class="containerRow">
                                        <span class="force-mini-left">Score: </span>
                                        <p>' . $alpha_result[$j]->getScore() . '</p>
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
        for ($i = 0; $i < $alpha_resultSize; $i++) {
            $sectionId = 'sco' . $i;
            $notAtStart = $i !== 0;
            $notAtEnd = $i !== $alpha_resultSize - 1;
            $emptyLink = is_null($alpha_result[$i]->getWebsite());
            $anchorClass = $emptyLink ? 'disabled' : '';
            $hrefTag = $emptyLink ? '' : 'href="' . $alpha_result[$i]->getWebsite() . '"';
            $startDate = date_format(new DateTime($alpha_result[$i]->getBeginning()), 'M jS, Y');
            $endDate = $alpha_result[$i]->getEnding() === NULL ? 'UFN' : date_format(new DateTime($alpha_result[$i]->getEnding()), 'M jS, Y');
            $date = $alpha_result[$i]->getBeginning() === $alpha_result[$i]->getEnding() ? $startDate : $startDate . ' - ' . $endDate;
            echo'
                <section id="' . $sectionId . '" class="sections" data-sitemap="' . $alpha_result[$i]->getName() . '">
                    <div class="container">
                        <header>
                            <ul class="containerRow">
                                <li class="previousPage' . ($notAtStart ? '' : ' disabled') . '">
                                    <a' . ($notAtStart ? (' href="#sco' . ($i - 1) . '"') : '') . ' title="Previous page, please!">
                                        <span>Prev</span>
                                    </a>
                                </li><!-- previousPage ends -->
                                <li class="nextPage' . ($notAtEnd ? '' : ' disabled') . '">
                                    <a' . ($notAtEnd ? (' href="#sco' . ($i + 1) . '"') : '') . ' title="Next page, please!">
                                        <span>Next</span>
                                    </a>
                                </li><!-- nextPage ends -->
                            </ul><!-- containerRow ends -->
                        </header><!-- header ends -->
                        <div class="containerColumn">
                            <div class="containerRow">
                                <h4>
                                    <a href="#res0" title="Return to the Results page!">' . $alpha_result[$i]->getScore() . ' at ' . $alpha_result[$i]->getName() . '</a>
                                </h4>
                            </div><!-- containerRow ends -->
                            <div class="containerColumn force-left">
                                <div class="containerSwap force-left">
                                    <div class="containerRow force-text-right">
                                        <span class="force-mini-left">Agent: </span>
                                        <a class="' . $anchorClass . '" ' . $hrefTag . ' target="_blank" title="Visit the official website of the testing agent!">' . $alpha_result[$i]->getAgent() . '</a>
                                    </div><!-- containerRow ends -->
                                    <div class="containerRow">
                                        <span class="force-mini-left">Name: </span>
                                        <p>' . $alpha_result[$i]->getName() . '</p>
                                    </div><!-- containerRow ends -->
                                </div><!-- containerSwap ends -->
                                <div class="containerSwap force-left">
                                    <div class="containerRow force-text-right">
                                        <span class="force-mini-left">Date: </span>
                                        <p>' . $date . '</p>
                                    </div><!-- containerRow ends -->
                                    <div class="containerRow">
                                        <span class="force-mini-left">Score: </span>
                                        <p>' . $alpha_result[$i]->getScore() . '</p>
                                    </div><!-- containerRow ends -->
                                </div><!-- containerSwap ends -->
                            </div><!-- containerColumn ends -->
                            <div class="containerSwap">
                                <div class="containerColumn">
                                    <div class="containerColumn">
                                        <p class="text-justify">' . htmlspecialchars_decode($alpha_result[$i]->getDescription()) . '</p>
                                    </div><!-- containerColumn ends -->
                                    <div class="containerColumn">
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
            <section id="res0" class="sections" data-sitemap="Empty | Error">
                <div class="container">
                    <div class="containerColumn">
                        <h4>Unable to load data / no data to be loaded - regarding the Result pages</h4>
                        <div class="containerRow">
                            <strong>Currently, this page was unable to load! Please, try again later!</strong>
                        </div><!-- containerRow ends -->
                    </div><!-- containerColumn ends -->
                </div><!-- container ends -->
            </section><!-- section ends -->
        ';
    }

?>
