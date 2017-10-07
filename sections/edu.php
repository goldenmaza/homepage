<?php

	if (isset($alpha_degreeSize) == true && isset($alpha_educationSize) == true) {
		$institutes = [];
		$quantity = [];
		$points = [];
		for ($i = 0; $i < $alpha_educationSize; $i++) {
			$institutes[$i] = $alpha_education[$i]->getInstitution();
		}
		$institutes = array_values(array_unique($institutes));
		for ($i = 0; $i < count($institutes); $i++) {
			$quantity[$institutes[$i]] = 0;
			$points[$institutes[$i]] = 0;
		}
		for ($i = 0; $i < count($institutes); $i++) {
			for ($j = 0; $j < $alpha_educationSize; $j++) {
				if ($institutes[$i] == $alpha_education[$j]->getInstitution()) {
					$quantity[$institutes[$i]] += 1;
					if ($alpha_education[$j]->getPoints() < 25) {
						$points[$institutes[$i]] += round($alpha_education[$j]->getPoints() * 100, 1);
					}
				}
			}
		}
		echo'
			<section id="edu0" class="sections" data-sitemap="Education\'s subsections">
				<h3 class="hidden">
					Education\'s subsections
				</h3>
				<div class="container">
					<div class="row col-12-xs">
						<div class="content col-12-xs">
							<h4>
								<a href="#qua" title="Return to the Qualification page!">
									Degree overview
								</a>
							</h4>
							<div class="col-4-lg col-5-md col-6-xs col-lg-push-2 col-md-push-1 text-center">
		';
		for ($i = 0; $i < $alpha_degreeSize; $i++) {
			echo'
								<div class="row col-12-xs displaySummaryContainer iconsBar">
									<a class="deg" href="#deg' . $i . '" title="View the specific degree!">
										<p>
											' . $alpha_degree[$i]->getLevel() . '
										</p>
										<p>
											' . $alpha_degree[$i]->getInstitution() . '
										</p>
									</a>
								</div>
			';
		}
		echo'
							</div>
						</div>
						<div class="content row col-12-xs">
							<h4>
								<a href="#qua" title="Return to the Qualification page!">
									Course overview
								</a>
							</h4>
							<div class="row col-12-xs">
								<div class="col-6-lg col-12-xs">
		';
		for ($i = 0; $i < count($institutes); $i++) {
			$amount = $quantity[$institutes[$i]];
			if ($i != 0 && $i % 2 == 0) {
				echo'
								</div>
								<div class="col-6-lg col-12-xs">
				';
			}
			echo'
									<div class="col-6-xs displaySummaryContainer iconsBar text-center">
										<a class="edu" href="#ins' . $i . 'p0" title="View the courses taken at this institute!">
											<p>
												' . $institutes[$i] . '
											</p>
											<p>
												' . $amount . ' ' . ($amount == 1 ? "course" : "courses") . '
											</p>
										</a>
									</div>
			';
		}
		echo'
								</div>
							</div>
						</div>
					</div>
				</div><!-- container ends -->
			</section><!-- section ends -->
		';
		include("deg.php");
		include("ins.php");
	}
	else {
		echo'
			<section id="deg0" class="sections" data-sitemap="Empty | Error">
				<h3 class="hidden">
					Education\'s subsections - Degree overview
				</h3>
				<div class="container">
					<div class="content row col-12-xs">
						<h4>
							Unable to load data / no data to be loaded - regarding the Degree pages
						</h4>
						<div class="row col-12-xs">
							<strong>
								Currently, this page was unable to load! Please, try again later!
							</strong>
						</div>
					</div>
				</div><!-- container ends -->
			</section><!-- section ends -->
			<section id="ins0p0" class="sections" data-sitemap="Empty | Error">
				<h3 class="hidden">
					Education\'s subsections - Course overview
				</h3>
				<div class="container">
					<div class="content row col-12-xs">
						<h4>
							Unable to load data / no data to be loaded - regarding the Course pages
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