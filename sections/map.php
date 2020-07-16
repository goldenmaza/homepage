<?php

	echo'
		<h2 class="hidden">Map section</h2>
	';
	if (isset($sitemapArray)) {
		echo'
			<section id="map" class="sections">
				<div class="container">
					<div class="containerColumn">
						<div class="containerRow">
							<h3>Sitemap</h3>
						</div><!-- containerRow ends -->
					</div><!-- containerColumn ends -->
					<div class="containerColumn">
						<div class="containerSwap gridLayout">
		';
		$ignore = true;
		foreach ($sitemapArray as $sitemapKey => $linkArray) {
			if (!$ignore && in_array($sitemapKey, $sitemapGrouping)) {
				echo'
						</div><!-- containerSwap ends -->
						<div class="containerSwap gridLayout">
				';
			} else {
				$ignore = false;
			}
			echo'
							<div class="containerColumn exceptionColumn sitemapGroup">
								<div class="containerRow sitemapHeader">
									<h4>' . $sitemapKeyMatching[$sitemapKey] . '</h4>
								</div><!-- containerRow ends -->
			';
			foreach ($linkArray as $linkKey => $elementArray) {
				echo'
								<div class="containerColumn displaySummaryContainer sitemapElement">
									<a href="?#' . $elementArray[0] . '" target="_blank" title="Click here to view the page!">
										<span class="viewTarget">' . $elementArray[1] . '</span>
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
					</div><!-- containerColumn ends -->
				</div><!-- container ends -->
			</section><!-- section ends -->
		';
	} else {
		echo'
			<section id="map" class="sections" data-sitemap="Empty | Error">
				<div class="container">
					<div class="containerColumn">
						<h3>Unable to load data / no data to be loaded - regarding the Sitemap page</h3>
						<div class="containerRow">
							<strong>Currently, this page was unable to load! Please, try again later!</strong>
						</div><!-- containerRow ends -->
					</div><!-- containerColumn ends -->
				</div><!-- container ends -->
			</section><!-- section ends -->
		';
	}
	
?>
