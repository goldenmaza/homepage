<?php

	for ($i = 0; $i < $alpha_degreeSize; $i++) {
		$notAtStart = $i !== 0;
		$notAtEnd = $i !== $alpha_degreeSize-1;
		$emptyLink = is_null($alpha_degree[$i]->getWebsite());
		$anchorClass = $emptyLink ? 'disabled' : '';
		$hrefTag = $emptyLink ? '' : 'href="' . $alpha_degree[$i]->getWebsite() . '"';
		$emptyDate = is_null($alpha_degree[$i]->getGraduation());
		$degreeStatus = $emptyDate ? 'Incomplete or Not applied' : date_format(new DateTime($alpha_degree[$i]->getGraduation()), 'M jS, Y');
		echo'
			<section id="deg' . $i . '" class="sections" data-sitemap="' . $alpha_degree[$i]->getLevel() . '">
				<h3 class="hidden">Degree overview\'s subsections</h3>
				<div class="container">
					<header>
						<ul class="containerRow">
							<li class="previousPage' . ($notAtStart ? '' : ' disabled') . '">
								<a' . ($notAtStart ? (' href="#deg0t' . ($i - 1) . '"') : '') . ' title="Previous page, please!">
									<span>Prev</span>
								</a>
							</li><!-- previousPage ends -->
							<li class="nextPage' . ($notAtEnd ? '' : ' disabled') . '">
								<a' . ($notAtEnd ? (' href="#deg0t' . ($i + 1) . '"') : '') . ' title="Next page, please!">
									<span>Next</span>
								</a>
							</li><!-- nextPage ends -->
						</ul><!-- containerRow ends -->
					</header><!-- header ends -->
					<div class="containerColumn">
						<div class="containerRow">
							<h4>
								<a href="#edu0" title="Return to the Education page!">' . $alpha_degree[$i]->getLevel() . '</a>
							</h4>
						</div><!-- containerRow ends -->
						<div class="containerColumn force-left">
							<div class="containerSwap force-left">
								<div class="containerRow force-text-right">
									<span class="force-mini-left">Institution: </span>
									<a class="' . $anchorClass . '" ' . $hrefTag . ' target="_blank" title="Visit the official website of the institution!">' . $alpha_degree[$i]->getInstitution() . '</a>
								</div><!-- containerRow ends -->
								<div class="containerRow">
									<span class="force-mini-left">Degree: </span>
									<p>' . $alpha_degree[$i]->getLevel() . '</p>
								</div><!-- containerRow ends -->
							</div><!-- containerSwap ends -->
							<div class="containerSwap force-left">
								<div class="containerRow force-text-right">
									<span class="force-mini-left">Graduated: </span>
									<p>' . $degreeStatus . '</p>
								</div><!-- containerRow ends -->
								<div class="containerRow">
									<span class="force-mini-left">Programme: </span>
									<p>' . $alpha_degree[$i]->getName() . '</p>
								</div><!-- containerRow ends -->
							</div><!-- containerSwap ends -->
						</div><!-- containerColumn ends -->
						<div class="containerSwap">
							<div class="containerColumn">
								<div class="containerColumn">
									<p class="text-justify">' . htmlspecialchars_decode($alpha_degree[$i]->getDescription()) . '</p>
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