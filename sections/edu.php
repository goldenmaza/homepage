<?php

	if (isset($alpha_degreeSize) && isset($alpha_educationSize)) {
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
				if ($institutes[$i] === $alpha_education[$j]->getInstitution()) {
					$quantity[$institutes[$i]] += 1;
					if ($alpha_education[$j]->getPoints() < 25) {
						$points[$institutes[$i]] += round($alpha_education[$j]->getPoints() * 100, 1);
					}
				}
			}
		}
		echo'
			<section id="edu0" class="sections" data-sitemap="Education\'s subsections">
				<h3 class="hidden">Education\'s subsections</h3>
				<div class="container">
					<div class="containerColumn">
						<div class="containerColumn">
							<div class="containerRow">
								<h4>
									<a href="#qua" title="Return to the Qualification page!">Degree overview</a>
								</h4>
							</div><!-- containerRow ends -->
							<div class="containerSwap gridLayout">
		';
		for ($i = 0; $i < $alpha_degreeSize; $i++) {
			echo'
								<div class="displaySummaryContainer iconsBar">
									<a class="deg" href="#deg' . $i . '" title="View the specific degree!">
										<span>' . $alpha_degree[$i]->getLevel() . '</span>
										<span>' . $alpha_degree[$i]->getInstitution() . '</span>
									</a>
								</div><!-- displaySummaryContainer ends -->
			';
		}
		echo'
							</div><!-- containerSwap ends -->
						</div><!-- containerColumn ends -->
						<div class="containerColumn">
							<div class="containerRow">
								<h4>
									<a href="#qua" title="Return to the Qualification page!">Course overview</a>
								</h4>
							</div><!-- containerRow ends -->
							<div class="containerSwap gridLayout">
		';
		for ($i = 0; $i < count($institutes); $i++) {
			$amount = $quantity[$institutes[$i]];
			echo'
								<div class="displaySummaryContainer iconsBar">
									<a class="edu" href="#ins' . $i . 'p0" title="View the courses taken at this institute!">
										<span>' . $institutes[$i] . '</span>
										<span>' . $amount . ($amount === 1 ? " course" : " courses") . '</span>
									</a>
								</div><!-- displaySummaryContainer ends -->
			';
		}
		echo'
							</div><!-- containerSwap ends -->
						</div><!-- containerColumn ends -->
					</div><!-- containerColumn ends -->
				</div><!-- container ends -->
			</section><!-- section ends -->
		';
		include("deg.php");
		include("ins.php");
	} else {
		echo'
			<section id="deg0" class="sections" data-sitemap="Empty | Error">
				<h3 class="hidden">Education\'s subsections - Degree overview</h3>
				<div class="container">
					<div class="containerColumn">
						<h4>Unable to load data / no data to be loaded - regarding the Degree pages</h4>
						<div class="containerRow">
							<strong>Currently, this page was unable to load! Please, try again later!</strong>
						</div><!-- containerRow ends -->
					</div><!-- containerColumn ends -->
				</div><!-- container ends -->
			</section><!-- section ends -->
			<section id="ins0p0" class="sections" data-sitemap="Empty | Error">
				<h3 class="hidden">Education\'s subsections - Course overview</h3>
				<div class="container">
					<div class="containerColumn">
						<h4>Unable to load data / no data to be loaded - regarding the Course pages</h4>
						<div class="containerRow">
							<strong>Currently, this page was unable to load! Please, try again later!</strong>
						</div><!-- containerRow ends -->
					</div><!-- containerColumn ends -->
				</div><!-- container ends -->
			</section><!-- section ends -->
		';
	}

?>