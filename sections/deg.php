<?php

	for ($i = 0; $i < $alpha_degreeSize; $i++) {
		echo'
			<section id="deg' . $i . '" class="sections" data-sitemap="' . $alpha_degree[$i]->getLevel() . '">
				<h3 class="hidden">
					Degree overview\'s subsections
				</h3>
				<div class="container">
					<div class="row col-12-xs">
						<ul>
		';
		if ($i != 0) {
			echo'
							<li class="previousPage">
								<a href="#deg0t' . ($i-1) . '" title="Previous page, please!">
									<span>
										Prev
									</span>
								</a>
							</li>
			';
		}
		if ($i != $alpha_degreeSize-1) {
			echo'
							<li class="nextPage">
								<a href="#deg0t' . ($i+1) . '" title="Next page, please!">
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
							<a href="#edu0" title="Return to the Education page!">
								' . $alpha_degree[$i]->getLevel() . '
							</a>
						</h4>
						<div class="row col-12-xs">
							<div class="col-12-xs no-margin">
								<div class="col-4-sm col-12-xs text-left force-text-right">
			';
			if (is_null($alpha_degree[$i]->getWebsite())) {
				echo'
									<p>
										<span class="force-mini-left">Institution: </span>' . $alpha_degree[$i]->getInstitution() . '
									</p>
				';
			}
			else {
				echo'
									<p>
										<a href="' . $alpha_degree[$i]->getWebsite() . '" target="_blank" title="Visit the official website of the institution!">
											<span class="force-mini-left">Institution: </span>' . $alpha_degree[$i]->getInstitution() . '
										</a>
									</p>
				';
			}
			echo'
								</div>
								<div class="col-6-sm col-12-xs text-left">
									<p>
										<span class="force-mini-left">Degree: </span>' . $alpha_degree[$i]->getLevel() . '
									</p>
								</div>
							</div>
							<div class="row col-12-xs no-margin">
								<div class="col-4-sm col-12-xs text-left force-text-right">
									<p>
										<span class="force-mini-left">Graduated: </span>' . (is_null($alpha_degree[$i]->getGraduation()) ? "Incomplete or Not applied" : date_format(new DateTime($alpha_degree[$i]->getGraduation()), 'M jS, Y')) . '
									</p>
								</div>
								<div class="col-6-sm col-12-xs text-left">
									<p>
										<span class="force-mini-left">Programme: </span>' . $alpha_degree[$i]->getName() . '
									</p>
								</div>
							</div>
						</div>
						<div class="col-7-sm col-12-xs col-sm-push-4 no-padding">
							<div class="row col-12-xs text-justify">
								<p>
									' . $alpha_degree[$i]->getDescription() . '
								</p>
							</div>
						</div>
					</div>
				</div><!-- container ends -->
			</section><!-- section ends -->
		';
	}
	
?>