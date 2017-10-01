<?php

	if (isset($alpha_testimonialSize) == true) {
		$currentLimit = 0;
		$pages = ceil($alpha_testimonialSize / $defaultListGrid);
		for ($i = 0; $i < $pages; $i++) {
			echo'
				<section id="tes' . $i . '" class="sections" data-sitemap="List of Testimonials - p. ' . ($i+1) . '">
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
									<a href="#tes' . ($i-1) . '" title="Previous page, please!">
										<span>
											Prev
										</span>
									</a>
								</li>
				';
			}
			if ($i != $alpha_testimonialSize-1) {
				echo'
								<li class="nextPage">
									<a href="#tes' . ($i+1) . '" title="Next page, please!">
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
									List of Testimonials
								</a>
							</h4>
			';
			for ($j = $currentLimit; $j < $alpha_testimonialSize; $j++) {
				echo'
							<div class="row col-12-xs">
								<div class="col-5-sm col-12-xs text-left force-text-right no-margin">
				';
				if ($alpha_testimonial[$j]->getWebsite() == null) {
					echo'
									<p>
										<span class="force-mini-left">Employer: </span>' . substr($alpha_testimonial[$j]->getCompany(), 0, strpos($alpha_testimonial[$j]->getCompany(), ' ')) . '
									</p>
					';
				}
				else {
					echo'
									<p>
										<a href="' . $alpha_testimonial[$j]->getWebsite() . '" target="_blank" title="Visit the official company website!">
											<span class="force-mini-left">Employer: </span>' . substr($alpha_testimonial[$j]->getCompany(), 0, strpos($alpha_testimonial[$j]->getCompany(), ' ')) . '
										</a>
									</p>
					';
				}
				echo'
								</div>
								<div class="col-6-sm col-12-xs text-left no-margin">
									<p>
										<a class="viewTarget" href="#quo' . $j . '" title="Visit the page regarding the testimonial given by ' . $alpha_testimonial[$j]->getAuthor() . '!">
											<span class="force-mini-left">Author: </span>' . substr($alpha_testimonial[$j]->getAuthor(), 0, strpos($alpha_testimonial[$j]->getAuthor(), ',')) . '
										</a>
									</p>
								</div>
								<div class="col-5-sm col-12-xs text-left force-text-right no-margin">
									<p>
										<span class="force-mini-left">Date: </span>' . date_format(new DateTime($alpha_testimonial[$j]->getAuthored()), 'M jS, Y') . '
									</p>
								</div>
								<div class="col-6-sm col-12-xs text-left no-margin">
									<p>
										<span class="force-mini-left">Summary: </span><q> ' . $alpha_testimonial[$j]->getShort() . ' </q>
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
		for ($i = 0; $i < $alpha_testimonialSize; $i++) {
			echo'
				<section id="quo' . $i . '" class="sections" data-sitemap="' . $alpha_testimonial[$i]->getAuthor() . '">
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
									<a href="#quo' . ($i-1) . '" title="Previous page, please!">
										<span>
											Prev
										</span>
									</a>
								</li>
				';
			}
			if ($i != $alpha_testimonialSize-1) {
				echo'
								<li class="nextPage">
									<a href="#quo' . ($i+1) . '" title="Next page, please!">
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
								<a href="#tes0" title="Return to the Testimonials page!">
									Testimonial by ' . $alpha_testimonial[$i]->getAuthor() . '
								</a>
							</h4>
							<div class="row col-12-xs">
								<div class="col-12-xs no-margin">
									<div class="col-4-sm col-12-xs text-left force-text-right">
			';
			if ($alpha_testimonial[$i]->getWebsite() == null) {
				echo'
										<p>
											<span class="force-mini-left">Employer: </span>' . $alpha_testimonial[$i]->getCompany() . '
										</p>
				';
			}
			else {
				echo'
										<p>
											<a href="' . $alpha_testimonial[$i]->getWebsite() . '" target="_blank" title="Visit the official company website!">
												<span class="force-mini-left">Employer: </span>' . $alpha_testimonial[$i]->getCompany() . '
											</a>
										</p>
				';
			}
			echo'
									</div>
									<div class="col-6-sm col-12-xs text-left">
										<p>
											<span class="force-mini-left">Author: </span>' . $alpha_testimonial[$i]->getAuthor() . '
										</p>
									</div>
								</div>
								<div class="row col-12-xs no-margin">
									<div class="col-4-sm col-12-xs text-left force-text-right">
										<p>
											<span class="force-mini-left">Date: </span>' . date_format(new DateTime($alpha_testimonial[$i]->getAuthored()), 'M jS, Y') . '
										</p>
									</div>
									<div class="col-6-sm col-12-xs no-padding">
										<div class="col-12-xs text-justify">
											<p>
												<q> ' . $alpha_testimonial[$i]->getDescription() . ' </q> 
												<br/><br/>
												Note: This testimonial was translated by Richard and the original, can be
												given on request. Some changes have been made to make it compact and minor
												grammar changes	might have been made since a direct word-by-word translation
												would not make much sense.
											</p>
										</div>
									</div>
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
			<section id="tes0" class="sections" data-sitemap="Empty | Error">
				<h3 class="hidden">
					Testimonial section
				</h3>
				<div class="container">
					<div class="content row col-12-xs">
						<h4>
							Unable to load data / no data to be loaded - regarding the Testimonial pages
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