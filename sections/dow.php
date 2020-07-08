<?php

    echo'
        <h3 class="hidden">Downloads section</h3>
    ';
    if (isset($downloadKeyMatching)) {
        echo'
            <section id="dow0" class="sections" data-sitemap="Download section">
                <div class="container">
                    <div class="containerColumn">
                        <div class="containerRow">
                            <h4>
                                <a href="#qua" title="Return to the Qualification page!">List of Downloadable files</a>
                            </h4>
                        </div><!-- containerRow ends -->
                    </div><!-- containerColumn ends -->
                    <div class="containerColumn">
        ';
        foreach ($downloadKeyMatching as $sectionKey => $sectionArray) {
            echo'
                        <div class="containerSwap gridLayout">
            ';
            foreach ($sectionArray as $fileKey => $fileArray) {
                echo'
                            <div class="containerColumn exceptionColumn">
                                <div class="containerRow downloadHeader">
                                    <h5>' . $fileArray[0] . '</h5>
                                </div><!-- containerRow ends -->
                ';
                foreach ($fileArray[1] as $arrayKey => $arrayValue) {
                    $filename = substr($arrayValue, strrpos($arrayValue, '/'), strlen($arrayValue));
                    $extension = pathinfo($arrayValue, PATHINFO_EXTENSION);
                    echo'
                                <div class="containerColumn displaySummaryContainer downloadElement">
                                    <a href="' . $arrayValue . '" target="_blank" title="Download the ' . $filename . ' file!" download>
                                        <span class="dows ' . $extension . '">Download the ' . $extension . ' file...</span>
                                    </a>
                                </div><!-- containerColumn ends -->
                    ';
                }
                echo'
                            </div><!-- containerColumn ends -->
                ';
            }
            echo'
                        </div><!-- containerSwap ends -->
            ';
        }
        echo'
                    </div><!-- containerColumn ends -->
                </div><!-- container ends -->
            </section><!-- section ends -->
        ';
    } else {
        echo'
            <section id="dow" class="sections" data-sitemap="Empty | Error">
                <div class="container">
                    <div class="containerColumn">
                        <h4>Unable to load data / no data to be loaded - regarding the Download page</h4>
                        <div class="containerRow">
                            <strong>Currently, this page was unable to load! Please, try again later!</strong>
                        </div><!-- containerRow ends -->
                    </div><!-- containerColumn ends -->
                </div><!-- container ends -->
            </section><!-- section ends -->
        ';
    }

?>
