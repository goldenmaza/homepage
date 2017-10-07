<?php

	if (isset($alpha_careerSize) == true) {
		$currentLimit = 0;
		$pages = ceil($alpha_careerSize / $defaultListGrid);
		for ($i = 0; $i < $pages; $i++) {
			echo'
				<section id="car' . $i . '" class="sections" data-sitemap="List of Careers - p. ' . ($i+1) . '">
					<h3 class="hidden">
						Career section
					</h3>
					<div class="container">
						<div class="row col-12-xs">
							<ul>
			';
			if ($i != 0) {
				echo'
								<li class="previousPage">
									<a href="#car' . ($i-1) . '" title="Previous page, please!">
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
									<a href="#car' . ($i+1) . '" title="Next page, please!">
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
									List of Careers
								</a>
							</h4>
			';
			for ($j = $currentLimit; $j < $alpha_careerSize; $j++) {
				echo'
							<div class="row col-12-xs">
								<div class="col-5-sm col-12-xs text-left force-text-right no-margin">
				';
				if (is_null($alpha_career[$j]->getWebsite())) {
					echo'
									<p>
										<span class="force-mini-left">Employeer: </span>' . $alpha_career[$j]->getCompany() . '
									</p>
					';
				}
				else {
					echo'
									<p>
										<a href="' . $alpha_career[$j]->getWebsite() . '" target="_blank" title="Visit the official company website!">
											<span class="force-mini-left">Employeer: </span>' . $alpha_career[$j]->getCompany() . '
										</a>
									</p>
					';
				}
				echo'
								</div>
								<div class="col-6-sm col-12-xs text-left no-margin">
									<p>
										<a class="viewTarget" href="#job' . $j . '" title="Visit the page regarding the position!">
											<span class="force-mini-left">Position: </span>' . $alpha_career[$j]->getPosition() . '
										</a>
									</p>
								</div>
								<div class="col-5-sm col-12-xs text-left force-text-right no-margin">
									<p>
										<span class="force-mini-left">Duration: </span>' . date_format(new DateTime($alpha_career[$j]->getBeginning()), 'Y') . ' - ' . ($alpha_career[$j]->getEnding() == NULL ? "UFN" : date_format(new DateTime($alpha_career[$j]->getEnding()), 'Y')) . '
									</p>
								</div>
								<div class="col-6-sm col-12-xs text-left no-margin">
									<p>
										<span class="force-mini-left">Keywords: </span>' . $alpha_career[$j]->getKeyword() . '
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
		for ($i = 0; $i < $alpha_careerSize; $i++) {
			echo'
				<section id="job' . $i . '" class="sections" data-sitemap="' . $alpha_career[$i]->getCompany() . '">
					<h3 class="hidden">
						Career section
					</h3>
					<div class="container">
						<div class="row col-12-xs">
							<ul>
			';
			if ($i != 0) {
				echo'
								<li class="previousPage">
									<a href="#job' . ($i-1) . '" title="Previous page, please!">
										<span>
											Prev
										</span>
									</a>
								</li>
				';
			}
			if ($i != $alpha_careerSize-1) {
				echo'
								<li class="nextPage">
									<a href="#job' . ($i+1) . '" title="Next page, please!">
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
								<a href="#car0" title="Return to the Careers page!">
									' . $alpha_career[$i]->getPosition() . ' at ' . $alpha_career[$i]->getCompany() . '
								</a>
							</h4>
							<div class="row col-12-xs">
								<div class="col-12-xs no-margin">
									<div class="col-4-sm col-12-xs text-left force-text-right">
			';
			if (is_null($alpha_career[$i]->getWebsite())) {
				echo'
										<p>
											<span class="force-mini-left">Employeer: </span>' . $alpha_career[$i]->getCompany() . '
										</p>
				';
			}
			else {
				echo'
										<p>
											<a href="' . $alpha_career[$i]->getWebsite() . '" target="_blank" title="Visit the official website!">
												<span class="force-mini-left">Employeer: </span>' . $alpha_career[$i]->getCompany() . '
											</a>
										</p>
				';
			}
			echo'
									</div>
									<div class="col-6-sm col-12-xs text-left">
										<p>
											<span class="force-mini-left">Position: </span>' . $alpha_career[$i]->getPosition() . '
										</p>
									</div>
								</div>
								<div class="row col-12-xs no-margin">
									<div class="col-4-sm col-12-xs text-left force-text-right">
										<p>
											<span class="force-mini-left">Duration: </span>' . date_format(new DateTime($alpha_career[$i]->getBeginning()), 'M jS, Y') . ' - ' . ($alpha_career[$i]->getEnding() == NULL ? "UFN" : date_format(new DateTime($alpha_career[$i]->getEnding()), 'M jS, Y')) . '
										</p>
									</div>
									<div class="col-6-sm col-12-xs text-left">
										<p>
											<span class="force-mini-left">Type: </span>' . $alpha_career[$i]->getEmployment() . '
										</p>
									</div>
								</div>
							</div>
							<div class="col-7-sm col-12-xs col-sm-push-4 no-padding">
								<div class="row col-12-xs text-justify">
									<p>
										' . $alpha_career[$i]->getDescription() . '
									</p>
								</div>
								<div class="row col-12-xs text-justify">
									<p>
										Comprised of: ' . $alpha_career[$i]->getKeyword() . '
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
			<section id="car0" class="sections" data-sitemap="Empty | Error">
				<h3 class="hidden">
					Career section
				</h3>
				<div class="container">
					<div class="content row col-12-xs">
						<h4>
							Unable to load data / no data to be loaded - regarding the Career pages
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