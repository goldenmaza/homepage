<?php

	if (isset($alpha_awardSize) == true) {
		$currentLimit = 0;
		$pages = ceil($alpha_awardSize / $defaultListGrid);
		for ($i = 0; $i < $pages; $i++) {
			echo'
				<section id="awa' . $i . '" class="sections" data-sitemap="List of Awards - p. ' . ($i+1) . '">
					<h3 class="hidden">
						Award section
					</h3>
					<div class="container">
						<div class="row col-12-xs">
							<ul>
			';
			if ($i != 0) {
				echo'
								<li class="previousPage">
									<a href="#awa' . ($i-1) . '" title="Previous page, please!">
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
									<a href="#awa' . ($i+1) . '" title="Next page, please!">
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
							<h4>
								<a href="#qua" title="Return to the Qualification page!">
									List of Awards
								</a>
							</h4>
			';
			for ($j = $currentLimit; $j < $alpha_awardSize; $j++) {
				echo'
							<div class="row col-12-xs">
								<div class="col-5-sm col-12-xs text-left force-text-right no-margin">
				';
				if (is_null($alpha_award[$j]->getWebsite())) {
					echo'
									<p>
										<span class="force-mini-left">Publisher: </span>' . $alpha_award[$j]->getPublisher() . '
									</p>
					';
				}
				else {
					echo'
									<p>
										<a href="' . $alpha_award[$j]->getWebsite() . '" target="_blank" title="Visit the official website of the award publisher!">
											<span class="force-mini-left">Publisher: </span>' . $alpha_award[$j]->getPublisher() . '
										</a>
									</p>
					';
				}
				echo'
								</div>
								<div class="col-6-sm col-12-xs text-left no-margin">
									<p>
										<a class="viewTarget" href="#rew' . $j . '" title="Visit the detailed page regarding this specific award!">
											<span class="force-mini-left">Name: </span>' . $alpha_award[$j]->getName() . '
										</a>
									</p>
								</div>
								<div class="col-5-sm col-12-xs text-left force-text-right no-margin">
									<p>
										<span class="force-mini-left">Date: </span>' . date_format(new DateTime($alpha_award[$j]->getNominated()), 'M jS, Y') . '
									</p>
								</div>
								<div class="col-6-sm col-12-xs text-left no-margin">
									<p>
										<span class="force-mini-left">Score: </span>' . $alpha_award[$j]->getScore() . '
									</p>
								</div>
							</div>
				';
				$currentLimit++;
				if ($currentLimit % $defaultListGrid == 0) {
					break;
				}
			}
			echo'
						</div>
					</div><!-- container ends -->
				</section><!-- section ends -->
			';
		}
		for ($i = 0; $i < $alpha_awardSize; $i++) {
			echo'
				<section id="rew' . $i . '" class="sections" data-sitemap="Rewarded by ' . $alpha_award[$i]->getPublisher() . '">
					<h3 class="hidden">
						Award section
					</h3>
					<div class="container">
						<div class="row col-12-xs">
							<ul>
			';
			if ($i != 0) {
				echo'
								<li class="previousPage">
									<a href="#rew' . ($i-1) . '" title="Previous page, please!">
										<span>
											Prev
										</span>
									</a>
								</li>
				';
			}
			if ($i != $alpha_awardSize-1) {
				echo'
								<li class="nextPage">
									<a href="#rew' . ($i+1) . '" title="Next page, please!">
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
							<h4>
								<a href="#awa0" title="Return to the Awards page!">
									Rewarded by ' . $alpha_award[$i]->getPublisher() . '
								</a>
							</h4>
							<div class="row col-12-xs">
								<div class="col-12-xs no-margin">
									<div class="col-4-sm col-12-xs text-left force-text-right">
			';
			if (is_null($alpha_award[$i]->getWebsite())) {
				echo'
										<p>
											<span class="force-mini-left">Publisher: </span>' . $alpha_award[$i]->getPublisher() . '
										</p>
				';
			}
			else {
				echo'
										<p>
											<a href="' . $alpha_award[$i]->getWebsite() . '" target="_blank" title="Visit the official website!">
												<span class="force-mini-left">Publisher: </span>' . $alpha_award[$i]->getPublisher() . '
											</a>
										</p>
				';
			}
			echo'
									</div>
									<div class="col-6-sm col-12-xs text-left">
										<p>
											<span class="force-mini-left">Name: </span>' . $alpha_award[$i]->getName() . '
										</p>
									</div>
								</div>
								<div class="row col-12-xs no-margin">
									<div class="col-4-sm col-12-xs text-left force-text-right">
										<p>
											<span class="force-mini-left">Date: </span>' . date_format(new DateTime($alpha_award[$i]->getNominated()), 'M jS, Y') . '
										</p>
									</div>
									<div class="col-6-sm col-12-xs text-left">
										<p>
											<span class="force-mini-left">Score: </span>' . $alpha_award[$i]->getScore() . '
										</p>
									</div>
								</div>
							</div>
							<div class="col-7-sm col-12-xs col-sm-push-4 no-padding">
								<div class="row col-12-xs text-justify">
									<p>
										' . $alpha_award[$i]->getDescription() . '
									</p>
								</div>
							</div>
							<div class="col-4-sm col-12-xs col-sm-pull-7">
								<div class="row col-10-lg col-12-xs col-lg-push-1 awardMultimediaHolder">
			';
			$filecount = 0;
			$filePatha = $awardPath . "/" . $alpha_award[$i]->getDirectory() . "/";
			if (glob($filePatha . "*.*") != false) {
				$files = array_map('basename', glob($filePatha . "*.*"));
				$filecount = count($files);
				for ($j = 0; $j < $filecount; $j++) {
					$filePatha = $awardPath . "/" . $alpha_award[$i]->getDirectory() . "/" . $files[$j];
					echo'
									<img src="' . $filePatha . '" alt="The verified badge for the ' . $alpha_award[$i]->getName() . ' award!" />
					';
				}
			}
			echo'
								</div>
								<div class="row col-10-lg col-12-xs col-lg-push-1 iconsBar">
			';
			$filecount = 0;
			$filePatha = $dlAwardPath . "/" . $alpha_award[$i]->getDirectory() . "/";
			if (glob($filePatha . "*.*") != false) {
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
					$filePathb = $dlAwardPath . "/" . $alpha_award[$i]->getDirectory() . "/" . $files[$j];
					echo'
									<a class="expandingThumbnailIcon ' . $extension . '" href="' . $filePathb . '" target="_blank" title="Download the ' . $files[$j] . ' file!"></a>
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
			<section id="awa0" class="sections" data-sitemap="Empty | Error">
				<h3 class="hidden">
					Award section
				</h3>
				<div class="container">
					<div class="content row col-12-xs">
						<h4>
							Unable to load data / no data to be loaded - regarding the Award pages
						</h4>
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