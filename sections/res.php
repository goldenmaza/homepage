<?php

	if (isset($alpha_resultSize) == true) {
		$currentLimit = 0;
		$pages = ceil($alpha_resultSize / $defaultListGrid);
		for ($i = 0; $i < $pages; $i++) {
			echo'
				<section id="res' . $i . '" class="sections" data-sitemap="List of Results - p. ' . ($i+1) . '">
					<h3 class="hidden">
						Result section
					</h3>
					<div class="container">
						<div class="row col-12-xs">
							<ul>
			';
			if ($i != 0) {
				echo'
								<li class="previousPage">
									<a href="#res' . ($i-1) . '" title="Previous page, please!">
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
									<a href="#res' . ($i+1) . '" title="Next page, please!">
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
									List of Results
								</a>
							</h4>
			';
			for ($j = $currentLimit; $j < $alpha_resultSize; $j++) {
				echo'
							<div class="row col-12-xs">
								<div class="col-5-sm col-10-xs col-xs-push-1 text-left force-text-right no-margin">
				';
				if (is_null($alpha_result[$j]->getWebsite())) {
					echo'
									<p>
										<span class="force-mini-left">Agent: </span>' . $alpha_result[$j]->getAgent() . '
									</p>
					';
				}
				else {
					echo'
									<p>
										<a href="' . $alpha_result[$j]->getWebsite() . '" target="_blank" title="Visit the official website of the testing agent!">
											<span class="force-mini-left">Agent: </span>' . $alpha_result[$j]->getAgent() . '
										</a>
									</p>
					';
				}
				echo'
								</div>
								<div class="col-6-sm col-10-xs col-xs-push-1 text-left no-margin">
									<p>
										<a class="viewTarget" href="#sco' . $j . '" title="Visit the page regarding the test results!">
											<span class="force-mini-left">Test: </span>' . $alpha_result[$j]->getName() . '
										</a>
									</p>
								</div>
								<div class="col-5-sm col-10-xs col-xs-push-1 text-left force-text-right no-margin">
									<p>
										<span class="force-mini-left">Date: </span>' . ($alpha_result[$j]->getEnding() == NULL ? "UFN" : date_format(new DateTime($alpha_result[$j]->getEnding()), 'M jS, Y')) . '
									</p>
								</div>
								<div class="col-6-sm col-10-xs col-xs-push-1 text-left no-margin">
									<p>
										<span class="force-mini-left">Score: </span>' . $alpha_result[$j]->getScore() . '
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
		for ($i = 0; $i < $alpha_resultSize; $i++) {
			echo'
				<section id="sco' . $i . '" class="sections" data-sitemap="' . $alpha_result[$i]->getName() . '">
					<h3 class="hidden">
						Testimonial section
					</h3>
					<div class="container">
						<div class="row col-12-xs">
							<ul>
			';
			if ($i != 0) {
				echo'
								<li class="previousPage">
									<a href="#sco' . ($i-1) . '" title="Previous page, please!">
										<span>
											Prev
										</span>
									</a>
								</li>
				';
			}
			if ($i != $alpha_resultSize-1) {
				echo'
								<li class="nextPage">
									<a href="#sco' . ($i+1) . '" title="Next page, please!">
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
								<a href="#res0" title="Return to the Results page!">
									' . $alpha_result[$i]->getScore() . ' at ' . $alpha_result[$i]->getName() . '
								</a>
							</h4>
							<div class="row col-12-xs">
								<div class="col-12-xs no-margin">
									<div class="col-4-sm col-12-xs text-left force-text-right">
			';
			if (is_null($alpha_result[$i]->getWebsite())) {
				echo'
										<p>
											<span class="force-mini-left">Agent: </span>' . $alpha_result[$i]->getAgent() . '
										</p>
				';
			}
			else {
				echo'
										<p>
											<a href="' . $alpha_result[$i]->getWebsite() . '" target="_blank" title="Visit the official website!">
												<span class="force-mini-left">Agent: </span>' . $alpha_result[$i]->getAgent() . '
											</a>
										</p>
				';
			}
			echo'
									</div>
									<div class="col-6-sm col-12-xs text-left">
										<p>
											<span class="force-mini-left">Name: </span>' . $alpha_result[$i]->getName() . '
										</p>
									</div>
								</div>
								<div class="row col-12-xs no-margin">
									<div class="col-4-sm col-12-xs text-left force-text-right">
										<p>
											<span class="force-mini-left">Date: </span>' . ($alpha_result[$i]->getBeginning() == $alpha_result[$i]->getEnding() ? date_format(new DateTime($alpha_result[$i]->getBeginning()), 'M jS, Y') : date_format(new DateTime($alpha_result[$i]->getBeginning()), 'M jS, Y') . ' - ' . ($alpha_result[$i]->getEnding() == NULL ? "UFN" : date_format(new DateTime($alpha_result[$i]->getEnding()), 'M jS, Y'))) . '
										</p>
									</div>
									<div class="col-6-sm col-12-xs text-left">
										<p>
											<span class="force-mini-left">Score: </span>' . $alpha_result[$i]->getScore() . '
										</p>
									</div>
								</div>
							</div>
							<div class="col-7-sm col-12-xs col-sm-push-4 no-padding">
								<div class="row col-12-xs text-justify">
									<p>
										' . $alpha_result[$i]->getDescription() . '
									</p>
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
			<section id="res0" class="sections" data-sitemap="Empty | Error">
				<h3 class="hidden">
					Result section
				</h3>
				<div class="container">
					<div class="content row col-12-xs">
						<h4>
							Unable to load data / no data to be loaded - regarding the Result pages
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