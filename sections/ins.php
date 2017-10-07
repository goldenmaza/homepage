<?php

	echo'
		<h3 class="hidden">
			Course overview\'s subsections
		</h3>
	';
	for ($i = 0; $i < count($institutes); $i++) {
		$currentPage = 0;
		$currentLimit = 0;
		$remaining = $quantity[$institutes[$i]];
		for ($j = 0; $j < $alpha_educationSize; $j++) {
			if ($institutes[$i] == $alpha_education[$j]->getInstitution()) {
				if ($currentLimit == 0) {
					$amount = $quantity[$alpha_education[$j]->getInstitution()];
					echo'
						<section id="ins' . $i . 'p' . $currentPage . '" class="sections" data-sitemap="' . $alpha_education[$j]->getInstitution() . ' - p. ' . ($currentPage+1) . '">
							<div class="container">
								<div class="row col-12-xs">
									<ul>
					';
					if ($currentPage > 0) {
						echo'
										<li class="previousPage">
											<a href="#ins' . $i  . 'p' . ($currentPage > 0 ? ($currentPage-1) : $currentPage) . '" title="Previous page, please!">
												<span>
													Prev
												</span>
											</a>
										</li>
						';
					}
					if ($currentPage < ($quantity[$institutes[$i]] / $defaultListGrid)-1) {
						echo'
										<li class="nextPage">
											<a href="#ins' . $i . 'p' . ($currentPage < $remaining ? ($currentPage+1) : $currentPage) . '" title="Next page, please!">
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
											' . $alpha_education[$j]->getInstitution() . ' - ' . number_format((float)$points[$institutes[$i]] / 100, 1, ',', '') . ' ECTS points - page ' . ($currentPage+1) . '
										</a>
									</h4>
					';
				}
				echo'
									<div class="row col-12-xs">
										<div class="col-5-sm col-12-xs text-left force-text-right no-margin">
											<p>
												<a class="viewTarget" href="#ins' . $i . 'c' . $j . '" title="Visit the page regarding the specific course!">
													<span class="force-mini-left">Course: </span>' . $alpha_education[$j]->getName() . '
												</a>
											</p>
										</div>
										<div class="col-6-sm col-12-xs text-left no-margin">
											<p>
												<span class="force-mini-left">Keywords: </span>' . $alpha_education[$j]->getKeyword() . '
											</p>
										</div>
									</div>
				';
				$currentLimit++;
				$remaining--;
				if ($remaining == 0 || $currentLimit == $defaultListGrid) {
					echo'
								</div>
							</div><!-- container ends -->
						</section><!-- section ends -->
					';
					$currentPage++;
					$currentLimit = 0;
				}
			}
		}
	}
	$ins = [];
	$cor = [];
	$disLeft = [];
	$disRight = [];
	$firstElement = true;
	for ($i = 0; $i < count($institutes); $i++) {
		for ($j = 0; $j < $alpha_educationSize; $j++) {
			if ($institutes[$i] == $alpha_education[$j]->getInstitution()) {
				$ins[] = $i;
				$cor[] = $j;
				$firstElement == true ? $disLeft[] = $j : NULL;
				$firstElement = false;
			}
		}
		$disRight[] = end($cor);
		$firstElement = true;
	}
	for ($i = 0; $i < $alpha_educationSize; $i++) {
		$index = $cor[$i];
		echo'
			<section id="ins' . $ins[$i] . 'c' . $cor[$i] . '" class="sections" data-sitemap="' . $alpha_education[$index]->getName() . '">
				<div class="container">
					<div class="row col-12-xs">
						<ul>
		';
		if ($cor[$i] != $disLeft[$ins[$i]]) {
			echo'
							<li class="previousPage">
								<a href="#ins' . ($ins[$i] . 'c' . ($cor[$i] > 0 ? $cor[$i-1] : $cor[$i])) . '" title="Previous page, please!">
									<span>
										Prev
									</span>
								</a>
							</li>
			';
		}
		if ($cor[$i] != $disRight[$ins[$i]]) {
			echo'
							<li class="nextPage">
								<a href="#ins' . ($ins[$i] . 'c' . ($cor[$i] < $alpha_educationSize ? ($cor[$i+1]) : $cor[$i])) . '" title="Next page, please!">
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
							<a href="#ins' . $ins[$i] . 'p0" title="Return to the Institute summary page!">
								' . $alpha_education[$index]->getName() . '
							</a>
						</h4>
						<div class="row col-12-xs">
							<div class="col-12-xs no-margin">
								<div class="col-4-sm col-12-xs text-left force-text-right">
		';
		if (is_null($alpha_education[$index]->getWebsite())) {
			echo'
									<p>
										<span class="force-mini-left">Institution: </span>' . $alpha_education[$index]->getInstitution() . '
									</p>
			';
		}
		else {
			echo'
									<p>
										<a href="' . $alpha_education[$index]->getWebsite() . '" target="_blank" title="Visit the official website of the institution!">
											<span class="force-mini-left">Institution: </span>' . $alpha_education[$index]->getInstitution() . '
										</a>
									</p>
			';
		}
		echo'
								</div>
								<div class="col-6-sm col-12-xs text-left">
									<p>
										<span class="force-mini-left">Course: </span>' . $alpha_education[$index]->getName() . ', ' . $alpha_education[$index]->getPoints() . ' ECTS points
									</p>
								</div>
							</div>
							<div class="row col-12-xs no-margin">
								<div class="col-4-sm col-12-xs text-left force-text-right">
									<p>
										<span class="force-mini-left">Date: </span>' . ($alpha_education[$index]->getGraduated() == 0 ? "Incomplete" : date_format(new DateTime($alpha_education[$index]->getGraduation()), 'M jS, Y')) . '
									</p>
								</div>
								<div class="col-6-sm col-12-xs text-left">
									<p>
										<span class="force-mini-left">Type: </span>' . $alpha_education[$index]->getLevel() . '
									</p>
								</div>
							</div>
							<div class="col-7-sm col-12-xs col-sm-push-4 no-padding">
								<div class="row col-12-xs text-justify">
									<p>
										' . $alpha_education[$index]->getDescription() . '
										<br/><br/>
										Note: Swedish National Agency for Education: <a href="http://www.skolverket.se" target="_BLANK">here </a>
									</p>
								</div>
								<div class="row col-12-xs text-justify">
									<p>
										Comprised of: ' . $alpha_education[$index]->getKeyword() . '
									</p>
								</div>
							</div>
						</div>
					</div>
				</div><!-- container ends -->
			</section><!-- section ends -->
		';
	}
		
?>