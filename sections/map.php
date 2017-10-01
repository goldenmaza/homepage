<?php

	if (isset($finalArray) == true) {
		echo'
			<section id="map" class="sections">
				<div class="container">
					<div class="content row col-12-xs">
						<div class="row col-12-xs">
							<h2>
								Sitemap
							</h2>
						</div>
						<div class="row col-12-xs">
		';
		$index = 0;
		foreach ($finalArray as $finalKey => $groupArray) {
			if ($index > 0 && in_array($finalKey, $sitemapGrouping)) {
				echo'
						</div>
						<div class="col-12-xs">
				';
			}
			echo'
							<div class="col-4-lg col-6-md col-6-sm col-12-xs sitemapGroup">
								<div class="sitemapHeader text-left">
									<h3>
										' . $sitemapKeyMatching[$finalKey] . '
									</h3>
								</div>
			';
			foreach ($groupArray as $groupKey => $elementArray) {
				echo'
								<div class="displaySummaryContainer sitemapElement text-left">
									<a href="?#' . $elementArray[0] . '" target="_blank" title="View the page regarding this subject!">
										<p>
											<span class="viewTarget"></span> ' . $elementArray[1] . '
										</p>
									</a>
								</div>
				';
			}
			echo'
							</div>
			';
			$index++;
		}
		echo'
							</div>
						</div>
					</div>
				</div><!-- container ends -->
			</section><!-- section ends -->
		';
	}
	else {
		echo'
			<section id="map" class="sections">
				<div class="container">
					<div class="content row col-12-xs">
						<h3>
							Unable to load data / no data to be loaded - regarding the Sitemap page
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