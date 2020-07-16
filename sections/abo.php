<?php

    echo'
        <h2 class="hidden">About\'s sections</h2>
    ';
    if (isset($alpha_informationSize)) {
        $titles = [];
        $paragraphs = [[]];
        for ($i = 0; $i < $alpha_informationSize; $i++) {
            $title = $alpha_information[$i]->getTitle();
            if ($alpha_information[$i]->getPage() === 'abo') {
                if (!in_array($title, $titles)) {
                    $titles[] = $title;
                }
                $paragraphs[$alpha_information[$i]->getGroup()][] = $alpha_information[$i]->getParagraph();
            }
        }
        $pages = count($titles);
        for ($i = 0; $i < $pages; $i++) {
            $sectionId = 'abo' . $i;
            $notAtStart = $i !== 0;
            $notAtEnd = $i !== $pages - 1;
            $filePathLocation = str_replace('X', $i, $pathAboutImage);
            $fileLocated = file_exists($filePathLocation);
            $imageSrc = $fileLocated ? $filePathLocation : $pathAboutDummy;
            $imageAlt = $fileLocated ? $altAboutImage : $altDummy;
            echo'
                <section id="' . $sectionId . '" class="sections" data-sitemap="' . $titles[$i] . '">
                    <div class="container">
                        <header>
                            <ul class="containerRow">
                                <li class="previousPage' . ($notAtStart ? '' : ' disabled') . '">
                                    <a' . ($notAtStart ? (' href="#abo' . ($i - 1) . '"') : '') . ' title="Previous page, please!">
                                        <span>Prev</span>
                                    </a>
                                </li><!-- previousPage ends -->
                                <li class="nextPage' . ($notAtEnd ? '' : ' disabled') . '">
                                    <a' . ($notAtEnd ? (' href="#abo' . ($i + 1) . '"') : '') . ' title="Next page, please!">
                                        <span>Next</span>
                                    </a>
                                </li><!-- nextPage ends -->
                            </ul><!-- containerRow ends -->
                        </header><!-- header ends -->
                        <div class="containerSwap profileLayout">
                            <div class="containerColumn">
                                <h3>' . $titles[$i] . '</h3>
            ';
            $paragraphsSize = count($paragraphs[$i]);
            for ($j = 0; $j < $paragraphsSize; $j++) {
                echo'
                                <p class="text-justify">' . $paragraphs[$i][$j] . '</p>
                ';
            }
            echo'
                            </div><!-- containerColumn ends -->
                            <div class="containerColumn">
                                <div class="containerRow">
                                    <a href="' . str_replace('thumb_', '', $imageSrc) . '" title="View a high resolution of the targeted multimedia file..." aria-labelledby="View a high resolution of the targeted multimedia file...">
                                        <img class="displayProfileImage" src="' . $imageSrc . '" alt="' . $imageAlt . '" />
                                    </a>
                                </div><!-- containerRow ends -->
                                <div class="containerRow gridLayout iconsBar">
                                    <a class="email" href="mailto:anubis@live.se" title="Get in contact with me on my public e-mail address! Donors or relatives from Africa can scam someone else!" aria-labelledby="Get in contact with me on my public e-mail address! Donors or relatives from Africa can scam someone else!"></a>
                                    <a class="linkedin" href="https://www.linkedin.com/in/goldenmaza" target="_blank" title="Visit my LinkedIn profile!" aria-labelledby="Visit my LinkedIn profile!"></a>
                                    <a class="skype" href="skype:goldenmaza" title="Get in contact with me on Skype! Donors or relatives from Africa can scam someone else!" aria-labelledby="Get in contact with me on Skype! Donors or relatives from Africa can scam someone else!"></a>
                                    <a class="github" href="https://github.com/goldenmaza" target="_blank" title="Visit my GitHub profile!" aria-labelledby="Visit my GitHub profile!"></a>
                                    <a class="disabled videopresentation" ' . (false ? 'href="?#abo0"' : '') . ' target="_blank" title="View my video presentation!" aria-labelledby="View my video presentation!"></a>
                                    <a class="disabled download" ' . (false ? 'href="?#abo0"' : '') . ' title="Go to the Download page for my curriculum vitae and cover letter!" aria-labelledby="Go to the Download page for my curriculum vitae and cover letter!"></a>
                                    <a class="disabled facebook" ' . (false ? 'href="?#abo0"' : '') . ' target="_blank" title="I like individuality and getting a Facebook account just means I follow the flow! I only care about document flow!" aria-labelledby="I like individuality and getting a Facebook account just means I follow the flow! I only care about document flow!"></a>
                                    <a class="disabled youtube" ' . (false ? 'href="?#abo0"' : '') . ' target="_blank" title="I will get a YouTube account and it will be used for making videos about software engineering!" aria-labelledby="I will get a YouTube account and it will be used for making videos about software engineering!"></a>
                                    <a class="disabled twitter" ' . (false ? 'href="?#abo0"' : '') . ' target="_blank" title="I will not get a Twitter account because of the negative aspects it has on society and people\'s interaction with others. Also, people like the Kardashians and Biebers can be found there! Do I need to say more?" aria-labelledby="I will not get a Twitter account because of the negative aspects it has on society and people\'s interaction with others. Also, people like the Kardashians and Biebers can be found there! Do I need to say more?"></a>
                                </div><!-- containerRow ends -->
                            </div><!-- containerColumn ends -->
                        </div><!-- containerSwap ends -->
                    </div><!-- container ends -->
                </section><!-- section ends -->
            ';
        }
        //include("sections/vid.php");
    } else {
        echo'
            <section id="abo0" class="sections" data-sitemap="Empty | Error">
                <div class="container">
                    <div class="containerColumn">
                        <h3>Unable to load data / no data to be loaded - regarding the About pages</h3>
                        <div class="containerRow">
                            <strong>Currently, this page was unable to load! Please, try again later!</strong>
                        </div><!-- containerRow ends -->
                    </div><!-- containerColumn ends -->
                </div><!-- container ends -->
            </section><!-- section ends -->
        ';
    }

?>
