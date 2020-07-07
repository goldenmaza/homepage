<?php

	echo'
		<h3 class="hidden">Certification sections</h3>
	';
	if (isset($alpha_certificationSize)) {
		$currentFile = basename(__FILE__, '.php');
		$pages = ceil($alpha_certificationSize / $defaultListGrid);
		$currentLimit = 0;
		$n = 0;
		for ($i = 0; $i < $pages; $i++) {
			$sectionId = 'cer' . $i;
			$notAtStart = $i !== 0;
			$notAtEnd = $i != $pages - 1;//TODO: bug that makes the strict comparison not work with pages
			$limit = 0;
			echo'
				<section id="' . $sectionId . '" class="sections" data-sitemap="List of Certifications - p. ' . ($i + 1) . '">
					<div class="container">
						<header>
							<ul class="containerRow">
								<li class="previousPage' . ($notAtStart ? '' : ' disabled') . '">
									<a' . ($notAtStart ? (' href="#cer' . ($i - 1) . '"') : '') . ' title="Previous page, please!">
										<span>Prev</span>
									</a>
								</li><!-- previousPage ends -->
								<li class="nextPage' . ($notAtEnd ? '' : ' disabled') . '">
									<a' . ($notAtEnd ? (' href="#cer' . ($i + 1) . '"') : '') . ' title="Next page, please!">
										<span>Next</span>
									</a>
								</li><!-- nextPage ends -->
							</ul><!-- containerRow ends -->
						</header><!-- header ends -->
						<div class="containerColumn">
							<div class="containerRow">
								<h4>
									<a href="#qua" title="Return to the Qualification page!">List of Certifications</a>
								</h4>
							</div><!-- containerRow ends -->
			';
			for ($j = $n; $j < $alpha_certificationSize && $defaultListGrid !== $limit; $j++) {
				$emptyLink = is_null($alpha_certification[$j]->getWebsite());
				$anchorClass = $emptyLink ? 'disabled' : '';
				$hrefTag = $emptyLink ? '' : 'href="' . $alpha_certification[$j]->getWebsite() . '"';
				$date = date_format(new DateTime($alpha_certification[$j]->getNominated()), 'M jS, Y');
				echo'
							<div class="containerColumn force-left">
								<div class="containerSwap force-left">
									<div class="containerRow force-text-right">
										<span class="force-mini-left">Publisher: </span>
										<a class="' . $anchorClass . '" ' . $hrefTag . ' target="_blank" title="Visit the official website of the certification publisher!">' . $alpha_certification[$j]->getPublisher() . '</a>
									</div><!-- containerRow ends -->
									<div class="containerRow">
										<span class="force-mini-left">Name: </span>
										<a class="viewTarget" href="#rec' . $j . '" title="Visit the detailed page regarding this specific certification!">' . $alpha_certification[$j]->getName() . '</a>
									</div><!-- containerRow ends -->
								</div><!-- containerSwap ends -->
								<div class="containerSwap force-left">
									<div class="containerRow force-text-right">
										<span class="force-mini-left">Date: </span>
										<p>' . $date . '</p>
									</div><!-- containerRow ends -->
									<div class="containerRow">
										<span class="force-mini-left">Category: </span>
										<p>' . $alpha_certification[$j]->getCategory() . '</p>
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
		for ($i = 0; $i < $alpha_certificationSize; $i++) {
			$sectionId = 'rec' . $i;
			$notAtStart = $i !== 0;
			$notAtEnd = $i !== $alpha_certificationSize - 1;
			$emptyLink = is_null($alpha_certification[$i]->getWebsite());
			$anchorClass = $emptyLink ? 'disabled' : '';
			$hrefTag = $emptyLink ? '' : 'href="' . $alpha_certification[$i]->getWebsite() . '"';
			$date = date_format(new DateTime($alpha_certification[$i]->getNominated()), 'M jS, Y');
			echo'
				<section id="' . $sectionId . '" class="sections" data-sitemap="' . $alpha_certification[$i]->getCategory() . '">
					<div class="container">
						<header>
							<ul class="containerRow">
								<li class="previousPage' . ($notAtStart ? '' : ' disabled') . '">
									<a' . ($notAtStart ? (' href="#rec' . ($i - 1) . '"') : '') . ' title="Previous page, please!">
										<span>Prev</span>
									</a>
								</li><!-- previousPage ends -->
								<li class="nextPage' . ($notAtEnd ? '' : ' disabled') . '">
									<a' . ($notAtEnd ? (' href="#rec' . ($i + 1) . '"') : '') . ' title="Next page, please!">
										<span>Next</span>
									</a>
								</li><!-- nextPage ends -->
							</ul><!-- containerRow ends -->
						</header><!-- header ends -->
						<div class="containerColumn">
							<div class="containerRow">
								<h4>
									<a href="#cer0" title="Return to the Certifications page!">Recognized by ' . $alpha_certification[$i]->getPublisher() . '</a>
								</h4>
							</div><!-- containerRow ends -->
							<div class="containerColumn force-left">
								<div class="containerSwap force-left">
									<div class="containerRow force-text-right">
										<span class="force-mini-left">Publisher: </span>
										<a class="' . $anchorClass . '" ' . $hrefTag . ' target="_blank" title="Visit the official website of the testing agent!">' . $alpha_certification[$i]->getPublisher() . '</a>
									</div><!-- containerRow ends -->
									<div class="containerRow">
										<span class="force-mini-left">Name: </span>
										<p>' . $alpha_certification[$i]->getName() . '</p>
									</div><!-- containerRow ends -->
								</div><!-- containerSwap ends -->
								<div class="containerSwap force-left">
									<div class="containerRow force-text-right">
										<span class="force-mini-left">Date: </span>
										<p>' . $date . '</p>
									</div><!-- containerRow ends -->
									<div class="containerRow">
										<span class="force-mini-left">Category: </span>
										<p>' . $alpha_certification[$i]->getCategory() . '</p>
									</div><!-- containerRow ends -->
								</div><!-- containerSwap ends -->
							</div><!-- containerColumn ends -->
							<div class="containerSwap">
								<div class="containerColumn">
									<div class="containerColumn">
										<p class="text-justify">' . htmlspecialchars_decode($alpha_certification[$i]->getDescription()) . '</p>
									</div><!-- containerColumn ends -->
									<div class="containerColumn">
									</div><!-- containerColumn ends -->
								</div><!-- containerColumn ends -->
								<div class="containerColumn">
									<div class="containerColumn certificationMultimediaHolder">
			';
			$filecount = 0;
			$badgePathLocation = $certificationPath . '/' . $alpha_certification[$i]->getDirectory() . '/';
			if (glob($badgePathLocation . '*.*') !== false) {
				$files = array_map('basename', glob($badgePathLocation . '*.*'));
				$filecount = count($files);
				for ($j = 0; $j < $filecount; $j++) {
					$imagePathSrc = $badgePathLocation . $files[$j];
					$downloadKeyMatching[$currentFile][$sectionId][0] = $alpha_certification[$i]->getName();
					$downloadKeyMatching[$currentFile][$sectionId][1][] = $imagePathSrc;
					$qualificationQuantities['Download']++;
					echo'
										<img src="' . $imagePathSrc . '" alt="The verified badge for the ' . $alpha_certification[$i]->getCategory() . ' certification!" />
					';
				}
			}
			echo'
									</div><!-- containerColumn ends -->
									<div class="containerColumn iconsBar">
			';
			$downloadPathLocation = $dlCertificationPath . '/' . $alpha_certification[$i]->getDirectory() . '/';
			if (glob($downloadPathLocation . '*.*') !== false) {
				$files = array_map('basename', glob($downloadPathLocation . '*.*'));
				$filecount = count($files);
				for ($j = 0; $j < $filecount; $j++) {
					$extension = pathinfo($files[$j], PATHINFO_EXTENSION);
					$filePathLocation = $downloadPathLocation . $files[$j];
					$downloadKeyMatching[$currentFile][$sectionId][1][] = $filePathLocation;
					$qualificationQuantities['Download']++;
					echo'
										<a class="expandingThumbnailIcon ' . $extension . '" href="' . $filePathLocation . '" target="_blank" title="Download the ' . $files[$j] . ' file!"></a>
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
			<section id="cer0" class="sections" data-sitemap="Empty | Error">
				<div class="container">
					<div class="containerColumn">
						<h4>Unable to load data / no data to be loaded - regarding the Certification pages</h4>
						<div class="containerRow">
							<strong>Currently, this page was unable to load! Please, try again later!</strong>
						</div><!-- containerRow ends -->
					</div><!-- containerColumn ends -->
				</div><!-- container ends -->
			</section><!-- section ends -->
		';
	}

?>
