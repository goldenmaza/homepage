<?php

    echo'
        <h3 class="hidden">Experience sections</h3>
    ';
    if (isset($alpha_experienceSize) && isset($alpha_informationSize)) {
        $paragraphs = [];
        for ($i = 0; $i < $alpha_informationSize; $i++) {
            if ($alpha_information[$i]->getPage() == 'exp') {
                $paragraphs[] = $alpha_information[$i]->getParagraph();
            }
        }
        $data = [];
        $category = [];
        for ($i = 0; $i < $alpha_experienceSize; $i++) {
            $data[$alpha_experience[$i]->getCategory()][$alpha_experience[$i]->getValue()] = $alpha_experience[$i]->getGrading();
            $category[$i] = $alpha_experience[$i]->getCategory();
        }
        $index = 0;
        $paragraphsSize = count($paragraphs);
        $category = array_values(array_unique($category));
        $pages = count($category);
        for ($i = 0; $i <= $pages; $i++) {
            $sectionId = 'exp' . $i;
            $heading = ($i > 0 ? $category[$i - 1] : "Summary");
            $notAtStart = $i !== 0;
            $notAtEnd = $i !== $pages;
            echo'
                <section id="' . $sectionId . '" class="sections" data-sitemap="' . $heading . '">
                    <div class="container">
                        <header>
                            <ul class="containerRow">
                                <li class="previousPage' . ($notAtStart ? '' : ' disabled') . '">
                                    <a' . ($notAtStart ? (' href="#exp' . ($i - 1) . '"') : '') . ' title="Previous page, please!">
                                        <span>Prev</span>
                                    </a>
                                </li><!-- previousPage ends -->
                                <li class="nextPage' . ($notAtEnd ? '' : ' disabled') . '">
                                    <a' . ($notAtEnd ? (' href="#exp' . ($i + 1) . '"') : '') . ' title="Next page, please!">
                                        <span>Next</span>
                                    </a>
                                </li><!-- nextPage ends -->
                            </ul><!-- containerRow ends -->
                        </header><!-- header ends -->
                        <div class="containerColumn">
                            <div class="containerRow">
                                <h4>
                                    <a href="#qua" title="Return to the Qualification page!">' . $heading . '</a>
                                </h4>
                            </div><!-- containerRow ends -->
                            <div class="containerSwap">
                                <div class="containerColumn">
            ';
            if (isset($paragraphs)) {
                if ($index === $paragraphsSize) {
                    $index = 1;
                }
                echo'
                                    <p class="text-justify">' . htmlspecialchars_decode($paragraphs[$index++]) . '</p>
                ';
            }
            echo'
                                </div><!-- containerColumn ends -->
                                <div class="containerColumn">
                                    <ul id="skill' . $i . '" class="containerColumn skillTree">
            ';
            if ($i > 0) {
                foreach ($data as $cat => $arr) {
                    if ($category[$i - 1] == $cat) {
                        $vals = NULL;
                        foreach ($arr as $value => $grading) {
                            $vals[$grading][] = $value;
                        }
                        foreach ($vals as $grading => $values) {
                            echo'
                                        <li>
                                            <p>' . implode(", ", $values) . '</p>
                                        </li>
                                        <li class="containerColumn line">
                                            <span class="containerRow expand ' . getLine($grading) . '"></span>
                                        </li>
                            ';
                        }
                    }
                }
            } else {
                for ($j = 0; $j < $pages; $j++) {
                    echo'
                                        <li>
                                            <p>' . $category[$j] . '</p>
                                        </li>
                                        <li class="containerColumn line">
                                            <span class="containerRow expand ' . getLine(getAverage($data[$category[$j]])) . '"></span>
                                        </li>
                    ';
                }
            }
            echo'
                                    </ul><!-- skillTree ends -->
                                </div><!-- containerColumn ends -->
                            </div><!-- containerSwap ends -->
                        </div><!-- containerColumn ends -->
                    </div><!-- container ends -->
                </section><!-- section ends -->
            ';
        }   
    } else {
        echo'
            <section id="exp0" class="sections" data-sitemap="Empty | Error">
                <div class="container">
                    <div class="containerColumn">
                        <h4>Unable to load data / no data to be loaded - regarding the Experience pages</h4>
                        <div class="containerRow">
                            <strong>Currently, this page was unable to load! Please, try again later!</strong>
                        </div><!-- containerRow ends -->
                    </div><!-- containerColumn ends -->
                </div><!-- container ends -->
            </section><!-- section ends -->
        ';
    }

    function getAverage($array) {
        return round(array_sum($array) / count($array));
    }

    function getLine($grading) {
        $line = "beginnerLine";

        if ($grading == 2) {
            $line = "basicLine";
        } else if ($grading == 3) {
            $line = "goodLine";
        } else if ($grading == 4) {
            $line = "advanceLine";
        } else if ($grading == 5) {
            $line = "expertLine";
        }

        return $line;
    }

?>
