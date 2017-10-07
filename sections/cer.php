<?php

	if (isset($alpha_certificationSize) == true) {
		$currentLimit = 0;
		$pages = ceil($alpha_certificationSize / $defaultListGrid);
		for ($i = 0; $i < $pages; $i++) {
			echo'
				<section id="cer' . $i . '" class="sections" data-sitemap="List of Certifications - p. ' . ($i+1) . '">
					<h3 class="hidden">
						Certification section
					</h3>
					<div class="container">
						<div class="row col-12-xs">
							<ul>
			';
			if ($i != 0) {
				echo'
								<li class="previousPage">
									<a href="#cer' . ($i-1) . '" title="Previous page, please!">
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
									<a href="#cer' . ($i+1) . '" title="Next page, please!">
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
									List of Certifications
								</a>
							</h4>
			';
			for ($j = $currentLimit; $j < $alpha_certificationSize; $j++) {
				echo'
							<div class="row col-12-xs">
								<div class="col-5-sm col-12-xs text-left force-text-right no-margin">
				';
				if (is_null($alpha_certification[$j]->getWebsite())) {
					echo'
									<p>
										<span class="force-mini-left">Publisher: </span>' . $alpha_certification[$j]->getPublisher() . '
									</p>
					';
				}
				else {
					echo'
									<p>
										<a href="' . $alpha_certification[$j]->getWebsite() . '" target="_blank" title="Visit the official website of the certification publisher!">
											<span class="force-mini-left">Publisher: </span>' . $alpha_certification[$j]->getPublisher() . '
										</a>
									</p>
					';
				}
				echo'
								</div>
								<div class="col-6-sm col-12-xs text-left no-margin">
									<p>
										<a class="viewTarget" href="#rec' . $j . '" title="Visit the detailed page regarding this specific certification!">
											<span class="force-mini-left">Name: </span>' . $alpha_certification[$j]->getName() . '
										</a>
									</p>
								</div>
								<div class="col-5-sm col-12-xs text-left force-text-right no-margin">
									<p>
										<span class="force-mini-left">Date: </span>' . date_format(new DateTime($alpha_certification[$j]->getNominated()), 'M jS, Y') . '
									</p>
								</div>
								<div class="col-6-sm col-12-xs text-left no-margin">
									<p>
										<span class="force-mini-left">Category: </span>' . $alpha_certification[$j]->getCategory() . '
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
		for ($i = 0; $i < $alpha_certificationSize; $i++) {
			echo'
				<section id="rec' . $i . '" class="sections" data-sitemap="' . $alpha_certification[$i]->getCategory() . '">
					<h3 class="hidden">
						Certification section
					</h3>
					<div class="container">
						<div class="row col-12-xs">
							<ul>
			';
			if ($i != 0) {
				echo'
								<li class="previousPage">
									<a href="#fic' . ($i-1) . '" title="Previous page, please!">
										<span>
											Prev
										</span>
									</a>
								</li>
				';
			}
			if ($i != $alpha_certificationSize-1) {
				echo'
								<li class="nextPage">
									<a href="#fic' . ($i+1) . '" title="Next page, please!">
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
								<a href="#cer0" title="Return to the Certifications page!">
									Recognized by ' . $alpha_certification[$i]->getPublisher() . '
								</a>
							</h4>
							<div class="row col-12-xs">
								<div class="col-12-xs no-margin">
									<div class="col-4-sm col-12-xs text-left force-text-right">
			';
			if (is_null($alpha_certification[$i]->getWebsite())) {
				echo'
										<p>
											<span class="force-mini-left">Publisher: </span>' . $alpha_certification[$i]->getPublisher() . '
										</p>
				';
			}
			else {
				echo'
										<p>
											<a href="' . $alpha_certification[$i]->getWebsite() . '" target="_blank" title="Visit the official company website!">
												<span class="force-mini-left">Publisher: </span>' . $alpha_certification[$i]->getPublisher() . '
											</a>
										</p>
				';
			}
			echo'
									</div>
									<div class="col-6-sm col-12-xs text-left">
										<p>
											<span class="force-mini-left">Name: </span>' . $alpha_certification[$i]->getName() . '
										</p>
									</div>
								</div>
								<div class="row col-12-xs no-margin">
									<div class="col-4-sm col-12-xs text-left force-text-right">
										<p>
											<span class="force-mini-left">Date: </span>' . date_format(new DateTime($alpha_certification[$i]->getNominated()), 'M jS, Y') . '
										</p>
									</div>
									<div class="col-6-sm col-12-xs text-left">
										<p>
											<span class="force-mini-left">Category: </span>' . $alpha_certification[$i]->getCategory() . '
										</p>
									</div>
								</div>
							</div>
							<div class="col-7-sm col-12-xs col-sm-push-4 no-padding">
								<div class="row col-12-xs text-justify">
									<p>
										' . $alpha_certification[$i]->getDescription() . '
									</p>
								</div>
							</div>
							<div class="col-4-sm col-12-xs col-sm-pull-7">
								<div class="row col-10-lg col-12-xs col-lg-push-1 certificationMultimediaHolder">
			';
			$filecount = 0;
			$filePatha = $certificationPath . "/" . $alpha_certification[$i]->getDirectory() . "/";
			if (glob($filePatha . "*.*") != false) {
				$files = array_map('basename', glob($filePatha . "*.*"));
				$filecount = count($files);
				for ($j = 0; $j < $filecount; $j++) {
					$filePatha = $certificationPath . "/" . $alpha_certification[$i]->getDirectory() . "/" . $files[$j];
					echo'
									<img src="' . $filePatha . '" alt="The verified badge for the ' . $alpha_certification[$i]->getCategory() . ' certification!" />
					';
				}
			}
			echo'
								</div>
								<div class="row col-10-lg col-12-xs col-lg-push-1 iconsBar">
			';
			$filecount = 0;
			$filePatha = $dlCertificationPath . "/" . $alpha_certification[$i]->getDirectory() . "/";
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
					$filePathb = $dlCertificationPath . "/" . $alpha_certification[$i]->getDirectory() . "/" . $files[$j];
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
			<section id="cer0" class="sections" data-sitemap="Empty | Error">
				<h3 class="hidden">
					Certification section
				</h3>
				<div class="container">
					<div class="content row col-12-xs">
						<h4>
							Unable to load data / no data to be loaded - regarding the Certification pages
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