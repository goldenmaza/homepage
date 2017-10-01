<?php

	if (isset($alpha_experienceSize) == true) {
		$index = 0;
		$paragraphs = [];
		if (isset($alpha_informationSize) == true) {
			for ($i = 0; $i < $alpha_informationSize; $i++) {
				if ($alpha_information[$i]->getPage() == "exp") {
					$paragraphs[] = $alpha_information[$i]->getParagraph();
				}
			}
		}
		$data = [];
		$category = [];
		for ($i = 0; $i < $alpha_experienceSize; $i++) {
			$data[$alpha_experience[$i]->getCategory()][$alpha_experience[$i]->getValue()] = $alpha_experience[$i]->getGrading();
			$category[$i] = $alpha_experience[$i]->getCategory();
		}
		$category = array_values(array_unique($category));
		$categorySize = count($category);
		$paragraphsSize = count($paragraphs);
		for ($i = 0; $i <= $categorySize; $i++) {
			echo'
				<section id="exp' . $i . '" class="sections" data-sitemap="' . ($i > 0 ? $category[$i-1] : "Summary") . '">
					<h3 class="hidden">
						Experience section
					</h3>
					<div class="container">
						<div class="row col-12-xs">
							<ul>
			';
			if ($i != 0) {
				echo'
								<li class="previousPage">
									<a href="#exp' . ($i-1) . '" title="Previous page, please!">
										<span>
											Prev
										</span>
									</a>
								</li>
				';
			}
			if ($i != count($category)) {
				echo'
								<li class="nextPage">
									<a href="#exp' . ($i+1) . '" title="Next page, please!">
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
									' . ($i > 0 ? $category[$i-1] : "Summary") . '
								</a>
							</h4>
							<div class="row col-12-xs">
						    	<div class="col-5-xl col-5-lg col-5-sm col-12-xs col-1-sm-offset col-0-xs-offset text-left">
						    		<ul id="skill' . $i . '" class="skillTree">
			';
			if ($i > 0) {
				foreach ($data as $cat => $arr) {
					if ($category[$i-1] == $cat) {
						$vals = NULL;
						foreach ($arr as $value => $grading) {
							$vals[$grading][] = $value;
						}
						foreach ($vals as $grading => $values) {
							echo'
										<li>
											<p>
												' . implode(", ", $values) . '
											</p>
										</li>
										<li class="col-12-xs line">
											<span class="expand ' . getLine($grading) . '"></span>
										</li>
							';
						}
					}
				}
			}
			else {
				for ($j = 0; $j < $categorySize; $j++) {
							echo'
										<li>
											<p>
												' . $category[$j] . '
											</p>
										</li>
										<li class="col-12-xs line">
											<span class="expand ' . getLine(getAverage($data[$category[$j]])) . '"></span>
										</li>
							';
				}
			}
			echo'
						        	</ul>
						        </div>
						    	<div class="col-5-xl col-5-lg col-5-sm col-12-xs text-justify">
			';
			if (isset($alpha_informationSize) == true) {
				if ($index == $paragraphsSize) {
					$index = 1;
				}
				echo'
									<p>' . $paragraphs[$index++] . '</p>
				';
			}
			echo'
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
			<section id="exp0" class="sections" data-sitemap="Empty | Error">
				<h3 class="hidden">
					Experience section
				</h3>
				<div class="container">
					<div class="content row col-12-xs">
						<h4>
							Unable to load data / no data to be loaded - regarding the Experience pages
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

	function getAverage($array) {
		$counter = array_sum($array);
		$counter /= count($array);
		$counter = round($counter);
		return $counter;
	}

	function getLine($grading) {
		$line = "beginnerLine";
		if ($grading == 2) {
			$line = "basicLine";
		}
		else if ($grading == 3) {
			$line = "goodLine";
		}
		else if ($grading == 4) {
			$line = "advanceLine";
		}
		else if ($grading == 5) {
			$line = "expertLine";
		}
		return $line;
	}
    
?>