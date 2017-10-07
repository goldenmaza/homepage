<?php

	if (isset($alpha_downloadSize) == true) {
		echo'
			<section id="dow0" class="sections" data-sitemap="Download section">
				<h2 class="hidden">
					Download section
				</h2>
				<div class="container">
					<div class="content row col-12-xs">
						<div class="col-12-xs">
							<h3>
								<a href="#qua" title="Return to the Qualification page!">
									List of Files
								</a>
							</h3>
						</div>
						<div class="row col-12-xs displaySummaryContainer iconsBar downloadHolder text-center">
		';
		for ($i = 0; $i < $alpha_downloadSize; $i++) {
			$extension = pathinfo($alpha_download[$i]->getFilename(), PATHINFO_EXTENSION);
			$filePatha = $dlFilesPath . "/" . $alpha_download[$i]->getFilename();
			if ($i != 0 && $i % 2 == 0) {
				echo'
						</div>
						<div class="row col-12-xs displaySummaryContainer iconsBar downloadHolder text-center">
				';
			}
			echo'
							<h4 class="hidden">
								' . $alpha_download[$i]->getName() . '
							</h4>
							<a class="' . $extension . '" href="' . $filePatha . '" target="_blank" title="Download the file: ' . $alpha_download[$i]->getFilename() . '!">
								<p>
									' . $alpha_download[$i]->getName() . '
								</p>
							</a>
			';
		}
		echo'
						</div>
					</div>
				</div><!-- container ends -->
			</section><!-- section ends -->
		';
	}
	else {
		echo'
			<section id="dow0" class="sections" data-sitemap="Empty | Error">
				<h2 class="hidden">
					Download section
				</h2>
				<div class="container">
					<div class="content row col-12-xs">
						<h3>
							Unable to load data / no data to be loaded - regarding the Download pages
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