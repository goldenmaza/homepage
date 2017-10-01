<?php

	echo'
		<h2 class="hidden">
			About\'s sections
		</h2>
	';
	if (isset($alpha_informationSize) == true) {
		$titles = [];
		$paragraphs = [[]];
		for ($i = 0; $i < $alpha_informationSize; $i++) {
			$title = $alpha_information[$i]->getTitle();
			if ($alpha_information[$i]->getPage() == "abo") {
				if (!in_array($title, $titles)) {
					$titles[] = $title;
				}
				$paragraphs[$alpha_information[$i]->getGroup()][] = $alpha_information[$i]->getParagraph();
			}
		}
		$pages = count($titles);
		for ($i = 0; $i < $pages; $i++) {
			$filePathLocation = str_replace("X", $i, $pathAboutImage);
			$fileLocated = file_exists($filePathLocation);
			echo'
				<section id="abo' . $i . '" class="sections" data-sitemap="' . $titles[$i] . '">
					<div class="container">
						<div class="row col-12-xs">
							<ul>
			';
			if ($i != 0) {
				echo'
								<li class="previousPage">
									<a href="#abo' . ($i-1) . '" title="Previous page, please!" tabindex="' . ++$tabIndex . '">
										<span>
											Prev
										</span>
									</a>
								</li>
				';
			}
			if ($i != $pages-1) {
				echo'
								<li class="nextPage">
									<a href="#abo' . ($i+1) . '" title="Next page, please!" tabindex="' . ++$tabIndex . '">
										<span>
											Next
										</span>
									</a>
								</li>
				';
			}
			echo'
							</ul>
						</div>
						<div class="content row col-12-xs">
							<div class="col-12-xs">
								<div class="col-4-xl col-4-lg col-4-md col-12-xs">
								</div>
								<div class="col-7-xl col-7-lg col-7-md col-12-xs text-center">
									<h3>
										' . $titles[$i] . '
									</h3>
								</div>
							</div>
							<div class="row col-12-xs">
								<div class="col-4-xl col-4-lg col-4-md col-5-sm col-12-xs">
									<div class="row col-8-xs col-xs-push-2 aboutSectionHolder">
										<img class="displayProfileImage" src="' . ($fileLocated == true ? $filePathLocation : $pathAboutDummy) . '" alt="' . ($fileLocated == true ? $altAboutImage : $altDummy) . '" />
										<div class="row col-10-xs col-xs-push-1 iconsBar">
											<a class="email" href="mailto:anubis@live.se" title="Get in contact with me on my public e-mail address! Donors or relatives from Africa can scam someone else!" aria-labelledby="Get in contact with me on my public e-mail address! Donors or relatives from Africa can scam someone else!" tabindex="' . ++$tabIndex . '"></a>
											<a class="linkedin" href="https://www.linkedin.com/in/goldenmaza" target="_blank" title="Visit my LinkedIn profile!" aria-labelledby="Visit my LinkedIn profile!" tabindex="' . ++$tabIndex . '"></a>
											<a class="skype" href="skype:goldenmaza" title="Get in contact with me on Skype! Donors or relatives from Africa can scam someone else!" aria-labelledby="Get in contact with me on Skype! Donors or relatives from Africa can scam someone else!" tabindex="' . ++$tabIndex . '"></a>
										</div>
										<div class="row col-10-xs col-xs-push-1 iconsBar">
											<a class="github" href="https://github.com/goldenmaza" target="_blank" title="Visit my GitHub profile!" aria-labelledby="Visit my GitHub profile!" tabindex="' . ++$tabIndex . '"></a>
											<a class="disabled videopresentation" href="?#abo0" target="_blank" title="View my video presentation!" aria-labelledby="View my video presentation!" tabindex="' . ++$tabIndex . '"></a>
											<a class="disabled download" href="?#abo0" title="Go to the Download page for my curriculum vitae and cover letter!" aria-labelledby="Go to the Download page for my curriculum vitae and cover letter!" tabindex="' . ++$tabIndex . '"></a>
										</div>
										<div class="row col-10-xs col-xs-push-1 iconsBar">
											<a class="disabled facebook" href="?#abo0" target="_blank" title="I like individuality and getting a Facebook account just means I follow the flow! I only care about document flow!" aria-labelledby="I like individuality and getting a Facebook account just means I follow the flow! I only care about document flow!" tabindex="' . ++$tabIndex . '"></a>
											<a class="disabled youtube" href="?#abo0" target="_blank" title="I will get a YouTube account and it will be used for making videos about software engineering!" aria-labelledby="I will get a YouTube account and it will be used for making videos about software engineering!" tabindex="' . ++$tabIndex . '"></a>
											<a class="disabled twitter" href="?#abo0" target="_blank" title="I will not get a Twitter account because of the negative aspects it has on society and people\'s interaction with others. Also, people like the Kardashians and Biebers can be found there! Do I need to say more?" aria-labelledby="I will not get a Twitter account because of the negative aspects it has on society and people\'s interaction with others. Also, people like the Kardashians and Biebers can be found there! Do I need to say more?" tabindex="' . ++$tabIndex . '"></a>
										</div>
									</div>
								</div>
								<div class="col-7-xl col-7-lg col-7-md col-6-sm col-10-xs col-sm-push-0 col-xs-push-1">
			';
			$paragraphsSize = count($paragraphs[$i]);
			for ($j = 0; $j < $paragraphsSize; $j++) {
				echo'
									<p class="row text-justify">' . $paragraphs[$i][$j] . '</p>
				';
			}
			echo'
								</div>
							</div>
						</div>
					</div><!-- container ends -->
				</section><!-- section ends -->
			';
		}
		//include("sections/vid.php");
	}
	else {
		echo'
			<section id="abo0" class="sections" data-sitemap="Empty | Error">
				<div class="container">
					<div class="content row col-12-xs">
						<h3>
							Unable to load data / no data to be loaded - regarding the About pages
						</h3>
						<div class="row col-12-xs">
							<strong>
								Currently, this page was unable to load! Please, try again later!
							</strong>
						</div>
					</div>
				</div><!-- container ends -->
			</section><!-- section ends -->
		';
	}

?>