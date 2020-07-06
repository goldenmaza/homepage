<?php

	echo'
		<h3 class="hidden">Course overview\'s subsections</h3>
	';
	$ins = [];
	$cor = [];
	$prev = [];
	$next = [];
	$temp = [];
	$places = count($institutes);
	for ($i = 0; $i < $places; $i++) {
		$institute = $institutes[$i];
		$pages = ceil($quantity[$institute] / $defaultListGrid);
		$temp = [];
		$n = 0;
		for ($j = 0; $j < $pages; $j++) {
			$notAtStart = $j > 0;
			$notAtEnd = $j < $pages - 1;
			$ectsPoints = number_format((float)$points[$institute] / 100, 1, ',', '');
			$label = $institute . ' - ' . $ectsPoints . ' ECTS points - page ' . ($j + 1);
			$limit = 0;
			echo'
				<section id="ins' . $i . 'p' . $j . '" class="sections" data-sitemap="' . $institute . ' - p. ' . ($j + 1) . '">
					<div class="container">
						<header>
							<ul class="containerRow">
								<li class="previousPage' . ($notAtStart ? '' : ' disabled') . '">
									<a' . ($notAtStart ? (' href="#ins' . $i . 'p' . ($j - 1) . '"') : '') . ' title="Previous page, please!">
										<span>Prev</span>
									</a>
								</li><!-- previousPage ends -->
								<li class="nextPage' . ($notAtEnd ? '' : ' disabled') . '">
									<a' . ($notAtEnd ? (' href="#ins' . $i . 'p' . ($j + 1) . '"') : '') . ' title="Next page, please!">
										<span>Next</span>
									</a>
								</li><!-- nextPage ends -->
							</ul><!-- containerRow ends -->
						</header><!-- header ends -->
						<div class="containerColumn">
							<div class="containerRow">
								<h4>
									<a href="#edu0" title="Return to the Education page!">' . $label . '</a>
								</h4>
							</div><!-- containerRow ends -->
							<div class="containerColumn">
			';
			for ($k = $n; $k < $alpha_educationSize && $defaultListGrid !== $limit; $k++) {
				if ($institute === $alpha_education[$k]->getInstitution()) {
					$ins[] = $i;
					$cor[] = $k;
					$temp[] = $k;
					echo'
								<div class="containerSwap">
									<div class="containerRow">
										<p>
											<a class="viewTarget" href="#ins' . $i . 'c' . $k . '" title="Visit the page regarding the specific course!">
												<span class="force-mini-left">Course: </span>' . $alpha_education[$k]->getName() . '
											</a>
										</p>
									</div><!-- containerRow ends -->
									<div class="containerRow">
										<p><span class="force-mini-left">Keywords: </span>' . $alpha_education[$k]->getKeyword() . '</p>
									</div><!-- containerRow ends -->
								</div><!-- containerSwap ends -->
					';
					$n = $k + 1;
					$limit++;
				}
			}
			echo'
							</div><!-- containerColumn ends -->
						</div><!-- containerColumn ends -->
					</div><!-- container ends -->
				</section><!-- section ends -->
			';
		}
		$prev[] = reset($temp);
		$next[] = end($temp);
	}
	$subPages = count($cor);
	for ($i = 0; $i < $subPages; $i++) {
		$institute = $ins[$i];
		$course = $cor[$i];
		$notAtStart = $course !== $prev[$institute];
		$notAtEnd = $course !== $next[$institute];
		$emptyLink = is_null($alpha_education[$course]->getWebsite());
		$anchorClass = $emptyLink ? 'disabled' : '';
		$hrefTag = $emptyLink ? '' : 'href="' . $alpha_education[$course]->getWebsite() . '"';
		$emptyDate = is_null($alpha_education[$course]->getGraduation());
		$courseStatus = $emptyDate ? 'Incomplete' : date_format(new DateTime($alpha_education[$course]->getGraduation()), 'M jS, Y');
		echo'
			<section id="ins' . $institute . 'c' . $course . '" class="sections" data-sitemap="' . $alpha_education[$course]->getName() . '">
				<div class="container">
					<header>
						<ul class="containerRow">
							<li class="previousPage' . ($notAtStart ? '' : ' disabled') . '">
								<a' . ($notAtStart ? (' href="#ins' . $institute . 'c' . $cor[$i - 1] . '"') : '') . ' title="Previous page, please!">
									<span>Prev</span>
								</a>
							</li><!-- previousPage ends -->
							<li class="nextPage' . ($notAtEnd ? '' : ' disabled') . '">
								<a' . ($notAtEnd ? (' href="#ins' . $institute . 'c' . $cor[$i + 1] . '"') : '') . ' title="Next page, please!">
									<span>Next</span>
								</a>
							</li><!-- nextPage ends -->
						</ul><!-- containerRow ends -->
					</header><!-- header ends -->
					<div class="containerColumn">
						<div class="containerRow">
							<h4>
								<a href="#ins' . $institute . 'p0" title="Return to the Institute summary page!">' . $alpha_education[$course]->getName() . '</a>
							</h4>
						</div><!-- containerRow ends -->
						<div class="containerColumn">
							<div class="containerSwap force-left">
								<div class="containerRow force-text-right">
									<p>
										<a class="' . $anchorClass . '" ' . $hrefTag . ' target="_blank" title="Visit the official website of the institution!">
											<span class="force-mini-left">Institution: </span>' . $alpha_education[$course]->getInstitution() . '
										</a>
									</p>
								</div><!-- containerRow ends -->
								<div class="containerRow">
									<p><span class="force-mini-left">Course: </span>' . $alpha_education[$course]->getName() . ', ' . $alpha_education[$course]->getPoints() . ' ECTS points</p>
								</div><!-- containerRow ends -->
							</div><!-- containerSwap ends -->
							<div class="containerSwap">
								<div class="containerRow force-text-right">
									<p><span class="force-mini-left">Date: </span>' . $courseStatus . '</p>
								</div><!-- containerRow ends -->
								<div class="containerRow">
									<p><span class="force-mini-left">Type: </span>' . $alpha_education[$course]->getLevel() . '</p>
								</div><!-- containerRow ends -->
							</div><!-- containerSwap ends -->
						</div><!-- containerColumn ends -->
						<div class="containerSwap">
							<div class="containerColumn">
								<div class="containerColumn">
									<p class="text-justify">' . htmlspecialchars_decode($alpha_education[$course]->getDescription()) . '</p>
									<p class="text-justify">Note: The Swedish National Agency for Education can be found here for more information regarding grading in Sweden: <a href="http://www.skolverket.se" target="_blank">here </a></p>
								</div><!-- containerColumn ends -->
								<div class="containerColumn">
									<p class="text-justify">Comprised of: ' . $alpha_education[$course]->getKeyword() . '</p>
								</div><!-- containerColumn ends -->
							</div><!-- containerColumn ends -->
							<div class="containerColumn">
							</div><!-- containerColumn ends -->
						</div><!-- containerSwap ends -->
					</div><!-- containerColumn ends -->
				</div><!-- container ends -->
			</section><!-- section ends -->
		';
	}

?>