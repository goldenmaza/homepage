<?php

	echo'
		<h3 class="hidden">Testimonial sections</h3>
	';
	if (isset($alpha_testimonialSize)) {
		$currentLimit = 0;
		$pages = ceil($alpha_testimonialSize / $defaultListGrid);
		$n = 0;
		for ($i = 0; $i < $pages; $i++) {
			$notAtStart = $i !== 0;
			$notAtEnd = $i != $pages - 1;//TODO: bug that makes the strict comparison not work with pages
			$limit = 0;
			echo'
				<section id="tes' . $i . '" class="sections" data-sitemap="List of Testimonials - p. ' . ($i + 1) . '">
					<div class="container">
						<header>
							<ul class="containerRow">
								<li class="previousPage' . ($notAtStart ? '' : ' disabled') . '">
									<a' . ($notAtStart ? (' href="#tes' . ($i - 1) . '"') : '') . ' title="Previous page, please!">
										<span>Prev</span>
									</a>
								</li><!-- previousPage ends -->
								<li class="nextPage' . ($notAtEnd ? '' : ' disabled') . '">
									<a' . ($notAtEnd ? (' href="#tes' . ($i + 1) . '"') : '') . ' title="Next page, please!">
										<span>Next</span>
									</a>
								</li><!-- nextPage ends -->
							</ul><!-- containerRow ends -->
						</header><!-- header ends -->
						<div class="containerColumn">
							<div class="containerRow">
								<h4>
									<a href="#qua" title="Return to the Qualification page!">List of Testimonials</a>
								</h4>
							</div><!-- containerRow ends -->
			';
			for ($j = $n; $j < $alpha_testimonialSize && $defaultListGrid !== $limit; $j++) {
				$emptyLink = is_null($alpha_testimonial[$j]->getWebsite());
				$anchorClass = $emptyLink ? 'disabled' : '';
				$hrefTag = $emptyLink ? '' : 'href="' . $alpha_testimonial[$j]->getWebsite() . '"';
				$date = date_format(new DateTime($alpha_testimonial[$j]->getAuthored()), 'M jS, Y');
				echo'
							<div class="containerColumn force-left">
								<div class="containerSwap force-left">
									<div class="containerRow force-text-right">
										<span class="force-mini-left">Employer: </span>
										<a class="' . $anchorClass . '" ' . $hrefTag . ' target="_blank" title="Visit the official company website!">' . substr($alpha_testimonial[$j]->getCompany(), 0, strpos($alpha_testimonial[$j]->getCompany(), ' ')) . '</a>
									</div><!-- containerRow ends -->
									<div class="containerRow">
										<span class="force-mini-left">Author: </span>
										<a class="viewTarget" href="#quo' . $j . '" title="Visit the page regarding the testimonial given by ' . $alpha_testimonial[$j]->getAuthor() . '!">' . substr($alpha_testimonial[$j]->getAuthor(), 0, strpos($alpha_testimonial[$j]->getAuthor(), ',')) . '</a>
									</div><!-- containerRow ends -->
								</div><!-- containerSwap ends -->
								<div class="containerSwap force-left">
									<div class="containerRow force-text-right">
										<span class="force-mini-left">Date: </span>
										<p>' . $date . '</p>
									</div><!-- containerRow ends -->
									<div class="containerRow">
										<span class="force-mini-left">Summary: </span>
										<p>' . $alpha_testimonial[$j]->getShort() . '</p>
									</div><!-- containerRow ends -->
								</div><!-- containerSwap ends -->
							</div><!-- containerColumn ends -->
				';
				$n = $j + 1;
				$limit++;
			}
			echo'
						</div><!-- containerColumn ends -->
					</div><!-- container ends -->
				</section><!-- section ends -->
			';
		}
		for ($i = 0; $i < $alpha_testimonialSize; $i++) {
			$notAtStart = $i !== 0;
			$notAtEnd = $i !== $alpha_testimonialSize - 1;
			$emptyLink = is_null($alpha_testimonial[$i]->getWebsite());
			$anchorClass = $emptyLink ? 'disabled' : '';
			$hrefTag = $emptyLink ? '' : 'href="' . $alpha_testimonial[$i]->getWebsite() . '"';
			$date = date_format(new DateTime($alpha_testimonial[$i]->getAuthored()), 'M jS, Y');
			echo'
				<section id="quo' . $i . '" class="sections" data-sitemap="' . $alpha_testimonial[$i]->getAuthor() . '">
					<div class="container">
						<header>
							<ul class="containerRow">
								<li class="previousPage' . ($notAtStart ? '' : ' disabled') . '">
									<a' . ($notAtStart ? (' href="#quo' . ($i - 1) . '"') : '') . ' title="Previous page, please!">
										<span>Prev</span>
									</a>
								</li><!-- previousPage ends -->
								<li class="nextPage' . ($notAtEnd ? '' : ' disabled') . '">
									<a' . ($notAtEnd ? (' href="#quo' . ($i + 1) . '"') : '') . ' title="Next page, please!">
										<span>Next</span>
									</a>
								</li><!-- nextPage ends -->
							</ul><!-- containerRow ends -->
						</header><!-- header ends -->
						<div class="containerColumn">
							<div class="containerRow">
								<h4>
									<a href="#tes0" title="Return to the Testimonials page!">Testimonial by ' . $alpha_testimonial[$i]->getAuthor() . '</a>
								</h4>
							</div><!-- containerRow ends -->
							<div class="containerColumn force-left">
								<div class="containerSwap force-left">
									<div class="containerRow force-text-right">
										<span class="force-mini-left">Employer: </span>
										<a class="' . $anchorClass . '" ' . $hrefTag . ' target="_blank" title="Visit the official company website!">' . $alpha_testimonial[$i]->getCompany() . '</a>
									</div><!-- containerRow ends -->
									<div class="containerRow">
										<span class="force-mini-left">Author: </span>
										<p>' . substr($alpha_testimonial[$i]->getAuthor(), 0, strpos($alpha_testimonial[$i]->getAuthor(), ',')) . '</p>
									</div><!-- containerRow ends -->
								</div><!-- containerSwap ends -->
								<div class="containerSwap force-left">
									<div class="containerRow force-text-right">
										<span class="force-mini-left">Date: </span>
										<p>' . $date . '</p>
									</div><!-- containerRow ends -->
									<div class="containerRow force-text-right">
										<p>' . substr($alpha_testimonial[$i]->getAuthor(), strpos($alpha_testimonial[$i]->getAuthor(), ',') + 1, strlen($alpha_testimonial[$i]->getAuthor())) . '</p>
									</div><!-- containerRow ends -->
								</div><!-- containerSwap ends -->
							</div><!-- containerColumn ends -->
							<div class="containerSwap">
								<div class="containerColumn">
									<div class="containerColumn">
										<q class="text-justify">' . htmlspecialchars_decode($alpha_testimonial[$i]->getDescription()) . '</q>
										<p class="text-justify">Note: This testimonial was translated by Richard and the original, can be given on request. Some changes have been made to make it compact and minor grammar changes might have been made since a direct word-by-word translation would not make much sense.</p>
									</div><!-- containerColumn ends -->
									<div class="containerColumn">
									</div><!-- containerColumn ends -->
								</div><!-- containerColumn ends -->
								<div class="containerColumn">
									<div class="containerColumn">
									</div><!-- containerColumn ends -->
									<div class="containerColumn">
									</div><!-- containerColumn ends -->
								</div><!-- containerColumn ends -->
							</div><!-- containerSwap ends -->
						</div><!-- containerColumn ends -->
					</div><!-- container ends -->
				</section><!-- section ends -->
			';
		}
	} else {
		echo'
			<section id="tes0" class="sections" data-sitemap="Empty | Error">
				<div class="container">
					<div class="containerColumn">
						<h4>Unable to load data / no data to be loaded - regarding the Testimonial pages</h4>
						<div class="containerRow">
							<strong>Currently, this page was unable to load! Please, try again later!</strong>
						</div><!-- containerRow ends -->
					</div><!-- containerColumn ends -->
				</div><!-- container ends -->
			</section><!-- section ends -->
		';
	}

?>