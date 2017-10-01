<?php

	echo'
		<h2 class="hidden">
			Portfolio\'s sections
		</h2>
	';
	if (isset($alpha_projectSize) == true) {
		$currentLimit = 0;
		$pages = ceil($alpha_projectSize / $portfolioGrid);
		for ($i = 0; $i < $pages; $i++) {
			echo'
				<section id="por' . $i . '" class="sections" data-sitemap="Thumbnails - p. ' . ($i+1) . '">
					<div class="container">
						<div class="row col-12-xs">
							<ul>
			';
			if ($i != 0) {
				echo'
								<li class="previousPage">
									<a href="#por' . ($i-1) . '" title="Previous page, please!">
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
									<a href="#por' . ($i+1) . '" title="Next page, please!">
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
								<h3>
									Thumbnails
								</h3>
							</div>
							<div class="row col-12-xs">
								<div class="col-6-lg col-8-md col-12-xs col-lg-push-0 col-md-push-2 displaySummaryContainer">
			';
			for ($j = $currentLimit; $j < $alpha_projectSize; $j++) {
				if ($j != 0 && $j % 2 == 0) {
					echo'
								</div>
								<div class="col-6-lg col-8-md col-12-xs col-lg-push-0 col-md-push-2 displaySummaryContainer">
					';
				}
				$filePatha = $sourcePath . "/" . $alpha_project[$j]->getDirectory() . "/" . $alpha_project[$j]->getDirectory() . ".png";
				$porThumbnailAlt = "The thumbnail used for the " . $alpha_project[$j]->getName() . " project!";
				$fileFound = file_exists($filePatha);
				echo'
									<div class="col-6-xs text-center">
										<div class="displayPortfolioGroup">
											<a href="#pro' . $j . '" title="View the ' . $alpha_project[$j]->getName() . ' project details!">
												<img src="' . ($fileFound == true ? $filePatha : $pathThumbnailDummy) . '" alt="' . ($fileFound == true ? $porThumbnailAlt : $altDummy) . '" />
												<p class="overlay">
													' . $alpha_project[$j]->getName() . '
												</p>
											</a>
										</div>
									</div>
				';
				$currentLimit++;
				if ($currentLimit % $portfolioGrid == 0) {
					break;
				}
			}
			echo'
								</div>
							</div>
						</div>
					</div><!-- container ends -->
				</section><!-- section ends -->
			';
		}
		for ($i = 0; $i < $alpha_projectSize; $i++) {
			echo'
				<section id="pro' . $i . '" class="sections" data-sitemap="' . $alpha_project[$i]->getName() . '">
					<div class="container">
						<div class="row col-12-xs">
							<ul>
			';
			if ($i != 0) {
				echo'
								<li class="previousPage">
									<a href="#pro' . ($i-1) . '" title="Previous page, please!">
										<span>
											Prev
										</span>
									</a>
								</li>
				';
			}
			if ($i != $alpha_projectSize-1) {
				echo'
								<li class="nextPage">
									<a href="#pro' . ($i+1) . '" title="Next page, please!">
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
							<h3>
								<a href="#por0" title="Return to the Portfolio page!">
									' . $alpha_project[$i]->getName() . '
								</a>
							</h3>
							<div class="row col-12-xs">
								<div class="col-12-xs no-margin">
									<div class="col-4-sm col-12-xs text-left force-text-right">
										<p>
											<span class="force-mini-right">Position: </span>' . $alpha_project[$i]->getPosition() . '
										</p>
									</div>
									<div class="col-6-sm col-12-xs text-left">
										<p>
											<span class="force-mini-left">Customer: </span>' . $alpha_project[$i]->getCustomer() . '
										</p>
									</div>
								</div>
								<div class="row col-12-xs no-margin">
									<div class="col-4-sm col-12-xs text-left force-text-right">
										<p>
											<span class="force-mini-right">Date: </span>' . date_format(new DateTime($alpha_project[$i]->getBeginning()), 'M jS, Y') . ' - ' . ($alpha_project[$i]->getEnding() == NULL ? "UFN" : date_format(new DateTime($alpha_project[$i]->getEnding()), 'M jS, Y')) . '
										</p>
									</div>
									<div class="col-6-sm col-12-xs text-left">
			';
			if ($alpha_project[$i]->getWebsite() == null) {
				echo'
										<p>
											<span class="force-mini-left">Project: </span>' . $alpha_project[$i]->getName() . '
										</p>
				';
			}
			else {
				echo'
										<p>
											<a href="' . $alpha_project[$i]->getWebsite() . '" target="_blank" title="Visit the released ' . $alpha_project[$i]->getName() . ' project page!">
												<span class="force-mini-left">Project: </span>' . $alpha_project[$i]->getName() . '
											</a>
										</p>
				';
			}
			echo'
									</div>
								</div>
							</div>
							<div class="col-7-sm col-12-xs col-sm-push-4 no-padding">
								<div class="row col-12-xs text-justify">
									<p>
										' . $alpha_project[$i]->getDescription() . '
									</p>
								</div>
								<div class="row col-12-xs text-justify">
									<p>
										Comprised of: ' . $alpha_project[$i]->getKeyword() . '
									</p>
								</div>
							</div>
							<div class="col-4-sm col-12-xs col-sm-pull-7">
								<div class="row col-10-lg col-12-xs col-lg-push-1 portfolioMediaHolder iconsBar">
			';
			$filecount = 0;
			$filePatha = $sourcePath . "/" . $alpha_project[$i]->getDirectory() . "/";
			if (glob($filePatha . "*.*") !== false) {
				$files = array_map('basename', glob($filePatha . "*.*"));
				$filecount = count($files);
				for ($j = 1; $j < $filecount; $j++) {
					if (strpos($files[$j], "thumb_") === false) {
						$filePathb = $filePatha . "thumb_" . $files[$j];
						$filePathc = $filePatha . $files[$j];
						echo'
									<a href="' . $filePathc . '" target="_blank" title="View the full image #' . ($j+1) . ' of the ' . $alpha_project[$i]->getName() . ' project!">
										<img class="displayThumbnailImage expandingThumbnailImage" src="' . $filePathb . '" alt="The thumbnail #' . ($j+1) . ' used for the ' . $alpha_project[$i]->getName() . ' project!" />
									</a>
						';
					}
				}
			}
			echo'
								</div>
								<div class="row col-10-lg col-12-xs col-lg-push-1 iconsBar">
			';
			$filecount = 0;
			$filePatha = $dlPortfolioPath . "/" . $alpha_project[$i]->getDirectory() . "/";
			if (glob($filePatha . "*.*") !== false) {
				$files = array_map('basename', glob($filePatha . "*.*"));
				$filecount = count($files);
				for ($j = 0; $j < $filecount; $j++) {
					if ($j != 0 && $j % 3 == 0) {
						echo'
								</div>
								<div class="row col-10-lg col-12-xs col-lg-push-1 iconsBar">
						';
					}
					$extension = pathinfo($files[$j], PATHINFO_EXTENSION);
					$filePathb = $dlPortfolioPath . "/" . $alpha_project[$i]->getDirectory() . "/" . $files[$j];
					echo'
									<a class="expandingThumbnailIcon ' . $extension . '" href="' . $filePathb . '" target="_blank" title="Download ' . $files[$j] . '!">
									</a>
					';
				}
			}
			echo'
								</div>
							</div>
						</div>
					</div><!-- container ends -->
				</section><!-- section ends -->
			';
		}
	}
	else {
		echo'
			<section id="por0" class="sections" data-sitemap="Empty | Error">
				<div class="container">
					<div class="content row col-12-xs">
						<h3>
							Unable to load data / no data to be loaded - regarding the Portfolio pages
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